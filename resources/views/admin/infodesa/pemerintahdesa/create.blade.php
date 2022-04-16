<x-adminlte-layout title="tambah pemerintahan desa" menu="pemerintahdesa">
  <x-slot name="header">
    <x-header judul="data pemerintahan desa" active="tambah staf baru">
      <li class="breadcrumb-item"><a href="{{ url('staf')}}">Daftar Pemerintahan Desa</a></li>
    </x-header>
  </x-slot>
  <x-slot name="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="{{ url('/staf')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar Staf"><i class="fas fa-angle-left"></i> Kembali </a>
              </div>
              <div class="card-body">
                  <div class="callout callout-info">
                    Tanda <strong class="text-danger">*</strong> Tidak boleh kosong!
                  </div>
                  <form action="{{ url('/staf')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  @include('sistem.notifikasi')
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nama Pegawai <strong class="text-danger">*</strong></label>
                    <input type="text" name="nama_pegawai" class="form-control col-md-9" value="{{ $penduduk->nama_penduduk }}" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor Induk Kependudukan <strong class="text-danger">*</strong></label>
                    <input type="text" name="nik" class="form-control col-md-9" maxlength="16" pattern="[0-9]{16}" value="{{ $penduduk->nik }}" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">NIPD/NIP</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nipd" class="form-control" placeholder="kolom untuk NIPD">
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="text" name="nip" class="form-control" placeholder="kolom untuk NIP">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Tempat Tanggal Lahir <strong class="text-danger">*</strong></label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="tempat_lahir" class="form-control" value="{{ $penduduk->tempat_lahir }}" required>
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tgl_lahir" class="form-control" value="{{ $penduduk->tgl_lahir }}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Jenis Kelamin <strong class="text-danger">*</strong></label>
                    <select name="jk" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        @foreach (list_jeniskelamin() as $item)
                            <option value="{{ $item }}" @if ($item == $penduduk->jk)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Pendidikan <strong class="text-danger">*</strong></label>
                    <select name="pendidikan" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Pendidikan dalam kk --</option>
                        @foreach (list_pendidikandalamkk() as $item)
                            <option value="{{ $item }}" @if ($item == $penduduk->pendidikan_kk)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Agama <strong class="text-danger">*</strong></label>
                    <select name="agama" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Agama --</option>
                        @foreach (list_agama() as $item)
                            <option value="{{ $item }}" @if ($item == $penduduk->agama)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Pangkat / Golongan <strong class="text-danger">*</strong></label>
                    <input type="text" name="golongan" class="form-control col-md-9" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor/Tanggal SK Pengangkatan</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nosk_pengangkatan" class="form-control" placeholder="nomor SK Pengangkatan">
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tglsk_pengangkatan" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor/Tanggal SK Pemberhentian</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nosk_pemberhentian" class="form-control" placeholder="Nomor SK Pemberhentian">
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tglsk_pemberhentian" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Masa Jabatan (usia/periode) <strong class="text-danger">*</strong></label>
                    <input type="text" name="masa_jabatan" class="form-control col-md-9" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Jabatan <strong class="text-danger">*</strong></label>
                    <select name="jabatan" id="" class="form-control col-md-9" required>
                      <option value="">-- pilih jabatan --</option>
                      @foreach ($jabatan as $item)
                      <option value="{{ $item->nama }}">{{ strtoupper($item->nama) }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Status Kepegawaian <strong class="text-danger">*</strong></label>
                    <select name="status_pegawai" id="" class="form-control col-md-9" required>
                      <option value="">-- Pilih Status --</option>
                        @foreach (list_status() as $item)
                            <option value="{{ $item }}">{{ $item}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Photo <strong class="text-danger">*</strong></label>
                    <input type="file" name="photo" class="form-control col-md-9" required>
                  </div>
                  <div class="form-group text-right">
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> SIMPAN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </x-slot>
</x-adminlte-layout>
