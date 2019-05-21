<?php 

namespace App;

use App\Pesanan;
use Veritrans_Config;
use Veritrans_Snap;

class MidtransAPI 
{
	static function init()
	{
		Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
		Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
		Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
		Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
	}

	public static function getAdvanceSnapToken(Pesanan $pesanan, $ongkir)
	{
		self::init();
		$transaction_details = array(
                'order_id' => 'DP' . $pesanan->kode_pesanan,
                // 'gross_amount' => $totalBiaya
            );
            $item_details = array();
            foreach (json_decode($pesanan->jumlah, true) as $key => $value) {
                if ($value > 0) {
                    array_push($item_details, [
                        'id' => $key,
                        'price' => .5 * $pesanan->produk->harga,
                        'quantity' => $value,
                        'name' => $pesanan->produk->nama .' '.$key . ' (DP 50%)'
                    ]);
                }
            }
            if ($pesanan->alamat) {
                array_push($item_details, [
                    'id' => 'kurir',
                    'price' => .5 * $ongkir,
                    'quantity' => 1,
                    'name' => $pesanan->kurir .' (DP 50%)'
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
            return $snapToken;
	}

	public static function getRepaymentSnapToken(Pesanan $pesanan, $ongkir)
	{
		self::init();
		$transaction_details = array(
                'order_id' => 'LN' . $pesanan->kode_pesanan,
                // 'gross_amount' => $totalBiaya
            );
            $item_details = array();
            foreach (json_decode($pesanan->jumlah, true) as $key => $value) {
                if ($value > 0) {
                    array_push($item_details, [
                        'id' => $key,
                        'price' => .5 * $pesanan->produk->harga,
                        'quantity' => $value,
                        'name' => $pesanan->produk->nama .' '.$key . ' (LUNAS)'
                    ]);
                }
            }
            if ($pesanan->alamat) {
                array_push($item_details, [
                    'id' => 'kurir',
                    'price' => .5 * $ongkir,
                    'quantity' => 1,
                    'name' => $pesanan->kurir . ' (LUNAS)'
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
            return $snapToken;
	}
}