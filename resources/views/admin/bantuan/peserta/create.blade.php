@extends('layouts.admin')
@section('title')
    SIDESA - Tambah Peserta Bantuan {{ $bantuan->nama_program}}
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Peserta Program Bantuan {{ $bantuan->nama_program}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('bantuan')}}">Daftar Program Bantuan</a></li>
            <li class="breadcrumb-item"><a href="{{ url('bantuan/'.Crypt::encryptString($bantuan->id))}}">Rincian Program Bantuan {{ $bantuan->nama_program}}</a></li>
            <li class="breadcrumb-item active">Tambah Peserta</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
  
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="{{ url('/bantuan')}}" class="btn btn-outline-primary btn-flat btn-sm"><i class="fas fa-plus"></i> Kembali Ke Daftar Program Bantuan</a>
                <a href="{{ url('/bantuan/'.Crypt::encryptString($bantuan->id))}}" class="btn btn-outline-primary btn-flat btn-sm"><i class="fas fa-plus"></i> Kembali Ke Rincian Program Bantuan</a>
              </div>
              <div class="card-body">
                @include('sistem.notifikasi')
                  <h2>Rincian Program</h2>
                  <section class="mb-3">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama Program</th>
                            <td>: {{ $bantuan->nama_program}}</td>
                        </tr>
                        <tr>
                            <th>Sasaran Program</th>
                            <td>: {{ $bantuan->sasaran}}</td>
                        </tr>
                        <tr>
                            <th>Masa Berlaku</th>
                            <td>: {{ $bantuan->tgl_mulai.' '.$bantuan->tgl_akhir}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $bantuan->keterangan}}</td>
                        </tr>

                    </table>
                  </section>
                  <section>
                      <h2>Tambah Peserta Program</h2>
                      <form action="" method="post">
                          <div class="form-group row">
                            <label for="" class="col-md-4">Cari No. KK / Nama Penduduk</label>
                            <select name="penduduk_id" id="" class="form-control col-md-8">
                                @foreach ($penduduk as $item)
                                    <option value="{{ $item->id}}">{{ $item->nik.' | '.$item->nama_penduduk}}</option>
                                @endforeach
                            </select>
                          </div>
                      </form>
                  </section>
                  <section>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <i class="fas fa-user"></i> Konfirmasi Peserta
                                </div>
                                <div class="card-body">
                                    <table width="100%">
                                        <tr>
                                            <th>
                                                NIK Penduduk
                                            </th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Nama Peserta
                                            </th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nomor KK</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nama Kepala Keluarga</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status KK</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Peserta</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Tanggal, Lahir</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Umur</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Warga Negara</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Bantuan yang diterima</th>
                                            <td>
                                                    <input type="text" name="jk" class="form-control form-control-sm" placeholder="kosong" disabled>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <i class="fas fa-list"></i> Identitas Pada Kartu Peserta
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('/pesertabantuan')}}" method="post">
                                        @csrf
                                        <table width="100%">
                                            <tr>
                                                <th>
                                                    Nomor Kartu Peserta
                                                </th>
                                                <td>
                                                    <input type="text" name="no_kartu" class="form-control form-control-sm" placeholder="Nomor Kartu Peserta">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Gambar Kartu Peserta
                                                </th>
                                                <td>
                                                        <input type="file" name="file_kartu" class="form-control form-control-sm">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>
                                                    <input type="text" name="nik" class="form-control form-control-sm" placeholder="nik">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td>
                                                        <input type="text" name="nama" class="form-control form-control-sm" placeholder="nama">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tempat Lahir</th>
                                                <td>
                                                    <input type="text" name="tempat_lahir" class="form-control form-control-sm" placeholder="lahir">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td>
                                                    <input type="date" name="tempat_lahir" class="form-control form-control-sm">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>
                                                        <input type="text" name="alamat" class="form-control form-control-sm" placeholder="alamat">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> SIMPAN</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                  </section>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/anggotakeluarga')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Kepala Keluarga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   
                    <div class="form-group">
                        <label for="">Hubungan Keluarga</label>
                        <select name="hubungan" id="" class="form-control" required>
                            <option value="">Pilih Hubungan Keluarga</option>
                            @foreach (list_hubungankeluarga() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <!-- /.modal -->

    {{-- modal edit --}}
    {{-- <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('unit.update','test')}}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="logo_unit" value="">
            <div class="modal-header">
            <h4 class="modal-title">Form Edit Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Unit</label>
                        <input type="text" id="nama_unit" name="nama_unit" class="col-md-8 form-control" placeholder="masukkan nama unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Manajer Unit</label>
                        <input type="text" id="manajer_unit" name="manajer_unit" class="col-md-8 form-control" placeholder="masukkan nama manajer unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Staf Unit</label>
                        <input type="text" id="staf_unit" name="staf_unit" class="col-md-8 form-control" placeholder="masukkan nama staff unit" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
            </div>
            </form>
        </div>
        </div>
    </div> --}}
    <!-- /.modal -->

    {{-- @section('script')
        
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_unit = button.data('nama_unit')
                var manajer_unit = button.data('manajer_unit')
                var staf_unit = button.data('staf_unit')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_unit').val(nama_unit);
                modal.find('.modal-body #manajer_unit').val(manajer_unit);
                modal.find('.modal-body #staf_unit').val(staf_unit);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    @endsection --}}
    @endsection

