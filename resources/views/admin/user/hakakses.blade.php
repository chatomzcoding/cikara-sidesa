@extends('layouts.admin')

@section('title')
    Data User Staf
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data  User Staf</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('user?sesi=staf')}}">User Staf</a></li>
            <li class="breadcrumb-item active">Ubah Hak Akses</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
  
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- statistik -->
            {{-- <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total User</span>
                      <span class="info-box-number">
                        {{ $total['user'] }}
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Penduduk</span>
                      <span class="info-box-number">
                        {{ $total['penduduk'] }}
                      </span>
                    </div>
                  </div>
                </div>
      
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-times"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Penduduk Belum Daftar</span>
                      <span class="info-box-number">
                        {{ $total['belumdaftar'] }}
                      </span>
                    </div>
                  </div>
                </div>
            </div> --}}
            <div class="card">
              <div class="card-header">
                  <a href="{{ url('user?sesi=staf') }}" class="btn btn-outline-secondary btn-sm pop-info" title="Kembali ke daftar user staf"><i class="fas fa-angle-left"></i> Kembali</a>
                {{-- <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-sm float-right pop-info" title="Cetak daftar User"><i class="fas fa-print"></i> CETAK</a> --}}
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <div class="callout callout-info">
                    Ceklis untuk mengaktifkan menu untuk user <strong>{{ ucwords($user->name) }}</strong>
                  </div>
                    <div class="table-responsive">
                        <form action="{{ url('menu') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <table class="table">
                                <tr>
                                    <th width="25%">MENU / SUB MENU</th>
                                    <th class="text-center" width="10%">AKtif/Non-aktif</th>
                                </tr>
                                @foreach ($listmenu as $item)
                                    <tr>
                                        <th class="text-capitalize table-secondary" colspan="2">{{ $item[0] }}</th>
                                    </tr>
                                    @foreach ($item[1] as $label => $judul)
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;{{ $judul }}</td>
                                            <td class="text-center">
                                                <input type="checkbox" name="label[]" value="{{ $label }}" {{ DbCikara::ceklismenu($user->id,$label) }}>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                <tr>
                                    <td class="text-right" colspan="2">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    @section('script')
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy","excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            });
        </script>
    @endsection
    @endsection

