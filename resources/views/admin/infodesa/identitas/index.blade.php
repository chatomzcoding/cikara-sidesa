@extends('layouts.admin')
@section('title')
    Info Desa
@endsection
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Identitas Desa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Identitas Desa</li>
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
                 @if (aksesadmin())
                 <a href="{{ url('/profil/'.Crypt::encryptString($profil->id).'/edit')}}" class="btn btn-outline-success btn-sm pop-info" title="Ubah Data Desa"><i class="fas fa-pen"></i> Ubah Data</a>
                 @endif
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  @if ($info)
                    <section class="mb-3">
                        <img src="{{ asset('/img/pengaturan/'.$info->gambar)}}" alt="" width="100%">
                    </section>
                  @endif
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <tr class="table-info">
                            <th colspan="3">DESA</th>
                        </tr>
                        <tr>
                            <th width="30%">Nama Desa</th>
                            <td width="1%">:</td>
                            <td>{{ $profil->nama_desa}}</td>
                        </tr>
                        <tr>
                            <th>Kode Desa</th>
                            <td>:</td>
                            <td>{{ $profil->kode_desa}}</td>
                        </tr>
                        <tr>
                            <th>Kode Pos Desa</th>
                            <td>:</td>
                            <td>{{ $profil->kode_pos}}</td>
                        </tr>
                        <tr>
                            <th>Kepala Desa</th>
                            <td>:</td>
                            <td>{{ ucwords($profil->kepala_desa)}}</td>
                        </tr>
                        <tr>
                            <th>NIP Kepala Desa</th>
                            <td>:</td>
                            <td>{{ $profil->nip_kepaladesa}}</td>
                        </tr>
                        <tr>
                            <th>Alamat Kantor Desa</th>
                            <td>:</td>
                            <td>{{ $profil->alamat}}</td>
                        </tr>
                        <tr>
                            <th>E-mail Kantor</th>
                            <td>:</td>
                            <td>{{ $profil->email}}</td>
                        </tr>
                        <tr>
                            <th>Telepon Desa</th>
                            <td>:</td>
                            <td>{{ $profil->telepon}}</td>
                        </tr>
                        <tr>
                            <th>Website Desa</th>
                            <td>:</td>
                            <td><a href="{{ $profil->website}}" target="_blank">{{ $profil->website}}</a> </td>
                        </tr>
                        <tr class="table-info">
                            <th colspan="3">KECAMATAN</th>
                        </tr>
                        <tr>
                            <th>Nama Kecamatan</th>
                            <td>:</td>
                            <td class="text-uppercase">{{ $profil->nama_kecamatan}}</td>
                        </tr>
                        <tr>
                            <th>Kode Kecamatan</th>
                            <td>:</td>
                            <td>{{ $profil->kode_kecamatan}}</td>
                        </tr>
                        <tr>
                            <th>Nama Camat</th>
                            <td>:</td>
                            <td>{{ ucwords($profil->nama_camat)}}</td>
                        </tr>
                        <tr>
                            <th>NIP Camat</th>
                            <td>:</td>
                            <td>{{ $profil->nip_camat}}</td>
                        </tr>
                        <tr class="table-info">
                            <th colspan="3">KABUPATEN</th>
                        </tr>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <td>:</td>
                            <td class="text-uppercase">{{ $profil->nama_kabupaten}}</td>
                        </tr>
                        <tr>
                            <th>Kode Kabupaten</th>
                            <td>:</td>
                            <td class="text-uppercase">{{ $profil->kode_kabupaten}}</td>
                        </tr>
                        <tr class="table-info">
                            <th colspan="3">PROVINSI</th>
                        </tr>
                        <tr>
                            <th>Nama Provinsi</th>
                            <td>:</td>
                            <td class="text-uppercase">{{ $profil->provinsi}}</td>
                        </tr>
                        <tr>
                            <th>Kode Provinsi</th>
                            <td>:</td>
                            <td class="text-uppercase">{{ $profil->kode_provinsi}}</td>
                        </tr>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
   

@endsection
