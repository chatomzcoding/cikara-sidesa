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
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ url('halaman/berita') }}">Berita</a></li>
                            <li>{{ $berita->judul_artikel }}</li>
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
                    <div class="blog_image"><img src="{{ asset('img/pengaturan/artikel/'.$berita->gambar_artikel) }}" alt=""></div>
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
                {{-- <div class="comments_container">
                    <div class="comments_title"><span>30</span> Comments</div>
                    <ul class="comments_list">
                        <li>
                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                <div class="comment_image"><div><img src="images/comment_1.jpg" alt=""></div></div>
                                <div class="comment_content">
                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_author"><a href="#">Jennifer Aniston</a></div>
                                        <div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
                                        <div class="comment_time ml-auto">October 19,2018</div>
                                    </div>
                                    <div class="comment_text">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                    </div>
                                    <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
                                        <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
                                    </div>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                        <div class="comment_image"><div><img src="images/comment_2.jpg" alt=""></div></div>
                                        <div class="comment_content">
                                            <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                <div class="comment_author"><a href="#">John Smith</a></div>
                                                <div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
                                                <div class="comment_time ml-auto">October 19,2018</div>
                                            </div>
                                            <div class="comment_text">
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                            </div>
                                            <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
                                                <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                <div class="comment_image"><div><img src="images/comment_3.jpg" alt=""></div></div>
                                <div class="comment_content">
                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_author"><a href="#">Jane Austen</a></div>
                                        <div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
                                        <div class="comment_time ml-auto">October 19,2018</div>
                                    </div>
                                    <div class="comment_text">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                    </div>
                                    <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
                                        <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="add_comment_container">
                        <div class="add_comment_title">Write a comment</div>
                        <div class="add_comment_text">Your email address will not be published. Required fields are marked *</div>
                        <form action="#" class="comment_form">
                            <div>
                                <div class="form_title">Review*</div>
                                <textarea class="comment_input comment_textarea" required="required"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 input_col">
                                    <div class="form_title">Name*</div>
                                    <input type="text" class="comment_input" required="required">
                                </div>
                                <div class="col-md-6 input_col">
                                    <div class="form_title">Email*</div>
                                    <input type="text" class="comment_input" required="required">
                                </div>
                            </div>
                            <div class="comment_notify">
                                <input type="checkbox" id="checkbox_notify" name="regular_checkbox" class="regular_checkbox checkbox_account" checked>
                                <label for="checkbox_notify"><i class="fa fa-check" aria-hidden="true"></i></label>
                                <span>Notify me of new posts by email</span>
                            </div>
                            <div>
                                <button type="submit" class="comment_button trans_200">submit</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>

            <!-- Blog Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- Categories -->
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Kategori</div>
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
                        <div class="sidebar_section_title">Artikel Terbaru</div>
                        <div class="sidebar_latest">

                            @foreach ($lastberita as $item)
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image"><div><img src="{{ asset('img/pengaturan/artikel/'.$item->gambar_artikel) }}" alt=""></div></div>
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