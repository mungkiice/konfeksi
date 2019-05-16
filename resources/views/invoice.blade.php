@extends('layouts.app')
@section('page', 'Invoice')
@section('custom-css')
<link rel="stylesheet" href="/css/invoice.css" media="all" />
@endsection

@section('content')
<section class="tracking_box_area">  
  <header class="clearfix">
    <h1>INVOICE #{{ $pesanan->kode_pesanan }}</h1>
    <div id="project">
      <div><span>PEMESAN</span> {{ $pesanan->user->nama }}</div>
      <div><span>EMAIL</span> {{ $pesanan->user->email }}</div>
      <div><span>SELESAI</span> {{ date('d M Y', strtotime($pesanan->tenggat_waktu)) }}</div>
      @if($pesanan->alamat != '')
      <div><span>KETERANGAN</span> Barang dikirim ke alamat pemesan</div>
      <div><span>ALAMAT PENERIMA</span> {{ $pesanan->alamat }}</div>
      @else
      <div><span>KETERANGAN</span> Barang diambil di konfeksi</div>
      @endif
    </div>

    <div id="company">
      <div>{{ $pesanan->produk->konfeksi->user->nama }}</div>
      <div><span>ALAMAT</span>{{ $pesanan->produk->konfeksi->alamat }}</div>
      <div><span>TELP</span>{{ $pesanan->produk->konfeksi->user->nomor_telepon}}</div>
      <div><span>EMAIL</span><a href="mailto:{{ $pesanan->produk->konfeksi->user->email }}">{{ $pesanan->produk->konfeksi->user->email }}</a></div>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th class="desc">PRODUK</th>
          <th class="price">UKURAN</th>
          <th class="qty">JUMLAH</th>
          <th class="total">TOTAL</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="desc" colspan="3">{{ $pesanan->produk->nama }}</td>
          <td>Rp.{{ number_format($pesanan->biaya) }},-</td>
        </tr>
        @foreach(json_decode($pesanan->jumlah) as $ukuran => $jumlah)
        <tr>
          <td class="desc"></td>
          <td class="price" style="font-size: 12px;">{{ $ukuran }}</td>
          <td class="qty" style="font-size: 12px;">{{ $jumlah }}</td>
          <td></td>
          <!-- <td class="total"></td> -->
        </tr>
        @endforeach
        <tr>
          <td colspan="3" class="grand total">TOTAL BIAYA</td>
          <td class="grand total">Rp.{{ number_format($pesanan->biaya) }},-</td>
        </tr>
        <tr>
          <td colspan="3" class="grand total">DP 50%</td>
          <td class="grand total">Rp.{{ number_format(.5 * $pesanan->biaya) }},-</td>
        </tr>
      </tbody>
    </table>
    <div id="notices">
      <div>SELANJUTNYA :</div>
      <div class="notice">
        <ol>
          <li>
            Silahkan melakukan pembayaran dengan melakukan transfer ke salah satu dari rekening {{$pesanan->produk->konfeksi->user->nama}}:
            <ul>
              <li>Bank {{$pesanan->produk->konfeksi->bank_nama}} : {{$pesanan->produk->konfeksi->bank_nomor}} a.n {{$pesanan->produk->konfeksi->bank_pemilik}}</li>
            </ul>
          </li>
          <li>Foto/ pindai (scan)/ screenshot bukti transfer anda. Kami menganjurkan agar anda juga tetap menyimpan bukti transfer anda, sebagai bukti pembayaran.</li>
          <li>Unggah (upload) foto, hasil pindaian (scan), atau screenshot bukti transfer anda melalui fitur Konfirmasi Pembayaran pada website Konfeksi.</li>
          <li>Pihak konfeksi akan memastikan bahwa bukti transfer yang anda upload valid dan dana yang anda kirimkan berhasil terkirim.
            <ul>
              <li>- Apabila pembayaran anda berhasil diverifikasi, maka konfeksi akan memproses pesanan anda, dan anda akan menerima email berisi bukti pemesanan.</li>
              <li>- Apabila dalam 1 x 24 jam belum respon dari konfeksi, silahkan hubungi customer service kami untuk tindak lanjutnya.</li>
            </ul>
          </li>
        </ol>
      </div>
    </div>
  </main>
  <a href="/pesanansaya" class="genric-btn primary circle" style="margin: auto;display: block;width: 100px;text-decoration: none;">Kembali</a>
</section>
@endsection