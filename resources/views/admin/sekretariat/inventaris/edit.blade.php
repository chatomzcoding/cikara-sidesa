<x-adminlte-layout title="edit inventaris" menu="inventaris">
    <x-slot name="header">
        <x-header judul="Data Inventaris {{ $title}}" active="ubah data">
            <li class="breadcrumb-item"><a href="{{ url('inventaris/list/'.$inventaris->kode)}}">Daftar Inventaris {{ $title}}</a></li>
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
                    <a href="{{ url('/inventaris/list/'.$inventaris->kode)}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar Inventaris {{ $title}}"><i class="fas fa-arrow-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                        <form action="{{ url('/inventaris/'.$inventaris->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="kode" value="{{ $inventaris->kode}}">
                            <input type="hidden" name="id" value="{{ $inventaris->id}}">
                            @switch($inventaris->kode)
                                @case('tanah')
                                    <section>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Nama Barang {{ $inventaris->id}}</label>
                                            <select name="nama_barang" id="" class="form-control col-md-8" required>
                                                @foreach (list_namabarang()[$inventaris->kode] as $item)
                                                    <option value="{{ $item}}" @if ($inventaris->nama_barang == $item)
                                                        selected
                                                    @endif>{{ strtoupper($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                            <input type="text" name="kode_barang" class="form-control col-md-8" value="{{ $inventaris->kode_barang}}" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                            <input type="text" name="nomor_register" class="form-control col-md-8" value="{{ $inventaris->nomor_register}}" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_penduduk" class="col-md-4">Luas Tanah</label>
                                            <input type="text" name="luas_tanah" value="{{ $inventaris->luas_tanah}}" class="form-control col-md-8">
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Tahun Pengadaan</label>
                                            <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                                @for ($i = 2021; $i > 2000; $i--)
                                                    <option value="{{ $i}}" @if ($inventaris->tahun_pengadaan == $i)
                                                        selected
                                                    @endif>{{ $i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Letak / Alamat</label>
                                            <textarea name="lokasi" id="" cols="30" rows="3" class="form-control col-md-8">{{ $inventaris->lokasi}}</textarea>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Hak Tanah</label>
                                            <select name="hak_tanah" id="" class="form-control col-md-8" required>
                                                @foreach (list_haktanah() as $item)
                                                    <option value="{{ $item}}" @if ($inventaris->hak_tanah == $item)
                                                        selected
                                                    @endif>{{ strtoupper($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Penggunaan Barang</label>
                                            <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                                @foreach (list_penggunaanbarang() as $item)
                                                    <option value="{{ $item}}" @if ($inventaris->penggunaan_barang == $item)
                                                        selected
                                                    @endif>{{ strtoupper($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Tanggal Sertifikat</label>
                                            <input type="date" name="tanggal_sertifikat" class="form-control col-md-8" value="{{ $inventaris->tanggal_sertifikat}}">
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Nomor Sertifikat</label>
                                            <input type="text" name="no_sertifikat" class="form-control col-md-8" value="{{ $inventaris->no_sertifikat}}">
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Penggunaan</label>
                                            <select name="penggunaan" id="" class="form-control col-md-8" required>
                                                <option value="">-- Pilih Penggunaan Lahan --</option>
                                                @foreach (list_penggunaan() as $item)
                                                    <option value="{{ $item}}" @if ($inventaris->penggunaan == $item)
                                                        selected
                                                    @endif>{{ strtoupper($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Asal Usul</label>
                                            <select name="asal_usul" id="" class="form-control col-md-8" required>
                                                <option value="">-- Pilih Asal Usul Lahan --</option>
                                                @foreach (list_asalusul() as $item)
                                                    <option value="{{ $item}}" @if ($inventaris->asal_usul == $item)
                                                        selected
                                                    @endif>{{ strtoupper($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Harga</label>
                                            <input type="text" name="harga" class="form-control col-md-8" value="{{ $inventaris->harga}}">
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Keterangan</label>
                                            <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8">{{ $inventaris->keterangan}}</textarea>
                                        </div>
                                    </section>
                                @break
                                @case('peralatan-mesin')
                                <section>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nama Barang</label>
                                        <select name="nama_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_namabarang()[$inventaris->kode] as $item)
                                                <option value="{{ $item}}" @if ($inventaris->nama_barang == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                        <input type="text" name="kode_barang" class="form-control col-md-8" value="{{ $inventaris->kode_barang}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                        <input type="text" name="nomor_register" class="form-control col-md-8" value="{{ $inventaris->nomor_register}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Merk / Type</label>
                                        <input type="text" name="merk" class="form-control col-md-8" value="{{ $inventaris->merk}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Ukuran/CC</label>
                                        <input type="text" name="ukuran" class="form-control col-md-8" value="{{ $inventaris->ukuran}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Bahan</label>
                                        <input type="text" name="bahan" class="form-control col-md-8" value="{{ $inventaris->bahan}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tahun Pembelian</label>
                                        <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                            @for ($i = 2021; $i > 2000; $i--)
                                                <option value="{{ $i}}" @if ($inventaris->tahun_pengadaan == $i)
                                                    selected
                                                @endif>{{ $i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Pabrik</label>
                                        <input type="text" name="nomor_pabrik" class="form-control col-md-8" value="{{ $inventaris->nomor_pabrik}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Rangka</label>
                                        <input type="text" name="nomor_rangka" class="form-control col-md-8" value="{{ $inventaris->nomor_rangka}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Mesin</label>
                                        <input type="text" name="nomor_mesin" class="form-control col-md-8" value="{{ $inventaris->nomor_mesin}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Polisi</label>
                                        <input type="text" name="nomor_polisi" class="form-control col-md-8" value="{{ $inventaris->nomor_polisi}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">BPKB</label>
                                        <input type="text" name="bpkb" class="form-control col-md-8" value="{{ $inventaris->bpkb}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Penggunaan Barang</label>
                                        <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_penggunaanbarang() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->penggunaan_barang == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Asal Usul</label>
                                        <select name="asal_usul" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Asal Usul Lahan --</option>
                                            @foreach (list_asalusul() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->asal_usul == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Harga</label>
                                        <input type="text" name="harga" class="form-control col-md-8" value="{{ $inventaris->harga}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8">{{ $inventaris->keterangan}}</textarea>
                                    </div>
                                </section>
                                @break
                                @case('gedung-bangunan')
                                <section>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nama Barang / Jenis Barang</label>
                                        <select name="nama_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_namabarang()[$inventaris->kode] as $item)
                                                <option value="{{ $item}}" @if ($inventaris->nama_barang == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                        <input type="text" name="kode_barang" class="form-control col-md-8" value="{{ $inventaris->kode_barang}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                        <input type="text" name="nomor_register" class="form-control col-md-8" value="{{ $inventaris->nomor_register}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Kondisi Bangunan</label>
                                        <select name="kondisi_bangunan" id="" class="form-control col-md-8" required>
                                            @foreach (list_kondisibangunan() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->kondisi_bangunan == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Bangunan bertingkat</label>
                                        <input type="text" name="bangunan_bertingkat" class="form-control col-md-8" value="{{ $inventaris->bangunan_bertingkat}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Kontruksi Beton</label>
                                        <select name="kontruksi_beton" id="" class="form-control col-md-8" required>
                                            @foreach (list_status() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->kontruksi_beton == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Luas Bangunan</label>
                                        <input type="text" name="luas_bangunan" class="form-control col-md-8" value="{{ $inventaris->luas_bangunan}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Letak / Lokasi</label>
                                        <textarea name="lokasi" id="" cols="30" rows="3" class="form-control col-md-8">{{ $inventaris->lokasi}}</textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tahun Pengadaan</label>
                                        <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                            @for ($i = 2021; $i > 2000; $i--)
                                                <option value="{{ $i}}" @if ($inventaris->tahun_pengadaan == $i)
                                                    selected
                                                @endif>{{ $i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Bangunan</label>
                                        <input type="text" name="nomor_bangunan" class="form-control col-md-8" value="{{ $inventaris->nomor_bangunan}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Tanggal Dokumen Bangunan</label>
                                        <input type="date" name="tgl_dok_bangunan" class="form-control col-md-8" value="{{ $inventaris->tgl_dok_bangunan}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Status Tanah</label>
                                        <select name="status_tanah" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Status Tanah --</option>
                                            @foreach (list_statustanah() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->status_tanah == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Luas Tanah</label>
                                        <input type="text" name="luas_tanah" class="form-control col-md-8" value="{{ $inventaris->luas_tanah}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Kode Tanah</label>
                                        <input type="text" name="nomor_kode_tanah" class="form-control col-md-8" value="{{ $inventaris->nomor_kode_tanah}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Penggunaan Barang</label>
                                        <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_penggunaanbarang() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->penggunaan_barang == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Asal Usul</label>
                                        <select name="asal_usul" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Asal Usul Lahan --</option>
                                            @foreach (list_asalusul() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->asal_usul == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Harga</label>
                                        <input type="text" name="harga" class="form-control col-md-8" value="{{ $inventaris->harga}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8">{{ $inventaris->keterangan}}</textarea>
                                    </div>
                                </section>
                                @break
                                @case('jalan-irigasi-jaringan')
                                <section>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nama Barang / Jenis Barang</label>
                                        <select name="nama_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_namabarang()[$inventaris->kode] as $item)
                                                <option value="{{ $item}}" @if ($inventaris->nama_barang == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                        <input type="text" name="kode_barang" class="form-control col-md-8" value="{{ $inventaris->kode_barang}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                        <input type="text" name="nomor_register" class="form-control col-md-8" value="{{ $inventaris->nomor_register}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Kondisi Bangunan</label>
                                        <select name="kondisi_bangunan" id="" class="form-control col-md-8" required>
                                            @foreach (list_kondisibangunan() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->kondisi_bangunan == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Kontruksi</label>
                                        <textarea name="kontruksi" id="" cols="30" rows="3" class="form-control col-md-8">{{ $inventaris->kontruksi}}</textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Panjang</label>
                                        <input type="text" name="panjang" class="form-control col-md-8" value="{{ $inventaris->panjang}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Lebar</label>
                                        <input type="text" name="lebar" class="form-control col-md-8" value="{{ $inventaris->lebar}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Luas</label>
                                        <input type="text" name="luas" class="form-control col-md-8" value="{{ $inventaris->luas}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Letak / Lokasi</label>
                                        <textarea name="lokasi" id="" cols="30" rows="3" class="form-control col-md-8">{{ $inventaris->lokasi}}</textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tahun Pengadaan</label>
                                        <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                            @for ($i = 2021; $i > 2000; $i--)
                                                <option value="{{ $i}}" @if ($inventaris->tahun_pengadaan == $i)
                                                    selected
                                                @endif>{{ $i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Kepemilikan</label>
                                        <input type="text" name="no_kepemilikan" class="form-control col-md-8" value="{{ $inventaris->no_kepemilikan}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Tanggal Dokumen Kepemilikan</label>
                                        <input type="date" name="tgl_dok_kepemilikan" class="form-control col-md-8" value="{{ $inventaris->tgl_dok_kepemilikan}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Status Tanah</label>
                                        <select name="status_tanah" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Status Tanah --</option>
                                            @foreach (list_statustanah() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->status_tanah == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Kode Tanah</label>
                                        <input type="text" name="nomor_kode_tanah" class="form-control col-md-8" value="{{ $inventaris->nomor_kode_tanah}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Penggunaan Barang</label>
                                        <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_penggunaanbarang() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->penggunaan_barang == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Asal Usul</label>
                                        <select name="asal_usul" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Asal Usul Lahan --</option>
                                            @foreach (list_asalusul() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->asal_usul == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Harga</label>
                                        <input type="text" name="harga" class="form-control col-md-8" value="{{ $inventaris->harga}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8">{{ $inventaris->keterangan}}</textarea>
                                    </div>
                                </section>
                                @break
                                @case('asset-tetap')
                                <section>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nama Barang / Jenis Barang</label>
                                        <select name="nama_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_namabarang()[$inventaris->kode] as $item)
                                                <option value="{{ $item}}" @if ($inventaris->nama_barang == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                        <input type="text" name="kode_barang" class="form-control col-md-8" value="{{ $inventaris->kode_barang}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                        <input type="text" name="nomor_register" class="form-control col-md-8" value="{{ $inventaris->nomor_register}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Jenis Asset</label>
                                        <select name="jenis_aset" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Jenis Asset --</option>
                                            @foreach (list_jenisasset() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->jenis_aset == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control col-md-8" value="{{ $inventaris->jumlah}}">
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tahun Pembelian</label>
                                        <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                            @for ($i = 2021; $i > 2000; $i--)
                                                <option value="{{ $i}}" @if ($inventaris->tahun_pengadaan == $i)
                                                    selected
                                                @endif>{{ $i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Penggunaan Barang</label>
                                        <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_penggunaanbarang() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->penggunaan_barang == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Asal Usul</label>
                                        <select name="asal_usul" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Asal Usul Lahan --</option>
                                            @foreach (list_asalusul() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->asal_usul == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Harga</label>
                                        <input type="text" name="harga" class="form-control col-md-8" value="{{ $inventaris->harga}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8">{{ $inventaris->keterangan}}</textarea>
                                    </div>
                                </section>
                                @break
                                @case('kontruksi-pengerjaan')
                                <section>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nama Barang / Jenis Barang</label>
                                        <input type="text" name="nama_barang" class="form-control col-md-8" value="{{ $inventaris->nama_barang}}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Fisik Bangunan</label>
                                        <select name="fisik_bangunan" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Fisik Bangunan --</option>
                                            @foreach (list_fisikbangunan() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->fisik_bangunan == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Bangunan Bertingkat</label>
                                        <input type="number" name="bangunan_bertingkat" class="form-control col-md-8">
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Kontruksi Beton</label>
                                        <select name="kontruksi_beton" id="" class="form-control col-md-8" required>
                                            @foreach (list_status() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->kontruksi_beton == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Luas</label>
                                        <input type="text" name="luas" class="form-control col-md-8" value="{{ $inventaris->luas}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Letak / Lokasi</label>
                                        <textarea name="lokasi" id="" cols="30" rows="3" class="form-control col-md-8">{{ $inventaris->lokasi}}</textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nomor Bangunan</label>
                                        <input type="text" name="nomor_bangunan" class="form-control col-md-8" value="{{ $inventaris->nomor_bangunan}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tanggal Dokumen Bangunan</label>
                                        <input type="date" name="tgl_dok_bangunan" class="form-control col-md-8" value="{{ $inventaris->tgl_dok_bangunan}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tanggal Mulai</label>
                                        <input type="date" name="tgl_mulai" class="form-control col-md-8" value="{{ $inventaris->tgl_mulai}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Status Tanah</label>
                                        <select name="status_tanah" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Status Tanah --</option>
                                            @foreach (list_statustanah() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->status_tanah == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nomor Kode Tanah</label>
                                        <input type="text" name="nomor_kode_tanah" class="form-control col-md-8" value="{{ $inventaris->nomor_kode_tanah}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Asal Usul</label>
                                        <select name="asal_usul" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Asal Usul Lahan --</option>
                                            @foreach (list_asalusul() as $item)
                                                <option value="{{ $item}}" @if ($inventaris->asal_usul == $item)
                                                    selected
                                                @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Harga</label>
                                        <input type="text" name="harga" class="form-control col-md-8" value="{{ $inventaris->harga}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8">{{ $inventaris->keterangan}}</textarea>
                                    </div>
                                </section>
                                @break
                                @default
                                    
                            @endswitch
                            
                            <section>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
                                </div>
                            </section>
                        </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </x-slot>
</x-adminlte-layout>
