@extends('layouts.homepage')

@section('title')
    Beranda - Berita Kategori {{ $kategori->nama_kategori }}
@endsection

@section('head')
    <link href="{{ asset('template/unicat/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
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
                            <li><a href="{{ url('/halaman/berita') }}">Berita</a></li>
                            <li>kategori {{ $kategori->nama_kategori }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_post_container">
                        @forelse ($berita as $item)
                            <!-- Blog Post -->
                            <div class="blog_post trans_200">
                                <div class="blog_post_image"><img src="{{ asset('img/pengaturan/artikel/'.$item->gambar_artikel)}}" alt=""></div>
                                <div class="blog_post_body">
                                    <div class="blog_post_title text-capitalize"><a href="{{ url('halaman/berita/'.$item->slug) }}">{{ $item->judul_artikel }}</a></div>
                                    <div class="blog_post_meta">
                                        <ul>
                                            <li><a href="#">Admin</a></li>
                                            <li><a href="#">{{ $item->created_at }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_text">
                                        <p>{!! substr($item->isi_artikel,0,100) !!}. . .</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <div class="col-md-12 text-center">
                                        <div class="blog_post w-100">
                                            <img src="{{ asset('img/none.png') }}" alt="" width="300px">
                                            <p>Berita belum ada untuk kategori {{ $kategori->nama_kategori }}</p>
                                        </div>
                                </div>
                            </div>
                        @endforelse

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

@endsection

@section('script')
<script src="{{ asset('template/unicat/plugins/masonry/masonry.js')}}"></script>
<script src="{{ asset('template/unicat/plugins/video-js/video.min.js')}}"></script>
<script src="{{ asset('template/unicat/js/blog.js')}}"></script>
    
@endsection