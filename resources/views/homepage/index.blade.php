@extends('layouts.homepage')

@section('title')
    Selamat Datang di Aplikasi Jantung Desa
@endsection

@section('container')

    <!-- Home -->
	@if (count($slider) > 0)
	<div class="home">

			<div class="home_slider_container">
				<!-- Home Slider -->
				<div class="owl-carousel owl-theme home_slider">
					
					<!-- Home Slider Item -->
					@foreach ($slider as $item)
						<div class="owl-item">
							<div class="home_slider_background" style="background-image:url({{ asset('img/pengaturan/slider/'.$item->gambar)}})"></div>
							<div class="home_slider_content" style="background-color: black; opacity:50%;">
								<div class="container">
									<div class="row">
										<div class="col text-center">
											<div class="home_slider_title text-white">{{ $item->nama_slider }}</div>
											{{-- <div class="home_slider_subtitle">Future Of Education Technology</div> --}}
											{{-- <div class="home_slider_form_container">
												<form action="#" id="home_search_form_1" class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between">
													<div class="d-flex flex-row align-items-center justify-content-start">
														<input type="search" class="home_search_input" placeholder="Keyword Search" required="required">
														<select class="dropdown_item_select home_search_input">
															<option>Category Courses</option>
															<option>Category</option>
															<option>Category</option>
														</select>
														<select class="dropdown_item_select home_search_input">
															<option>Select Price Type</option>
															<option>Price Type</option>
															<option>Price Type</option>
														</select>
													</div>
													<button type="submit" class="home_search_button">search</button>
												</form>
											</div> --}}
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach

				</div>
			</div>

			<!-- Home Slider Nav -->

			<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
			<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
		</div>
	@else
		<div style="margin-top: 50px">

		</div>
	@endif

	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title text-capitalize">Selamat Datang di Website <br> Desa {{ $infodesa->nama_desa }}</h2>
						<div class="section_subtitle"><p>{{ $info->tentang }}</p></div>
					</div>
				</div>
			</div>
			<div class="row features_row">
				
				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="{{ asset('template/unicat/images/icon_1.png')}}" alt=""></div>
						<h3 class="feature_title">Layanan Mandiri</h3>
						<div class="feature_text"><p>Pembuatan Surat, Lapor Penduduk</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="{{ asset('template/unicat/images/icon_2.png')}}" alt=""></div>
						<h3 class="feature_title">Berita dan Info Desa</h3>
						<div class="feature_text"><p>Memberikan informasi terkait berita dan info desa</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="{{ asset('template/unicat/images/icon_3.png')}}" alt=""></div>
						<h3 class="feature_title">Sistematik Desa</h3>
						<div class="feature_text"><p>Memberikan akses kepada penduduk ke layanan desa</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="{{ asset('template/unicat/images/icon_4.png')}}" alt=""></div>
						<h3 class="feature_title">Ekonomi Desa</h3>
						<div class="feature_text"><p>Memberikan pelayanan untuk perekonomian Desa</p></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Popular Courses -->

	<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('template/unicat/images/courses_background.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Potensi Desa</h2>
						<div class="section_subtitle text-capitalize"><p>Info Seputar mengenai Potensi Desa {{ $infodesa->nama_desa }}</p></div>
					</div>
				</div>
			</div>
			<div class="row courses_row">
				
				@foreach ($potensi as $item)
					<!-- Course -->
					<div class="col-lg-4 course_col">
						<div class="course">
							<div class="course_image"><img src="{{ asset('img/desa/potensi/'.$item->poto_potensi)}}" alt=""></div>
							<div class="course_body">
								<h3 class="course_title"><a href="{{ url('desa/potensi/'.Crypt::encryptString($item->id)) }}">{{ $item->nama_potensi }}</a></h3>
								{{-- <div class="course_teacher">Mr. John Taylor</div> --}}
								<div class="course_text">
									<p>{{ $item->keterangan_potensi }}</p>
								</div>
							</div>
							<div class="course_footer">
								<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
									<div class="course_info">
										<i class="fa fa-clone" aria-hidden="true"></i>
										<span>{{ DbCikara::countData('potensi_sub',['potensi_id',$item->id]) }} Sub Potensi</span>
									</div>
									<div class="course_info">
										<i class="fa fa-eye" aria-hidden="true"></i>
										<span>{{ $item->dilihat }} Dilihat</span>
									</div>
									<div class="course_price ml-auto"><a href="{{ url('desa/potensi/'.Crypt::encryptString($item->id)) }}">Detail</a></div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="#">Potensi Lainnya</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Counter -->

	<div class="counter">
		<div class="counter_background" style="background-image:url({{ asset('template/unicat/images/counter_background.jpg')}})"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="counter_content">
						<h2 class="counter_title">Lapor Warga</h2>
						<div class="counter_text"><p>Warga bisa melaporkan kepada pemerintah desa terkait keadaan desa baik dalam segi ekonomi, kesehatan, keamanan, ketertiban dan lain sebagainya.</p></div>

						<!-- Milestones -->

						<div class="milestones d-flex flex-md-row flex-column align-items-center justify-content-between">
							
							<!-- Milestone -->
							<div class="milestone">
								<div class="milestone_counter" data-end-value="{{ DbCikara::countData('lapor') }}">0</div>
								<div class="milestone_text">Laporan</div>
							</div>

							<!-- Milestone -->
							<div class="milestone">
								{{-- <div class="milestone_counter" data-end-value="120" data-sign-after="k">0</div> --}}
								<div class="milestone_counter" data-end-value="{{ DbCikara::countData('lapor',['status','proses']) }}">0</div>
								<div class="milestone_text">Diproses</div>
							</div>

							<!-- Milestone -->
							<div class="milestone">
								{{-- <div class="milestone_counter" data-end-value="670" data-sign-after="+">0</div> --}}
								<div class="milestone_counter" data-end-value="{{ DbCikara::countData('lapor',['status','menunggu']) }}">0</div>
								<div class="milestone_text">Tahap Konfirmasi</div>
							</div>

							<!-- Milestone -->
							<div class="milestone">
								<div class="milestone_counter" data-end-value="{{ DbCikara::countData('lapor',['status','selesai']) }}">0</div>
								<div class="milestone_text">Selesai</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<div class="counter_form">
				<div class="row fill_height">
					<div class="col fill_height">
						@if (is_null($user))
							<form class="counter_form_content d-flex flex-column align-items-center justify-content-center" action="#">
								<div class="counter_form_title">Form Lapor</div>
								<input type="text" class="counter_input" placeholder="Nama Lengkap" required="required">
								<input type="tel" class="counter_input" placeholder="Telepon" required="required">
								<select name="counter_select" id="counter_select" class="counter_input counter_options">
									<option>-- Pilih Kategori Laporan --</option>
									@foreach ($kategori as $item)
										<option value="{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</option>
									@endforeach
								</select>
								<textarea class="counter_input counter_text_input" placeholder="Message:" required="required"></textarea>
								{{-- <button type="submit" class="counter_form_button">Kirim Laporan</button> --}}
								<div class="alert alert-info">
									Silahkan login untuk melakukan laporan, untuk proses identifikasi laporan yang masuk. <a href="{{ url('login') }}">LOGIN DISINI</a>
								</div>
							</form>
						@else
							@php
								$penduduk = DbCikara::datapenduduk($user->name);
							@endphp
							<form class="counter_form_content d-flex flex-column align-items-center justify-content-center" action="{{ url('proseslapor') }}" method="post">
								@csrf
								<input type="hidden" name="user_id" value="{{ $user->id }}">
								<input type="hidden" name="status" value="menunggu">
								<div class="counter_form_title">Form Lapor</div>
								<input type="text" class="counter_input" value="{{ $penduduk->nama_penduduk }}" placeholder="Nama Lengkap" disabled>
								<input type="tel" class="counter_input" value="{{ $penduduk->no_telp }}" placeholder="Telepon" disabled>
								<select name="kategori" id="kategori" class="counter_input counter_options" required>
									<option value="">-- Pilih Kategori Laporan --</option>
									@foreach ($kategori as $item)
										<option value="{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</option>
									@endforeach
								</select>
								<textarea class="counter_input counter_text_input" name="isi" placeholder="Ketikkan laporan disini" required="required"></textarea>
								<button type="submit" class="counter_form_button">Kirim Laporan</button>
							</form>
						@endif
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- Events -->

	<div class="events">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Kegiatan Desa</h2>
						<div class="section_subtitle"><p>Berikut daftar kegiatan desa</p></div>
					</div>
				</div>
			</div>
			<div class="row events_row">

				<!-- Event -->
				<div class="col-lg-4 event_col">
					<div class="event event_left">
						<div class="event_image"><img src="{{ asset('template/unicat/images/event_1.jpg')}}" alt=""></div>
						<div class="event_body d-flex flex-row align-items-start justify-content-start">
							<div class="event_date">
								<div class="d-flex flex-column align-items-center justify-content-center trans_200">
									<div class="event_day trans_200">21</div>
									<div class="event_month trans_200">Aug</div>
								</div>
							</div>
							<div class="event_content">
								<div class="event_title"><a href="#">Seminar Anak Indonesia</a></div>
								<div class="event_info_container">
									<div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>15.00 - 19.30</span></div>
									<div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25 New York City</span></div>
									<div class="event_text">
										<p>Banyaknya potensi akan sumber daya manusia menjadi kan hal penting...</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Event -->
				<div class="col-lg-4 event_col">
					<div class="event event_mid">
						<div class="event_image"><img src="{{ asset('template/unicat/images/event_2.jpg')}}" alt=""></div>
						<div class="event_body d-flex flex-row align-items-start justify-content-start">
							<div class="event_date">
								<div class="d-flex flex-column align-items-center justify-content-center trans_200">
									<div class="event_day trans_200">27</div>
									<div class="event_month trans_200">Aug</div>
								</div>
							</div>
							<div class="event_content">
								<div class="event_title"><a href="#">Pelatihan Pengurus BUMDes</a></div>
								<div class="event_info_container">
									<div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>09.00 - 17.30</span></div>
									<div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25 Brooklyn City</span></div>
									<div class="event_text">
										<p>BUMDes menjadi wadah untuk meningkatkan perekonomian desa...</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Event -->
				<div class="col-lg-4 event_col">
					<div class="event event_right">
						<div class="event_image"><img src="{{ asset('template/unicat/images/event_3.jpg')}}" alt=""></div>
						<div class="event_body d-flex flex-row align-items-start justify-content-start">
							<div class="event_date">
								<div class="d-flex flex-column align-items-center justify-content-center trans_200">
									<div class="event_day trans_200">01</div>
									<div class="event_month trans_200">Sep</div>
								</div>
							</div>
							<div class="event_content">
								<div class="event_title"><a href="#">Sekolah mulai diaktifkan kembali</a></div>
								<div class="event_info_container">
									<div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>13.00 - 18.30</span></div>
									<div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25 New York City</span></div>
									<div class="event_text">
										<p>Masa pandemi merupakan hal yang begitu menyulitkan bagi para pelajar...</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Team -->

	<div class="team">
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
	</div>

	<!-- Latest News -->

	<div class="news">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Berita Terkini</h2>
						<div class="section_subtitle"><p>Kumpulan beberapa berita yang aktual dan terbaru</p></div>
					</div>
				</div>
			</div>
			<div class="row news_row">
				<div class="col-lg-7 news_col">
					
					<!-- News Post Large -->
					<div class="news_post_large_container">
						<div class="news_post_large">
							<div class="news_post_image"><img src="{{ asset('img/pengaturan/artikel/'.$berita['terbaru']->gambar_artikel)}}" alt=""></div>
							<div class="news_post_large_title text-capitalize"><a href="{{ url('halaman/berita/'.$berita['terbaru']->slud) }}">{{ $berita['terbaru']->judul_artikel }}</a></div>
							<div class="news_post_meta">
								<ul>
									<li><a href="#">admin</a></li>
									<li><a href="#">{{ $berita['terbaru']->created_at }}</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>{!! substr($berita['terbaru']->isi_artikel,0,200) !!}. . .</p>
							</div>
							<div class="news_post_link"><a href="{{ url('halaman/berita/'.$berita['terbaru']->slud) }}">Selengkapnya</a></div>
						</div>
					</div>
				</div>

				<div class="col-lg-5 news_col">
					<div class="news_posts_small">

						@forelse ($berita['list'] as $item)
							<div class="news_post_small">
								<div class="news_post_small_title text-capitalize"><a href="{{ url('halaman/berita/'.$berita['terbaru']->slud) }}">{{ $item->judul_artikel }}</a></div>
								<div class="news_post_meta">
									<ul>
										<li><a href="#">admin</a></li>
										<li><a href="#">november 11, 2017</a></li>
									</ul>
								</div>
							</div>
						@empty
							
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('template/unicat/images/newsletter.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for news and offers</div>
							<div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
						</div>

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto">
							<form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
								<input type="email" class="newsletter_input" placeholder="Your Email" required="required">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
    
@endsection