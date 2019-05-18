<?php

namespace App\Http\Controllers;

use App\Notifications\PenawaranBaru;
use App\Penawaran;
use App\Pesanan;
use App\RajaOngkirAPI;
use App\StatusPesanan;
use Illuminate\Http\Request;
use Veritrans_Config;
use Veritrans_Notification;
use Veritrans_Snap;

class PenawaranController extends Controller
{
    public function __construct()
    {
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }
    public function create($pesananId)
    {
    	$pesanan = Pesanan::temukan($pesananId);
    	return view('admin.penawaran-form', compact('pesanan'));
    }

    public function show($kodePesanan)
    {
        $pesanan = Pesanan::filter($kodePesanan)->first();
        $penawarans = $pesanan->penawaran()->latest()->get();
        return view('penawaran', compact('penawarans', 'pesanan'));
    }

    public function store(Request $request, $pesananId)
    {
    	$this->validate($request, [
    		'biaya' => 'required',
            'tenggat_waktu' => 'required',
        ]);

        $path = '';
        if ($request->gambar != null) {
            $path = $request->gambar->store('pesanan', 'public');
        }

        $pesanan = Pesanan::temukan($pesananId);
        
        $penawaran = Penawaran::buat($pesanan->id,$request->tenggat_waktu,$request->biaya,$request->deskripsi,$path);
        $statusPesanan = StatusPesanan::buat($pesanan->id, 'menunggu konfirmasi penawaran');
        $pesanan->user->notify(new PenawaranBaru($penawaran));
        return redirect('/konfeksi')->with('flash', 'Penawaran berhasil dikirim');
    }

    public function konfirmasi(Request $request, $penawaranId)
    {
        $penawaran = Penawaran::temukan($penawaranId);
        $penawaran->perbarui($request->status);
        $pesanan = Pesanan::temukan($penawaran->pesanan_id);
        if ($request->status == 'diterima') {
            $statusPesanan = StatusPesanan::buat($pesanan->id, 'menunggu pembayaran DP');
            $transaction_details = array(
                'order_id' => $pesanan->kode_pesanan,
            );
            $item_details = array();
            foreach (json_decode($pesanan->jumlah, true) as $key => $value) {
                if ($value > 0) {
                    array_push($item_details, [
                        'id' => $key,
                        'price' => $pesanan->produk->harga,
                        'quantity' => $value,
                        'name' => $pesanan->produk->nama .' '.$key
                    ]);
                }
            }
            if ($pesanan->alamat) {
                array_push($item_details, [
                    'id' => 'kurir',
                    'price' => $this->ongkir($pesanan->produk->konfeksi->kota_id, $pesanan->kota_id, $pesanan->kurir),
                    'quantity' => 1,
                    'name' => $pesanan->kurir
                ]);
            }

            $billing_address = array(
                'first_name'    => $pesanan->user->nama,
                'address'       => "Mangga 20",
                'city'          => "Jakarta",
                'postal_code'   => "16602",
                'phone'         => $pesanan->user->nomor_telepon,
                'country_code'  => 'IDN'
            );
            $shipping_address = array(
                'first_name'    => $pesanan->produk->konfeksi->user->nama,
                'address'       => $pesanan->alamat ?: 'Barang diambil di konfeksi',
                'phone'         => $pesanan->produk->konfeksi->user->nomor_telepon,
                'country_code'  => 'IDN'
            );

            $customer_details = array(
                'first_name'    => $pesanan->user->nama, 
                'email'         => $pesanan->user->email,
                'phone'         => $pesanan->user->nomor_telepon,
                'billing_address'  => $billing_address,
                'shipping_address' => $shipping_address
            );

            $transaction = array(
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
            );

            $snapToken = Veritrans_Snap::getSnapToken($transaction);

            $pesanan->perbarui($penawaran->biaya, $penawaran->tenggat_waktu, $penawaran->deskripsi, $snapToken);
            // return view('invoice', compact('pesanan'))->with('flash', 'Penawaran berhasil disetujui');
            return response()->json(['snap_token' => $snapToken]);
        }else{
            // return back()->with('flash', 'Penawaran berhasil ditolak');
        }
    }

    public function ongkir($kotaAsal, $kotaTujuan, $ekspedisi)
    {
        $arr = explode(' ', trim($ekspedisi));
        $kurir = array_shift($arr);
        $jenis = implode(' ', $arr);
        $result = RajaOngkirAPI::getCost($kotaAsal, $kotaTujuan, 10, $kurir);
        foreach ($result[0]['costs'] as $item) {
            if ($item['service'] == $jenis) {
                return $item['cost'][0]['value'];
            }
        }
        return 0;
    }
    
    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {

          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $donation = Donation::findOrFail($orderId);

          if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $donation->setPending();
            } else {
                // TODO set payment status in merchant's database to 'Success'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $donation->setSuccess();
            }

        }

    } elseif ($transaction == 'settlement') {

            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
        $donation->setSuccess();

    } elseif($transaction == 'pending'){

            // TODO set payment status in merchant's database to 'Pending'
            // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
        $donation->setPending();

    } elseif ($transaction == 'deny') {

            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
        $donation->setFailed();

    } elseif ($transaction == 'expire') {

            // TODO set payment status in merchant's database to 'expire'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
        $donation->setExpired();

    } elseif ($transaction == 'cancel') {

            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
        $donation->setFailed();

    }

});

        return;
    }

}
