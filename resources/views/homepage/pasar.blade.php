@extends('layouts.homepage')

@section('title')
    Pasar Desa
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/unicat/styles/blog.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/unicat/styles/blog_responsive.css')}}">
@endsection

@section('container')
<div class="home" style="margin-top: 20px">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li>Produk Desa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Produk Desa {{ $desa->nama_desa }}</h2>
                    <div class="section_subtitle"><p>Produk-Produk Masyarakat</p></div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            {{-- <div class="blog_post_container"> --}}
                @forelse ($produk as $item)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 p-2">
                        <div class="card pb-0">
                            <a href="{{ url('produkdesa/'.Crypt::encrypt($item->id)) }}"><img src="{{ asset('img/penduduk/produk/'.$item->gambar)}}" class="card-img-top" alt="..."></a>
                            <div class="card-body mb-0 pb-1">
                              <h5 class="card-title text-capitalize small font-weight-bold text-center">{{ $item->nama }}</h5>
                              <p class="card-text small">{{ rupiah($item->harga) }}</p>
                              <span class="float-right small font-italic">{{ $item->nama_lapak }}</span>
                            </div>
                          </div>
                    </div>
                @empty
                    <div class="col text-center">
                        <i>Data Produk belum tersedia</i>
                    </div>   
                @endforelse
            {{-- </div> --}}
    </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('template/unicat/plugins/masonry/masonry.js')}}"></script>
<script src="{{ asset('template/unicat/plugins/video-js/video.min.js')}}"></script>

<script src="{{ asset('template/unicat/js/blog.js')}}"></script>

    
@endsection