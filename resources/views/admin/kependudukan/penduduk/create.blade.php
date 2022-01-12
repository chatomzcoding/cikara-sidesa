@extends('layouts.admin')

@section('title')
    Tambah Data Penduduk
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
            <li class="breadcrumb-item active">Biodata Penduduk</li>
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
                <a href="{{ url('/penduduk')}}" class="btn btn-outline-primary btn-flat btn-sm"><i class="fas fa-arrow-left"></i> Kembali ke daftar penduduk</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                    <form action="{{ url('/penduduk')}}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                        <input type="text" name="nik" class="form-control" placeholder="Nomor NIK" pattern="[0-9]{16}"  value="{{ old('nik')}}" maxlength="16" required>
                                        @if (session('nik'))
                                            <span class="text-danger">
                                                {{ session('nik') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nama_penduduk">Nama Lengkap <span class="font-italic">Tanpa Gelar</span><span class="text-danger">*</span></label>
                                        <input type="text" name="nama_penduduk" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama_penduduk')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">KTP Elektronik</label>
                                        <select name="status_ktp" id="" class="form-control" required>
                                            <option value="belum">BELUM</option>
                                            <option value="sudah">KTP-EL</option>
                                            <option value="proses">Dalam Proses</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Status Rekam</label>
                                        <select name="status_rekam" id="" class="form-control" required>
                                            @foreach (list_statusrekam() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tag ID Card</label>
                                        <input type="text" name="id_card" class="form-control" value="{{ old('id_card')}}" placeholder="Tag Id Card">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nomor KK Sebelumnya</label>
                                        <input type="text" name="kk_sebelum" maxlength="16" pattern="[0-9]{16}" class="form-control" value="{{ old('kk_sebelum')}}" placeholder="No KK Sebelumnya">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Hubungan Dalam Keluarga</label>
                                        <select name="hubungan_keluarga" id="" class="form-control">
                                            <option value="">Pilih Hubungan Keluarga</option>
                                            @foreach (list_hubungankeluarga() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
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
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
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
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Status Penduduk</label>
                                        <select name="status_penduduk" id="" class="form-control" required>
                                            @foreach (list_statuspenduduk() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
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
                                        <input type="text" name="no_akta" class="form-control" value="{{ old('no_akta')}}" placeholder="Nomor Akta Kelahiran">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tempat Lahir<span class="text-danger">*</span></label>
                                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir')}}" placeholder="Tempat Lahir" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir<span class="text-danger">*</span></label>
                                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir')}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Waktu Kelahiran</label>
                                        <input type="time" name="waktu_lahir" value="{{ old('waktu_lahir')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tempat Dilahirkan</label>
                                        <select name="tempat_dilahirkan" id="" class="form-control" required>
                                            @foreach (list_tempatdilahirkan() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jenis Kelahiran</label>
                                        <select name="jenis_kelahiran" id="" class="form-control" required>
                                            @foreach (list_jeniskelahiran() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Anak Ke</label>
                                        <input type="number" name="anak_ke" value="0" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Penolong Kelahiran</label>
                                        <select name="penolong_kelahiran" id="" class="form-control" required>
                                            @foreach (list_penolongkelahiran() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Berat Lahir <span class="font-italic">( Gram )</span></label>
                                        <input type="text" name="berat_lahir" value="{{ old('berat_lahir')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Panjang Lahir <span class="font-italic">( cm )</span></label>
                                        <input type="text" name="panjang_lahir" value="{{ old('panjang_lahir')}}" class="form-control">
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
                                        <label for="">Pendidikan dalam KK</label>
                                        <select name="pendidikan_kk" id="" class="form-control" required>
                                            @foreach (list_pendidikandalamkk() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Pendidikan Sedang Ditempuh</label>
                                        <select name="pendidikan_tempuh" id="" class="form-control" required>
                                            @foreach (list_pendidikantempuh() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Pekerjaan<span class="text-danger">*</span></label>
                                        <select name="pekerjaan" id="" class="form-control" required>
                                            <option value="">Pilih Pekerjaan</option>
                                            @foreach (list_pekerjaan() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
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
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nomor Paspor</label>
                                        <input type="text" name="nomor_paspor" class="form-control" value="{{ old('nomor_paspor')}}" placeholder="Nomor Paspor">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tgl Berakhir Paspor</label>
                                        <input type="date" name="tgl_akhirpaspor" value="{{ old('tgl_akhirpaspor')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nomor KITAS/KITAP</label>
                                        <input type="text" name="nomor_kitas" class="form-control" value="{{ old('nomor_kitas')}}" placeholder="Nomor KITAS/KITAP">
                                    </div>
                                </div>
                            </div>
                           {{-- data orang tua --}}
                           <div class="alert alert-primary">
                                Data Orang Tua
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">NIK Ayah</label>
                                        <input type="text" name="nik_ayah" class="form-control" maxlength="16" value="-" placeholder="Nomor NIK Ayah" required>
                                        {{-- <input type="text" name="nik_ayah" class="form-control" maxlength="16" pattern="[0-9]{16}" value="-" placeholder="Nomor NIK Ayah" required> --}}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" class="form-control" value="-" placeholder="Nama Ayah" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">NIK Ibu</label>
                                        <input type="text" name="nik_ibu" class="form-control" maxlength="16" value="-" placeholder="Nomor NIK Ibu" required>
                                        {{-- <input type="text" name="nik_ibu" class="form-control" maxlength="16" pattern="[0-9]{16}" value="-" placeholder="Nomor NIK Ibu" required> --}}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Nama Ibu</label>
                                        <input type="text" name="nama_ibu" class="form-control" value="-" placeholder="Nama Ibu" required>
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
                                        <input type="text" name="no_telp" class="form-control" pattern="[0-9]+" value="{{ old('no_telp')}}" placeholder="Nomor Telepon">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Alamat Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email')}}" placeholder="Alamat Email">
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
                                                <option value="{{ $item->id}}">RW {{ strtoupper($item->nama_rw.' | RT '.$item->nama_rt) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Alamat Sebelumnya</label>
                                        <input type="text" name="alamat_sebelum" class="form-control" value="{{ old('alamat_sebelum')}}" placeholder="Alamat Sebelumnya">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Alamat Sekarang<span class="text-danger">*</span></label>
                                        <input type="text" name="alamat_sekarang" class="form-control" value="{{ old('alamat_sekarang')}}" placeholder="Alamat Sekarang" required>
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
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">No. Akta Nikah (Buku Nikah) / Perkawinan</label>
                                        <input type="text" name="no_bukunikah" class="form-control" value="{{ old('no_bukunikah')}}" placeholder="Nomor Akta Nikah">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Perkawinan</label>
                                        <input type="date" name="tgl_perkawinan" class="form-control" value="{{ old('tgl_perkawinan')}}" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Akta Perceraian</label>
                                        <input type="text" name="akta_perceraian" class="form-control" value="{{ old('akta_perceraian')}}" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Tanggal Perceraian</label>
                                        <input type="date" name="tgl_perceraian" class="form-control" value="{{ old('tgl_perceraian')}}" placeholder="">
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
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Cacat</label>
                                        <select name="cacat" id="" class="form-control" required>
                                            @foreach (list_cacat() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Sakit Menahun</label>
                                        <select name="sakit_menahun" id="" class="form-control" required>
                                            @foreach (list_sakitmenahun() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Akseptor KB</label>
                                        <select name="akseptor_kb" id="" class="form-control" required>
                                            @foreach (list_akseptorkb() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Asuransi</label>
                                        <select name="asuransi" id="" class="form-control" required>
                                            @foreach (list_asuransi() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
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

    @endsection

