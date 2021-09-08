@php
	  $info = App\Models\Infowebsite::first(); 
    $user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  <link href="{{  asset('img/'.$info->logo_brand)}}" rel="icon">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/summernote/summernote-bs4.min.css')}}">

  <link rel="stylesheet" href="{{ asset('css/style.css')}}">

  {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert2.css')}}"></script>

    <script type="text/javascript" src="{{ asset('/vendor/ckeditor/ckeditor.js')}}"></script>

  @livewireStyles

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" target="_blank" class="nav-link">Halaman Utama</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('member') }}" class="nav-link">Kontak</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('template/admin/lte/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('template/admin/lte/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('template/admin/lte/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard')}}" class="brand-link">
      <img src="{{ asset('template/admin/lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIdesa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/admin/lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $user->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ url('/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p class="text">Beranda</p>
            </a>
          </li>
          @switch(Auth::user()->level)
              @case('admin')
                @include('admin.data.menu')
                @break

              @case('unit')
                @include('unit.data.menu')
                  @break
              @default
                  
          @endswitch
          @if (Auth::user()->level == 'pimpinan')
          @endif
          <li class="nav-header">SISTEM</li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Bantuan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-book-open nav-icon"></i>
                  <p>Panduan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Kontak Kami</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p class="text">Pengaturan</p>
            </a>
          </li>
          <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
               @csrf
               <a href="{{ route('logout') }}"  class="nav-link"
                        onclick="event.preventDefault();
                               this.closest('form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i> Keluar
            </a>
            </form>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @yield('header')
         
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
        <section class="content">
          @yield('container')
        </section>
    {{-- @yield('content') --}}
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template/admin/lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template/admin/lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/admin/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('template/admin/lte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('template/admin/lte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('template/admin/lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template/admin/lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('template/admin/lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template/admin/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('template/admin/lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template/admin/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/admin/lte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template/admin/lte/dist/js/pages/dashboard.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('template/admin/lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('template/admin/lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/admin/lte/dist/js/demo.js')}}"></script>

<script>
  	function deleteRow(id)
        {
            swal({
                title: "Yakin akan menghapus data ini?",
                text: "Data yang terhapus tidak bisa dikembalikan lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#data-'+id).submit();
                    }
                });
		}

    var rupiah = document.getElementById('rupiah');
	rupiah.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value, 'Rp. ');
	});
	var rupiah1 = document.getElementById('rupiah1');
	rupiah1.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah1.value = formatRupiah(this.value, 'Rp. ');
	});
	var rupiah2 = document.getElementById('rupiah2');
	rupiah2.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah2.value = formatRupiah(this.value, 'Rp. ');
	});
	var rupiah3 = document.getElementById('rupiah3');
	rupiah3.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah3.value = formatRupiah(this.value, 'Rp. ');
	});

	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
	
		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
	
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>
@yield('script')

</body>
</html>
