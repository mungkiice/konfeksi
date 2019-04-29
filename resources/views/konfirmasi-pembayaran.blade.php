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
                        <h3>Form Konfirmasi Pembayaran</h3>
                        <h6>untuk pesanan #{{$pesanan->kode_pesanan}}</h6>
                        <form action="/pembayaran" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="kode_pesanan" class="form-control" value="{{$pesanan->kode_pesanan}}">
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