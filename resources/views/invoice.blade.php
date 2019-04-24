<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Konfeksi Invoice</title>
    <link rel="shortcut icon" href="/img/fav.png">
  <link rel="stylesheet" href="/css/invoice.css" media="all" />

</head>
<body>
  <header class="clearfix">
    <div id="logo">
      <img class="logo" src="/img/logo.png">
    </div>
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
            Silahkan melakukan pembayaran dengan melakukan transfer ke salah satu dari rekening Konfeksi :
            <ul>
              <li>Bank BCA : 192387198237 a.n Muhammad Iqbal Kurniawan</li>
            </ul>
          </li>
          <li>Foto/ pindai (scan)/ screenshot bukti transfer anda. Kami menganjurkan agar anda juga tetap menyimpan bukti transfer anda, sebagai bukti pembayaran.</li>
          <li>Unggah (upload) foto, hasil pindaian (scan), atau screenshot bukti transfer anda melalui fitur Upload Bukti Pembayaran pada website Konfeksi.</li>
          <li>Tim Konfeksi akan memastikan bahwa bukti transfer yang anda upload valid dan dana yang anda kirimkan berhasil terkirim.
            <ul>
              <li>Apabila pembayaran anda berhasil diverifikasi, maka anda akan menerima email pemberitahuan, dan trip anda kami proses.</li>
              <li>Apabila dalam 1 x 24 jam belum mendapatkan email pemberitahuan, silahkan hubungi customer service kami untuk tindak lanjutnya.</li>
            </ul>
          </li>
        </ol>
      </div>
    </div>
  </main>
  <footer>
    <!-- Invoice was created on a computer and is valid without the signature and seal. -->
    Invoice dibuat oleh komputer dan valid tanpa menggunakan cap atau tanda tangan.
  </footer>
</body>
</html>