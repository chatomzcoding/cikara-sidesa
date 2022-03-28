<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>JantungDesa - {{ ucwords($title) }}</title>
  <link href="{{  asset('img/logo-jantungdesa.png')}}" rel="icon">


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
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/summernote/summernote-bs4.min.css')}}">

  <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css')}}">

    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert2.css')}}"></script>

    <script type="text/javascript" src="{{ asset('/vendor/ckeditor/ckeditor.js')}}"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <style>

.select2-hidden-accessible {
    border: 0 !important;
    clip: rect(0 0 0 0) !important;
    height: 1px !important;
    margin: -1px !important;
    overflow: hidden !important;
    padding: 0 !important;
    position: absolute !important;
    width: 1px !important
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 50%;
    padding: 6px 12px;
    height: 34px
}

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 20px
}

.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 28px;
    user-select: none;
    -webkit-user-select: none
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-right: 10px
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 0;
    padding-right: 0;
    height: auto;
    margin-top: -3px
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 4px;
    padding: 6px 12px;
    height: 40px !important
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 6px !important;
    right: 1px;
    width: 20px
}
  </style>
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
    </ul>

    <!-- SEARCH FORM -->
    @if ($user->level <> 'penduduk')
      <form action="{{ url('penduduk') }}" method="get" class="form-inline ml-3">
        @csrf
        <input type="hidden" name="data" value="cari">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="cari" type="search" placeholder="Cari NIK/Nama" aria-label="Search" required>
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    @endif

    <ul class="navbar-nav ml-auto">

      @if ($user->level <> 'penduduk')
        <li class="nav-item dropdown">
          @php
              $totalnotifikasi = DbCikara::datanotifikasi('total');
          @endphp
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{ $totalnotifikasi}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{ $totalnotifikasi}} Notifikasi</span>
            <div class="dropdown-divider"></div>
            <a href="{{ url('suratpenduduk') }}" class="dropdown-item">
              <i class="fas fa-envelope-open mr-2"></i>  Surat Pengajuan
              <span class="float-right text-muted text-sm">{{ DbCikara::datanotifikasi('suratpenduduk') }}</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ url('user') }}" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Ubah Password
              <span class="float-right text-muted text-sm">{{ DbCikara::datanotifikasi('ubahpassword') }}</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ url('lapor') }}" class="dropdown-item">
              <i class="fas fa-file-signature mr-2"></i> Laporan Baru
              <span class="float-right text-muted text-sm">{{ DbCikara::datanotifikasi('laporan') }}</span>
            </a>
            {{-- <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
          </div>
        </li>
      @endif
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}" role="button">
          <i class="fas fa-home"></i> Halaman Depan
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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard')}}" class="brand-link">
      <img src="{{  asset('img/logo-jantungdesa.png')}}" alt="JantungDesa" class="brand-image img-circle">
      <span class="brand-text font-weight-light"><strong>Jantung Desa</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-1 d-flex">
        <div class="image">
          <img src="{{ asset(avatar($user))}}" class="img-circle elevation-2" alt="{{ avatar($user) }}">
        </div>
        <div class="info">
          @if ($user->level == 'penduduk')
            <a href="#" class="d-block text-capitalize">{{ DbCikara::datapenduduk($user->id,'id')->nama_penduduk}}</a>
          @else
            <a href="#" class="d-block text-capitalize">{{ $user->name}}</a><span class="text-white small font-italic">{{ $user->level }}</span>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/dashboard')}}" class="nav-link small {{ menuaktif($menu,'beranda') }}">
              <i class="nav-icon fas fa-home"></i>
              <p class="text">Beranda</p>
            </a>
          </li>
          @switch(Auth::user()->level)
              @case('admin')
                @include('admin.data.menu')
                @break
              @case('staf')
                @include('staf.data.menu')
                @break

              @case('penduduk')
                @include('penduduk.data.menu')
                  @break
              @default
          @endswitch
          <li class="nav-header pt-0">SISTEM</li>
          <li class="nav-item">
            <a href="{{ url('user/'.Crypt::encryptString(Auth::user()->id).'/edit') }}" class="nav-link small {{ menuaktif($menu,'pengaturan') }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p class="text">Pengaturan</p>
            </a>
          </li>
          <li class="nav-item bg-secondary">
              <form method="POST" action="{{ route('logout') }}">
               @csrf
               <a href="{{ route('logout') }}"  class="nav-link text-light small"
                        onclick="event.preventDefault();
                               this.closest('form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i><p>Keluar</p>
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
            {{ $header }}
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
        <section class="content">
          {{ $content }}
        </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <a href="https://adminlte.io">AdminLTE.io</a>. Pengembang <a href="https://cikarastudio.com/">Cikara Studio</a></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2021.10
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
<script src="{{ asset('vendor/select2/dist/js/select2.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/admin/lte/dist/js/demo.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2({
      closeOnSelect: true
    });
  });
  $(function () {
    $('.pop-info').tooltip()
  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
      $(".penduduk").select2();
  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
      $(".listdata").select2();
  })
</script>
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
{{ $kodejs ?? '' }}

</body>
</html>
