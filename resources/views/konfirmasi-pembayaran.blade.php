@extends('layouts.app')
@section('page', 'Konfirmasi Pembayaran')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
@endsection
@section('content')
<section class="sample-text-area" style="padding-top: 50px;">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="comment-form">
                        <h3 class="mb-30">Form Konfirmasi Pembayaran</h3>
                        <form action="/pembayaran" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputNama">Kode Pesanan</label>
                                <input type="text" name="kode_pesanan" class="form-control" placeholder="ex.12093812">
                                @if ($errors->has('kode_pesanan'))
                                <p style="color: red;">{{ $errors->first('kode_pesanan') }}</p>
                                @endif
                            </div>
                            <div class="form-group">        
                                <label style="display: block;">Gambar Bukti Transfer</label>          
                                <input type="file" class="dropify" name="gambar" />
                                @if ($errors->has('gambar'))
                                <p style="color: red;">{{ $errors->first('gambar') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="genric-btn primary circle mt-4">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
<script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<script src="{{ asset('assets/js/shared/dropify.js') }}"></script>
@endsection