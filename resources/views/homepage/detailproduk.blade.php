@extends('layouts.homepage')

@section('title')
    Pasar Desa
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/unicat/styles/about.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/unicat/styles/about_responsive.css')}}">
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
                            <li><a href="{{ url('/halaman/pasardesa') }}">Produk Desa</a></li>
                            <li> {{ $produk->nama}} </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>			
</div>

<!-- About -->

<div class="about">
    <div class="container">
        {{-- <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Produk Desa {{ $desa->nama_desa }}</h2>
                    <div class="section_subtitle"><p>Produk-Produk Masyarakat</p></div>
                </div>
            </div>
        </div> --}}
                   <div class="row about_row">
                <div class="col-lg-4 col-md-6">
                    <section>
                        <img src="{{ asset('img/penduduk/produk/'.$produk->gambar)}}" class="img-fluid" alt="">
                    </section>
                </div>
                <div class="col-lg-8 col-md-6">
                    <h2>{{ $produk->nama}}</h2>
                    <h4> {{ rupiah($produk->harga)}} </h4>
                    <hr>
                    <p> {{ $produk->keterangan}} </p>
                    <hr>
                    <table width="100%">
                        <tr>
                            <th>Lapak</th>
                            <td>: {{ $lapak->nama_lapak}}</td>
                        </tr>
                        <tr>
                            <th>Tentang Lapak</th>
                            <td>: {{ $lapak->tentang}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $lapak->alamat}}</td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
</div>

<!-- Feature -->
{{-- 
<div class="feature">
    <div class="feature_background" style="background-image:url({{ asset('template/unicat/images/courses_background.jpg')}})"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Potensi Desa</h2>
                    <div class="section_subtitle"><p>Beberapa potensi desa yang begitu dalam untuk ditindak lanjuti</p></div>
                </div>
            </div>
        </div>
        <div class="row feature_row">

            <!-- Feature Content -->
            <div class="col-lg-6 feature_col">
                <div class="feature_content">
                    <!-- Accordions -->
                    <div class="accordions">
                        
                        <div class="elements_accordions">
                            
                            @foreach ($potensi as $item)
                                <div class="accordion_container">
                                    <div class="accordion d-flex flex-row align-items-center @if ($loop->iteration == 1)
                                    active
                                    @endif "><div>{{ $item->nama_potensi }}</div></div>
                                    <div class="accordion_panel">
                                        <p>{{ $item->keterangan_potensi }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <!-- Accordions End -->
                </div>
            </div>

            <!-- Feature Video -->
            <div class="col-lg-6 feature_col">
                <div class="feature_video d-flex flex-column align-items-center justify-content-center">
                    <div class="feature_video_background" style="background-image:url({{ asset('template/unicat/images/video.jpg')}})"></div>
                    <a class="vimeo feature_video_button" href="https://player.vimeo.com/video/99340873?title=0" title="OH, PORTUGAL - IN 4K - Basti Hansen - Stock Footage">
                        <img src="{{ asset('template/unicat/images/play.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="team">
    <div class="team_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('template/unicat/images/team_background.jpg')}}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Perangkat Desa</h2>
                    <div class="section_subtitle"><p>Daftar Perangkat Desa</p></div>
                </div>
            </div>
        </div>
        <div class="row team_row">
            
            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{ asset('template/unicat/images/team_1.jpg')}}" alt=""></div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">Teteh Aidah</a></div>
                        <div class="team_subtitle">Kepala Desa</div>
                        <div class="social_list">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{ asset('template/unicat/images/team_2.jpg')}}" alt=""></div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">Asep Saefulloh</a></div>
                        <div class="team_subtitle">Sekretaris Desa</div>
                        <div class="social_list">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{ asset('template/unicat/images/team_3.jpg')}}" alt=""></div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">Didin Mahyudin</a></div>
                        <div class="team_subtitle">Bendahara Desa</div>
                        <div class="social_list">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{ asset('template/unicat/images/team_4.jpg')}}" alt=""></div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">Mila Melani</a></div>
                        <div class="team_subtitle">Kaur Pemerintahan</div>
                        <div class="social_list">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> --}}

<!-- Partners -->

{{-- <div class="partners">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="partners_slider_container">
                    <div class="owl-carousel owl-theme partners_slider">

                        <!-- Partner Item -->
                        <div class="owl-item partner_item"><img src="{{ asset('template/unicat/images/partner_1.png')}}" alt=""></div>

                        <!-- Partner Item -->
                        <div class="owl-item partner_item"><img src="{{ asset('template/unicat/images/partner_2.png')}}" alt=""></div>

                        <!-- Partner Item -->
                        <div class="owl-item partner_item"><img src="{{ asset('template/unicat/images/partner_3.png')}}" alt=""></div>

                        <!-- Partner Item -->
                        <div class="owl-item partner_item"><img src="{{ asset('template/unicat/images/partner_4.png')}}" alt=""></div>

                        <!-- Partner Item -->
                        <div class="owl-item partner_item"><img src="{{ asset('template/unicat/images/partner_5.png')}}" alt=""></div>

                        <!-- Partner Item -->
                        <div class="owl-item partner_item"><img src="{{ asset('template/unicat/images/partner_6.png')}}" alt=""></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@section('script')
<script src="{{ asset('template/unicat/js/about.js')}}"></script>
    
@endsection