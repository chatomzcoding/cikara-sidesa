@extends('layouts.admin')

@section('title')
    Data Pembuatan Surat
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Pembuatan Surat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('layanan/surat')}}">Daftar Surat</a></li>
            <li class="breadcrumb-item active">Buat Surat</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
  
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="{{ url('layananmandiri/surat') }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-angle-left"></i> Kembali </a>
                <a href="{{ asset('file/surat/'.$format->file_surat) }}" target="_blank" class="btn btn-outline-info btn-sm float-right"><i class="fas fa-list"></i> {{ $format->nama_surat }}</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('penduduksurat/'.$surat->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="tgl_awal" value="{{ tgl_sekarang() }}">
                                <input type="hidden" name="tgl_akhir" value="{{ tgl_sekarang() }}">
                                <input type="hidden" name="kode" value="{{ $format->kode }}">
                                <table width="100%">
                                    <tr>
                                        <td colspan="2">
                                            <div class="alert alert-warning">
                                                Tanda <strong class="text-danger">*</strong> Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td>: {{ $surat->nomor_surat }}</td>
                                    </tr>
                                    {{-- pilih halaman berdasarkan kode --}}
                                    @php
                                        $ak     = explode('-',$format->kode); 
                                    @endphp
                                    @include('penduduk.layananmandiri.formatsurat.index');
                                    {{-- @switch($format->kode)
                                        @case('S-01')
                                            @include('penduduk.layananmandiri.formatsurat.s-01')
                                            @break
                                        @case('S-02')
                                            @include('penduduk.layananmandiri.formatsurat.s-02')
                                            @break
                                        @case('S-03')
                                            @include('penduduk.layananmandiri.formatsurat.s-03')
                                            @break
                                        @case('S-04')
                                            @include('penduduk.layananmandiri.formatsurat.s-04')
                                            @break

                                        @case('S-05')
                                            @include('penduduk.layananmandiri.formatsurat.s-05')
                                            @break
                                        @case('S-07')
                                            @include('penduduk.layananmandiri.formatsurat.s-07')
                                            @break
                                        @case('S-09')
                                            @include('penduduk.layananmandiri.formatsurat.s-09')
                                            @break
                                        @case('S-10')
                                            @include('penduduk.layananmandiri.formatsurat.s-10')
                                            @break
                                        @case('S-11')
                                            @include('penduduk.layananmandiri.formatsurat.s-11')
                                            @break
                                        @case('S-12')
                                            @include('penduduk.layananmandiri.formatsurat.s-12')
                                            @break
                                        @case('S-13')
                                            @include('penduduk.layananmandiri.formatsurat.s-13')
                                            @break
                                        @default
                                            
                                    @endswitch --}}
                                    <tr>
                                        <td colspan="2" class="text-right">
                                            <button type="submit" class="btn btn-primary btn-sm">AJUKAN SURAT</button>
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
    </div>
    @endsection

