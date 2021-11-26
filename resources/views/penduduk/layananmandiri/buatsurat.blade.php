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
                <span class="btn btn-outline-info btn-sm float-right"><i class="fas fa-envelope"></i> Surat {{ $format->nama_surat }}</span>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('penduduksurat/'.$surat->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="menunggu">
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
                                    {{-- form looping --}}
                                    @foreach (format_surat($format->kode) as $item)
                                    <tr>
                                        <th width="30%">
                                            <div class="form-group pt-2 pb-0">
                                                <label for="" class="text-capitalize">{{ nama_label($item,$format->kode) }} <strong class="text-danger">*</strong></label>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="form-group">
                                                @switch(form_view($item))
                                                    @case('nomor')
                                                        <input type="text" name="{{ $item }}" pattern="[0-9]{16}" maxlength="16" class="form-control" required>
                                                        <span class="text-danger small font-italic">* jumlah 16 angka</span>
                                                    @break
                                                    @case('tanggal')
                                                        <input type="date" name="{{ $item }}" class="form-control" required>
                                                        @break
                                                    @case('waktu')
                                                        <input type="time" name="{{ $item }}" class="form-control" required>
                                                        @break
                                                    @case('angka')
                                                        <input type="number" name="{{ $item }}" min="1" class="form-control" required>
                                                        @break
                                                    @case('jk')
                                                        <select name="jk" id="" class="form-control" required>
                                                            @foreach (list_jeniskelamin() as $item)
                                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @break
                                                    @case('agama')
                                                        <select name="{{ $item }}" id="" class="form-control" required>
                                                            <option value="">-- pilih agama --</option>
                                                            @foreach (list_agama() as $item)
                                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @break
                                                    @case('pekerjaan')
                                                        <select name="{{ $item }}" id="" class="form-control" required>
                                                            <option value="">-- pilih pekerjaan --</option>
                                                            @foreach (list_pekerjaan() as $item)
                                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @break
                                                    @case('warganegara')
                                                        <select name="{{ $item }}" id="" class="form-control" required>
                                                            <option value="">-- Pilih Warga Negara --</option>
                                                            @foreach (list_statuskewarganegaraan() as $item)
                                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @break
                                                    @default
                                                        <input type="text" name="{{ $item }}" class="form-control" required>
                                                @endswitch
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
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

