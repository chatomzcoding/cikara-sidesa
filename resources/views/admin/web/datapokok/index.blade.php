@extends('layouts.admin')
@section('title')
    Admin - Data Pokok
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Pokok</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Data Pokok</li>
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
                {{-- <a href="{{ url('/artikel')}}" class="btn btn-outline-dark btn-flat btn-sm"><i class="fas fa-print"></i> Kembali ke artikel</a> --}}
            </div>
            <div class="card-body">
                @include('sistem.notifikasi')
                <section>
                    <form action="{{ url('/datapokok/'.$datapokok->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $datapokok->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Teks diatas</label>
                                    <input type="text" name="teks_atas" value="{{ $datapokok->teks_atas}}" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Alamat Email</label>
                                    <input type="email" name="email" value="{{ $datapokok->email}}" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">No Telp</label>
                                    <input type="text" name="telp" value="{{ $datapokok->telp}}" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Alamat</label>
                                    <input type="text" name="alamat" value="{{ $datapokok->alamat}}" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Tentang Website</label>
                                    <textarea name="tentang" id="" class="form-control col-md-8" cols="30" rows="4">{{ $datapokok->tentang}}</textarea>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Alamat di Google Maps</label>
                                    <textarea name="maps" id="" class="form-control col-md-8" cols="30" rows="4">{{ $datapokok->maps}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-4 p-2">
                                        <img src="{{ asset('img/'.$datapokok->logo_brand)}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="" >Logo Brand</label>
                                        <input type="file" name="logo_brand" class="form-control">
                                        <i>unggah jika ingin merubah</i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 p-2">
                                        <img src="{{ asset('img/'.$datapokok->bg_produk)}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="" >Background Produk</label>
                                        <input type="file" name="bg_produk" class="form-control">
                                        <i>unggah jika ingin merubah</i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Facebook</label>
                                    <input type="url" name="link_fb" value="{{ $datapokok->link_fb}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Twitter</label>
                                    <input type="url" name="link_tw" value="{{ $datapokok->link_tw}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Youtube</label>
                                    <input type="url" name="link_yt" value="{{ $datapokok->link_yt}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Instagram</label>
                                    <input type="url" name="link_ig" value="{{ $datapokok->link_ig}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Pinterest</label>
                                    <input type="url" name="link_pi" value="{{ $datapokok->link_pi}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Linkedin</label>
                                    <input type="url" name="link_in" value="{{ $datapokok->link_in}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-pen"></i> SIMPAN PERUBAHA</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            </div>
        </div>
        </div>
    </div>

@endsection

    @section('script')
        
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_iklan = button.data('nama_iklan')
                var deskripsi = button.data('deskripsi')
                var posisi = button.data('posisi')
                var nama_link = button.data('nama_link')
                var link = button.data('link')
                var teks_kecil = button.data('teks_kecil')
                var teks_penting = button.data('teks_penting')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_iklan').val(nama_iklan);
                modal.find('.modal-body #deskripsi').val(deskripsi);
                modal.find('.modal-body #posisi').val(posisi);
                modal.find('.modal-body #teks_kecil').val(teks_kecil);
                modal.find('.modal-body #teks_penting').val(teks_penting);
                modal.find('.modal-body #nama_link').val(nama_link);
                modal.find('.modal-body #link').val(link);
                modal.find('.modal-body #status').val(status);
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
    @endsection