@extends('layouts.admin')
@section('title')
    SIDESA - edit info {{ $info->nama}}
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Tentang Desa - Edit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('info?page=tentang')}}">Info Tentang Desa</a></li>
            <li class="breadcrumb-item active">Edit Info</li>
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
                <a href="{{ url('/info?page=tentang')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar tentang"><i class="fas fa-angle-left"></i> Kembali</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section>
                        <form action="{{ url('/info/'.$info->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="page" value="tentang">
                            <input type="hidden" name="id" value="{{ $info->id }}">
                            @method('patch')
                            <div class="form-group row">
                                <label for="" class="col-md-4 p-2">Nama Info <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control col-md-8" value="{{ $info->nama}}" readonly>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 p-2">Gambar Info (opsional)</label>
                                <div class="col-md-4">
                                    <img src="{{ asset('img/pengaturan/'.$info->gambar) }}" alt="" width="100%">
                                </div>
                                <div class="col-md-4">
                                    <label for="">upload gambar jika ingin merubah</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">isi Info <span class="text-danger">*</span></label>
                                <textarea name="detail" id="detail" cols="30" rows="10">{{ $info->detail}}</textarea>
                            </div>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace('detail', {
                                width: '100%',
                                height: 350
                                });
                            </script>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
                            </div>
                        </form>
                  </section>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection

