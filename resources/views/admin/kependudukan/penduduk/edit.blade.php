@extends('layouts.admin')

@section('title')
    Ubah data penduduk
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Penduduk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('penduduk')}}">Daftar Penduduk</a></li>
            <li class="breadcrumb-item active">Ubah Biodata Penduduk</li>
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
                <a href="{{ url('/penduduk')}}" class="btn btn-outline-secondary btn-flat btn-sm"><i class="fas fa-arrow-left"></i> Kembali ke daftar penduduk</a>
                <a href="{{ url('/penduduk/'.Crypt::encryptString($penduduk->id))}}" class="btn btn-outline-primary btn-flat btn-sm"><i class="fas fa-user"></i> Kembali ke detail penduduk</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                    <form action="{{ url('/penduduk/'.$penduduk->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <section>
                            <div class="alert alert-warning">
                                Tanda  <span class="text-danger">*</span> Wajib diisi !
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nik">NIK <span class="text-danger">*</span></label>
                                        <input type="text" name="nik" class="form-control" placeholder="Nomor NIK" pattern="[0-9]{16}"  value="{{ $penduduk->nik}}" maxlength="16" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nama_penduduk">Nama Lengkap <span class="font-italic">Tanpa Gelar</span><span class="text-danger">*</span></label>
                                        <input type="text" name="nama_penduduk" class="form-control" placeholder="Nama Lengkap" value="{{ $penduduk->nama_penduduk}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">KTP Elektronik<span class="text-danger">*</span></label>
                                        <select name="status_ktp" id="" class="form-control" required>
                                            <option value="belum" @if ($penduduk->status_ktp == 'belum')
                                                selected
                                            @endif>BELUM</option>
                                            <option value="ktp-el" @if ($penduduk->status_ktp == 'ktp-el')
                                                selected
                                            @endif>KTP-EL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Status Rekam<span class="text-danger">*</span></label>
                                        <select name="status_rekam" id="" class="form-control" required>
                                            <option value="">Pilih Status Rekam</option>
                                            @foreach (list_statusrekam() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->status_rekam)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tag ID Card</label>
                                        <input type="text" name="id_card" class="form-control" value="{{ $penduduk->id_card}}" placeholder="Tag Id Card">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nomor KK Sebelumnya</label>
                                        <input type="text" name="kk_sebelum" class="form-control" value="{{ $penduduk->kk_sebelum}}" placeholder="No KK Sebelumnya">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Hubungan Dalam Keluarga</label>
                                        <select name="hubungan_keluarga" id="" class="form-control">
                                            <option value="">Pilih Hubungan Keluarga</option>
                                            @foreach (list_hubungankeluarga() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->hubungan_keluarga)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin<span class="text-danger">*</span></label>
                                        <select name="jk" id="" class="form-control" required>
                                            <option value="">Jenis Kelamin</option>
                                            @foreach (list_jeniskelamin() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->jk)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Agama<span class="text-danger">*</span></label>
                                        <select name="agama" id="" class="form-control" required>
                                            <option value="">Pilih Agama</option>
                                            @foreach (list_agama() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->agama)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Status Penduduk<span class="text-danger">*</span></label>
                                        <select name="status_penduduk" id="" class="form-control" required>
                                            <option value="">Pilih Status Penduduk</option>
                                            @foreach (list_statuspenduduk() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->status_penduduk)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- data kelahiran --}}
                            <div class="alert alert-primary">
                                Data Kelahiran
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nomor Akta Kelahiran</label>
                                        <input type="text" name="no_akta" class="form-control" value="{{ $penduduk->no_akta}}" placeholder="Nomor Akta Kelahiran">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tempat Lahir<span class="text-danger">*</span></label>
                                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $penduduk->tempat_lahir}}" placeholder="Tempat Lahir" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir<span class="text-danger">*</span></label>
                                        <input type="date" name="tgl_lahir" value="{{ $penduduk->tgl_lahir}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Waktu Kelahiran</label>
                                        <input type="time" name="waktu_lahir" value="{{ $penduduk->waktu_lahir}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tempat Dilahirkan<span class="text-danger">*</span></label>
                                        <select name="tempat_dilahirkan" id="" class="form-control" required>
                                            <option value="">Pilih Tempat Dilahirkan</option>
                                            @foreach (list_tempatdilahirkan() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->tempat_dilahirkan)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jenis Kelahiran<span class="text-danger">*</span></label>
                                        <select name="jenis_kelahiran" id="" class="form-control" required>
                                            <option value="">Pilih Jenis Kelahiran</option>
                                            @foreach (list_jeniskelahiran() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->jenis_kelahiran)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Anak Ke<span class="text-danger">*</span></label>
                                        <input type="number" name="anak_ke" value="{{ $penduduk->anak_ke}}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Penolong Kelahiran<span class="text-danger">*</span></label>
                                        <select name="penolong_kelahiran" id="" class="form-control" required>
                                            <option value="">Pilih Penolong Kelahiran</option>
                                            @foreach (list_penolongkelahiran() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->penolong_kelahiran)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Berat Lahir <span class="font-italic">( Gram )</span></label>
                                        <input type="text" name="berat_lahir" value="{{ $penduduk->berat_lahir}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Panjang Lahir <span class="font-italic">( cm )</span></label>
                                        <input type="text" name="panjang_lahir" value="{{ $penduduk->panjang_lahir}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                           
                            {{-- pendidikan dan pekerjaan --}}
                            <div class="alert alert-primary">
                                Pendidikan dan Pekerjaan
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Pendidikan dalam KK<span class="text-danger">*</span></label>
                                        <select name="pendidikan_kk" id="" class="form-control listdata" data-width="100%" required>
                                            <option value="">Pilih Pendidikan (Dalam KK)</option>
                                            @foreach (list_pendidikandalamkk() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->pendidikan_kk)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Pendidikan Sedang Ditempuh<span class="text-danger">*</span></label>
                                        <select name="pendidikan_tempuh" id="" class="form-control listdata" data-width="100%" required>
                                            <option value="">Pilih Pendidikan</option>
                                            @foreach (list_pendidikantempuh() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->pendidikan_tempuh)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Pekerjaan<span class="text-danger">*</span></label>
                                        <select name="pekerjaan" id="" class="form-control listdata" data-width="100%" required>
                                            <option value="">Pilih Pekerjaan</option>
                                            @foreach (DbCikara::listdata('pekerjaan') as $item)
                                                <option value="{{ $item->nama}}" @if ($item->nama == $penduduk->pekerjaan)
                                                    selected
                                                @endif>{{ strtoupper($item->nama) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                           {{-- data kewarganegaraan --}}
                           <div class="alert alert-primary">
                                Data Kewarganegaraan
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Status Warga Negara<span class="text-danger">*</span></label>
                                        <select name="status_warganegara" id="" class="form-control" required>
                                            <option value="">Pilih Warga Negara</option>
                                            @foreach (list_statuskewarganegaraan() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->status_warganegara)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nomor Paspor</label>
                                        <input type="text" name="nomor_paspor" class="form-control" value="{{ $penduduk->nomor_paspor}}" placeholder="Nomor Paspor">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tgl Berakhir Paspor</label>
                                        <input type="date" name="tgl_akhirpaspor" value="{{ $penduduk->tgl_akhirpaspor}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nomor KITAS/KITAP</label>
                                        <input type="text" name="nomor_kitas" class="form-control" value="{{ $penduduk->nomor_kitas}}" placeholder="Nomor KITAS/KITAP">
                                    </div>
                                </div>
                            </div>
                           {{-- data orang tua --}}
                           <div class="alert alert-primary">
                                Data Orangtua
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">NIK Ayah<span class="text-danger">*</span></label>
                                        <input type="text" name="nik_ayah" class="form-control" value="{{ $penduduk->nik_ayah}}" placeholder="Nomor NIK Ayah" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Nama Ayah<span class="text-danger">*</span></label>
                                        <input type="text" name="nama_ayah" class="form-control" value="{{ $penduduk->nama_ayah}}" placeholder="Nama Ayah" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">NIK Ibu<span class="text-danger">*</span></label>
                                        <input type="text" name="nik_ibu" class="form-control" value="{{ $penduduk->nik_ibu}}" placeholder="Nomor NIK Ibu" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Nama Ibu<span class="text-danger">*</span></label>
                                        <input type="text" name="nama_ibu" class="form-control" value="{{ $penduduk->nama_ibu}}" placeholder="Nama Ibu" required>
                                    </div>
                                </div>
                            </div>
                            {{-- alamat --}}
                            <div class="alert alert-primary">
                                Alamat
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nomor Telepon</label>
                                        <input type="text" name="no_telp" class="form-control" value="{{ $penduduk->no_telp}}" placeholder="Nomor Telepon">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Alamat Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $penduduk->email}}" placeholder="Alamat Email">
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">RT<span class="text-danger">*</span></label>
                                        <select name="rt_id" id="" class="form-control" required>
                                            <option value="">-- Pilih RT --</option>
                                            @foreach ($rt as $item)
                                                <option value="{{ $item->id}}" @if ($item->id == $penduduk->rt_id)
                                                    selected
                                                @endif>RW {{ strtoupper($item->nama_rw.' | RT '.$item->nama_rt) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Alamat Sebelumnya</label>
                                        <input type="text" name="alamat_sebelum" class="form-control" value="{{ $penduduk->alamat_sebelum}}" placeholder="Alamat Sebelumnya">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Alamat Sekarang<span class="text-danger">*</span></label>
                                        <input type="text" name="alamat_sekarang" class="form-control" value="{{ $penduduk->alamat_sekarang}}" placeholder="Alamat Sekarang" required>
                                    </div>
                                </div>
                           </div>
                           {{-- status perkawinan --}}
                           <div class="alert alert-primary">
                                Status Perkawinan
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Status Perkawinan<span class="text-danger">*</span></label>
                                        <select name="status_perkawinan" id="" class="form-control" required>
                                            <option value="">Pilih Status Perkawinan</option>
                                            @foreach (list_statusperkawinan() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->status_perkawinan)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">No. Akta Nikah (Buku Nikah) / Perkawinan</label>
                                        <input type="text" name="no_bukunikah" class="form-control" value="{{ $penduduk->no_bukunikah}}" placeholder="Nomor Akta Nikah">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Perkawinan</label>
                                        <input type="date" name="tgl_perkawinan" class="form-control" value="{{ $penduduk->tgl_perkawinan}}" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Akta Perceraian</label>
                                        <input type="text" name="akta_perceraian" class="form-control" value="{{ $penduduk->akta_perceraian}}" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Tanggal Perceraian</label>
                                        <input type="date" name="tgl_perceraian" class="form-control" value="{{ $penduduk->tgl_perceraian}}" placeholder="">
                                    </div>
                                </div>
                            </div>
                            {{-- data kesehatan --}}
                            <div class="alert alert-primary">
                                Data Kesehatan
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Golongan Darah<span class="text-danger">*</span></label>
                                        <select name="golongan_darah" id="" class="form-control" required>
                                            <option value="">Pilih Golongan Darah</option>
                                            @foreach (list_golongandarah() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->golongan_darah)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Cacat<span class="text-danger">*</span></label>
                                        <select name="cacat" id="" class="form-control" required>
                                            <option value="">Pilih Jenis Cacat</option>
                                            @foreach (list_cacat() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->cacat)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Sakit Menahun<span class="text-danger">*</span></label>
                                        <select name="sakit_menahun" id="" class="form-control" required>
                                            <option value="">Pilih Sakit Menahun</option>
                                            @foreach (list_sakitmenahun() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->sakit_menahun)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Akseptor KB<span class="text-danger">*</span></label>
                                        <select name="akseptor_kb" id="" class="form-control" required>
                                            <option value="">Pilih Cara KB Saat ini</option>
                                            @foreach (list_akseptorkb() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->akseptor_kb)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Asuransi<span class="text-danger">*</span></label>
                                        <select name="asuransi" id="" class="form-control" required>
                                            <option value="">Pilih Asuransi</option>
                                            @foreach (list_asuransi() as $item)
                                                <option value="{{ $item}}" @if ($item == $penduduk->asuransi)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <hr>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
                            </div>
                        </section>
                    </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    {{-- <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/unit')}}" method="post">
                @csrf
                <input type="hidden" name="logo_unit" value="">
            <div class="modal-header">
            <h4 class="modal-title">Form Tambah Unit Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">email</label>
                        <input type="email" name="email" class="col-md-8 form-control" placeholder="masukkan email" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Password</label>
                        <input type="password" name="password" class="col-md-8 form-control" placeholder="masukkan password" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Unit</label>
                        <input type="text" name="nama_unit" class="col-md-8 form-control" placeholder="masukkan nama unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Manajer Unit</label>
                        <input type="text" name="manajer_unit" class="col-md-8 form-control" placeholder="masukkan nama manajer unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Staf Unit</label>
                        <input type="text" name="staf_unit" class="col-md-8 form-control" placeholder="masukkan nama staff unit" required>
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
    </div> --}}
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

