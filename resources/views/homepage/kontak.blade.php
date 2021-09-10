@extends('layouts.homepage')

@section('title')
    Profil Desa
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/unicat/styles/contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/unicat/styles/contact_responsive.css')}}">
@endsection

@section('container')
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li>Kontak Kami</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="contact">
		
    <!-- Contact Map -->

    <div class="contact_map">

        <!-- Google Map -->
        
        <div class="map">
            <div id="google_map" class="google_map">
                <div class="map_container">
                    {!! $info->maps !!}
                </div>
            </div>
        </div>

    </div>

    <!-- Contact Info -->

    <div class="contact_info_container">
        <div class="container">
            <div class="row">

                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="contact_form">
                        <div class="contact_info_title">Kirim Pesan Singkat</div>
                        <form action="#" class="comment_form">
                            <div>
                                <div class="form_title">Nama Lengkap</div>
                                <input type="text" class="comment_input" required="required">
                            </div>
                            <div>
                                <div class="form_title">Email</div>
                                <input type="text" class="comment_input" required="required">
                            </div>
                            <div>
                                <div class="form_title">Pesan</div>
                                <textarea class="comment_input comment_textarea" required="required"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="comment_button trans_200">Kirim Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="contact_info_title">Info Kontak</div>
                        <div class="contact_info_text">
                            <p class="text-uppercase">Desa {{ $infodesa->nama_desa }}</p>
                            <p>{{ $info->tentang }}</p>
                        </div>
                        <div class="contact_info_location">
                            <div class="contact_info_location_title">Kontak Kantor Desa</div>
                            <ul class="location_list">
                                <li>{{ $info->alamat }}</li>
                                <li>{{ $info->telp }}</li>
                                <li>{{ $info->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{ asset('template/unicat/plugins/marker_with_label/marker_with_label.js')}}"></script>
<script src="{{ asset('template/unicat/js/contact.js')}}"></script>
    
@endsection