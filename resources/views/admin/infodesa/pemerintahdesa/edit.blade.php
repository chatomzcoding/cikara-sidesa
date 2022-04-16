<x-adminlte-layout title="ubah pemerintahan desa" menu="pemerintahdesa">
  <x-slot name="header">
    <x-header judul="data pemerintahan desa" active="ubah staf">
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
                <a href="{{ url('/staf')}}" class="btn btn-outline-secondary btn-flat btn-sm"><i class="fas fa-angle-left"></i> Kembali ke daftar Staf </a>
              </div>
              <div class="card-body">
                  <form action="{{ url('/staf/'.$staf->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control col-md-9" value="{{ $staf->nama_pegawai}}" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" class="form-control col-md-9" value="{{ $staf->nik}}" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">NIPD/NIP</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nipd" class="form-control" value="{{ $staf->nipd}}">
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="text" name="nip" class="form-control" value="{{ $staf->nip}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Tempat Tanggal Lahir</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="tempat_lahir" class="form-control" value="{{ $staf->tempat_lahir}}" required>
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tgl_lahir" class="form-control" value="{{ $staf->tgl_lahir}}" required>
    
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Jenis Kelamin</label>
                    <select name="jk" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        @foreach (list_jeniskelamin() as $item)
                            <option value="{{ $item }}" @if ($item == $staf->jk)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Pendidikan</label>
                    <select name="pendidikan" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Pendidikan dalam kk --</option>
                        @foreach (list_pendidikandalamkk() as $item)
                            <option value="{{ $item }}" @if ($item == $staf->pendidikan)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Agama</label>
                    <select name="agama" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Agama --</option>
                        @foreach (list_agama() as $item)
                            <option value="{{ $item }}" @if ($item == $staf->agama)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Pangkat / Golongan</label>
                    <input type="text" name="golongan" class="form-control col-md-9" value="{{ $staf->golongan}}" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor/Tanggal SK Pengangkatan</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nosk_pengangkatan" class="form-control" value="{{ $staf->nosk_pengangkatan}}">
    
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tglsk_pengangkatan" class="form-control" value="{{ $staf->tglsk_pengangkatan}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor/Tanggal SK Pemberhentian</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nosk_pemberhentian" class="form-control" value="{{ $staf->nosk_pemberhentian}}">
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tglsk_pemberhentian" class="form-control" value="{{ $staf->tglsk_pemberhentian}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Masa Jabatan (usia/periode)</label>
                    <input type="text" name="masa_jabatan" class="form-control col-md-9" value="{{ $staf->masa_jabatan}}" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Jabatan</label>
                    <select name="jabatan" id="" class="form-control col-md-9" required>
                      <option value="">-- pilih jabatan --</option>
                      @foreach ($jabatan as $item)
                      <option value="{{ $item->nama }}" @if ($item->nama == $staf->jabatan)
                          selected
                      @endif>{{ strtoupper($item->nama) }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Status Kepegawaian</label>
                    <select name="status_pegawai" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (list_status() as $item)
                            <option value="{{ $item }}" @if ($item == $staf->status_pegawai)
                                selected
                            @endif>{{ $item}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Photo (upload jika ingin merubah)</label>
                    <input type="file" name="photo" class="form-control col-md-9">
                  </div>
                  <div class="form-group text-right">
                      <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </x-slot>
</x-adminlte-layout>
    


