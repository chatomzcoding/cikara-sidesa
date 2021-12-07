@extends('layouts.homepage')

@section('title')
    Beranda - Berita {{ $berita->judul_artikel }}
@endsection

@section('head')
    <link href="{{ asset('template/unicat/plugins/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/unicat/styles/blog_single.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/unicat/styles/blog_single_responsive.css')}}">
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
                            <li><a href="{{ url('halaman/berita') }}">Berita</a></li>
                            <li class="text-capitalize">{{ $berita->judul_artikel }}</li>
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
            <div class="col-md-12">
                @include('sistem.notifikasi')
            </div>
            <!-- Blog Content -->
            <div class="col-lg-8">
                <div class="blog_content">
                    <div class="blog_title text-capitalize">{{ $berita->judul_artikel }}</div>
                    <div class="blog_meta">
                        <ul>
                            <li>Diposting <a href="#">{{ $berita->created_at }}</a></li>
                            <li>By <a href="#">ADMIN</a></li>
                        </ul>
                    </div>
                    <div class="blog_image">
                        <img src="{{ asset('img/pengaturan/artikel/'.$berita->gambar_artikel) }}" alt="" width="100%">
                    </div>
                    {!! $berita->isi_artikel !!}
                </div>
                <div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                    {{-- <div class="blog_tags">
                        <span>Tags: </span>
                        <ul>
                            <li><a href="#">Education</a>, </li>
                            <li><a href="#">Math</a>, </li>
                            <li><a href="#">Food</a>, </li>
                            <li><a href="#">Schools</a>, </li>
                            <li><a href="#">Religion</a>, </li>
                        </ul>
                    </div> --}}
                    {{-- <div class="blog_social ml-lg-auto">
                        <span>Share: </span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> --}}
                </div>
                <!-- Comments -->
                <div class="comments_container">
                    <div class="comments_title"><span>{{ count($komentar) }}</span> Komentar</div>
                    <ul class="comments_list">
                        @forelse ($komentar as $item)
                            <li>
                                <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                    <div class="comment_image"><div><img src="{{ asset('/img/user/'.$item->photo) }}" alt=""></div></div>
                                    <div class="comment_content">
                                        <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="comment_author"><h4 class="text-capitalize">{{ $item->nama }}</h4></div>
                                            <div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
                                            <div class="comment_time ml-auto">{{ date_indo($item->tanggal) }}</div>
                                        </div>
                                        <div class="comment_text">
                                            <p>{{ $item->isi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            
                        @endforelse
                    </ul>
                    @if ($user)
                        <div class="add_comment_container">
                            <div class="add_comment_title">Tambahkan Komentar</div>
                            <div class="add_comment_text font-italic text-secondary">* hanya penduduk yang login yang bisa berkomentar pada artikel</div>
                            <form action="{{ url('kirimkomentar') }}" class="comment_form" method="post">
                                @csrf
                                <input type="hidden" name="name" value="{{ $penduduk->nama_penduduk}}">
                                <input type="hidden" name="id" value="{{ $berita->id}}">
                                <input type="hidden" name="photo" value="{{ $user->profile_photo_path}}">
                                <div>
                                    <textarea name="isi" class="comment_input comment_textarea" placeholder="ketikkan komentar disini"  maxlength="250" required></textarea>
                                    <span class="font-italic text-danger">maksimal 250 karakter</span>
                                </div>
                                <div>
                                    <button type="submit" class="comment_button trans_200">Kirim Komentar</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="bg-light p-3">
                            <strong>ingin berkomentar di artikel ? silahkan login terlebih dahulu <a href="{{ url('login') }}">LOGIN</a></strong>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Blog Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- Categories -->
                    <div class="sidebar_section">
                        <div class="sidebar_section_title bg-primary p-3 text-white">Kategori</div>
                        <div class="sidebar_categories">
                            <ul class="categories_list">
                                @foreach ($kategori as $item)
                                    <li><a href="{{ url('halaman/berita/kategori/'.Crypt::encryptString($item->id)) }}" class="clearfix">{{ $item->nama_kategori }}<span>({{ DbCikara::countData('artikel',['kategoriartikel_id',$item->id]) }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Latest News -->
                    <div class="sidebar_section">
                        <div class="sidebar_section_title bg-primary p-3 text-white">Artikel Terbaru</div>
                        <div class="sidebar_latest">

                            @foreach ($lastberita as $item)
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    @if (!is_null($item->gambar_artikel))
                                        <div class="latest_image">
                                            <div><img src="{{ asset('img/pengaturan/artikel/'.$item->gambar_artikel) }}" alt=""></div>
                                        </div>
                                    @endif
                                    <div class="latest_content">
                                        <div class="latest_title text-capitalize"><a href="{{ url('halaman/berita/'.$item->slug) }}">{{ $item->judul_artikel }}</a></div>
                                        <div class="latest_date">{{ $item->created_at }}</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Gallery -->
                    {{-- <div class="sidebar_section">
                        <div class="sidebar_section_title">Instagram</div>
                        <div class="sidebar_gallery">
                            <ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
                                <li class="gallery_item">
                                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                    <a class="colorbox" href="images/gallery_1_large.jpg">
                                        <img src="images/gallery_1.jpg" alt="">
                                    </a>
                                </li>
                                <li class="gallery_item">
                                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                    <a class="colorbox" href="images/gallery_2_large.jpg">
                                        <img src="images/gallery_2.jpg" alt="">
                                    </a>
                                </li>
                                <li class="gallery_item">
                                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                    <a class="colorbox" href="images/gallery_3_large.jpg">
                                        <img src="images/gallery_3.jpg" alt="">
                                    </a>
                                </li>
                                <li class="gallery_item">
                                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                    <a class="colorbox" href="images/gallery_4_large.jpg">
                                        <img src="images/gallery_4.jpg" alt="">
                                    </a>
                                </li>
                                <li class="gallery_item">
                                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                    <a class="colorbox" href="images/gallery_5_large.jpg">
                                        <img src="images/gallery_5.jpg" alt="">
                                    </a>
                                </li>
                                <li class="gallery_item">
                                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                    <a class="colorbox" href="images/gallery_6_large.jpg">
                                        <img src="images/gallery_6.jpg" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}

                    <!-- Tags -->
                    {{-- <div class="sidebar_section">
                        <div class="sidebar_section_title">Tags</div>
                        <div class="sidebar_tags">
                            <ul class="tags_list">
                                <li><a href="#">creative</a></li>
                                <li><a href="#">unique</a></li>
                                <li><a href="#">photography</a></li>
                                <li><a href="#">ideas</a></li>
                                <li><a href="#">wordpress</a></li>
                                <li><a href="#">startup</a></li>
                            </ul>
                        </div>
                    </div> --}}

                    <!-- Banner -->
                    {{-- <div class="sidebar_section">
                        <div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="sidebar_banner_background" style="background-image:url(images/banner_1.jpg)"></div>
                            <div class="sidebar_banner_overlay"></div>
                            <div class="sidebar_banner_content">
                                <div class="banner_title">Free Book</div>
                                <div class="banner_button"><a href="#">download now</a></div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="{{ asset('template/unicat/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
<script src="{{ asset('template/unicat/js/blog.js')}}"></script>
    
@endsection