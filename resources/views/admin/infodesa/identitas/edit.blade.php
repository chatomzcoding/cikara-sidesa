@extends('layouts.admin')

@section('title')
    Ubah Data Desa
@endsection
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Identitas Desa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('profil')}}">Identitas Desa</a></li>
            <li class="breadcrumb-item active">Ubah Identitas Desa</li>
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
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                        <form action="{{ url('/profil/'.$profil->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr class="table-info">
                                        <th colspan="3">DESA</th>
                                    </tr>
                                    <tr>
                                        <th width="30%">Nama Desa</th>
                                        <td width="1%">:</td>
                                        <td><input type="text" name="nama_desa" value="{{ $profil->nama_desa}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Desa</th>
                                        <td>:</td>
                                        <td><input type="text" name="kode_desa" value="{{ $profil->kode_desa}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Pos Desa</th>
                                        <td>:</td>
                                        <td><input type="text" name="kode_pos" value="{{ $profil->kode_pos}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Kepala Desa</th>
                                        <td>:</td>
                                        <td><input type="text" name="kepala_desa" value="{{ $profil->kepala_desa}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>NIP Kepala Desa</th>
                                        <td>:</td>
                                        <td><input type="text" name="nip_kepaladesa" value="{{ $profil->nip_kepaladesa}}" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Kantor Desa</th>
                                        <td>:</td>
                                        <td>
                                            <textarea name="alamat" id="" class="form-control" cols="30" rows="3" required>{{ $profil->alamat}}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>E-mail Kantor</th>
                                        <td>:</td>
                                        <td><input type="email" name="email" value="{{ $profil->email}}" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Telepon Desa</th>
                                        <td>:</td>
                                        <td><input type="text" name="telepon" value="{{ $profil->telepon}}" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Website Desa</th>
                                        <td>:</td>
                                        <td><input type="url" name="website" value="{{ $profil->website}}" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Kecamatan</th>
                                        <td>:</td>
                                        <td><input type="text" name="nama_kecamatan" value="{{ $profil->nama_kecamatan}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Kecamatan</th>
                                        <td>:</td>
                                        <td><input type="text" name="kode_kecamatan" value="{{ $profil->kode_kecamatan}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Camat</th>
                                        <td>:</td>
                                        <td><input type="text" name="nama_camat" value="{{ $profil->nama_camat}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>NIP Camat</th>
                                        <td>:</td>
                                        <td><input type="text" name="nip_camat" value="{{ $profil->nip_camat}}" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Kabupaten</th>
                                        <td>:</td>
                                        <td><input type="text" name="nama_kabupaten" value="{{ $profil->nama_kabupaten}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Kabupaten</th>
                                        <td>:</td>
                                        <td><input type="text" name="kode_kabupaten" value="{{ $profil->kode_kabupaten}}" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Provinsi</th>
                                        <td>:</td>
                                        <td><input type="text" name="provinsi" value="{{ $profil->provinsi}}" class="form-control" required></td>

                                    </tr>
                                    <tr>
                                        <th>Kode Provinsi</th>
                                        <td>:</td>
                                        <td><input type="text" name="kode_provinsi" value="{{ $profil->kode_provinsi}}" class="form-control" required></td>
                                    </tr>
                                </table>
                                <section>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-success btn-sm">SIMPAN PERUBAHAN</button>
                                    </div>
                                </section>
                              </div>
                        </form>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection

