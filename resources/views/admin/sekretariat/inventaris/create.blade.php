@extends('layouts.admin')

@section('title')
    Tambah Inventaris
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Inventaris {{ $inventaris}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('inventaris/list/'.$kode)}}">Daftar Inventaris {{ $inventaris}}</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>
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
                <a href="{{ url('/inventaris/list/'.$kode)}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar Inventaris {{ $inventaris}}"><i class="fas fa-angle-left"></i> Kembali</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                    <form action="{{ url('/inventaris')}}" method="post">
                        @csrf

                        <input type="hidden" name="kode" value="{{ $kode}}">
                        @switch($kode)
                            @case('tanah')
                                <section>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nama Barang</label>
                                        <select name="nama_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_namabarang()[$kode] as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                        <input type="text" name="kode_barang" class="form-control col-md-8" value="52.01.14.2005.01.2021" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                        <input type="text" name="nomor_register" class="form-control col-md-8" value="1.00.00.00.000.000001" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_penduduk" class="col-md-4">Luas Tanah</label>
                                        <input type="text" name="luas_tanah" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tahun Pengadaan</label>
                                        <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                            @for ($i = 2021; $i > 2000; $i--)
                                                <option value="{{ $i}}">{{ $i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Letak / Alamat</label>
                                        <textarea name="lokasi" id="" cols="30" rows="3" class="form-control col-md-8"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Hak Tanah</label>
                                        <select name="hak_tanah" id="" class="form-control col-md-8" required>
                                            @foreach (list_haktanah() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Penggunaan Barang</label>
                                        <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                            @foreach (list_penggunaanbarang() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tanggal Sertifikat</label>
                                        <input type="date" name="tanggal_sertifikat" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Nomor Sertifikat</label>
                                        <input type="text" name="no_sertifikat" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Penggunaan</label>
                                        <select name="penggunaan" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Penggunaan Lahan --</option>
                                            @foreach (list_penggunaan() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Asal Usul</label>
                                        <select name="asal_usul" id="" class="form-control col-md-8" required>
                                            <option value="">-- Pilih Asal Usul Lahan --</option>
                                            @foreach (list_asalusul() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Harga</label>
                                        <input type="text" name="harga" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8"></textarea>
                                    </div>
                                </section>
                            @break
                            @case('peralatan-mesin')
                            <section>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Nama Barang</label>
                                    <select name="nama_barang" id="" class="form-control col-md-8" required>
                                        @foreach (list_namabarang()[$kode] as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control col-md-8" value="52.01.14.2005.01.2021" required>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                    <input type="text" name="nomor_register" class="form-control col-md-8" value="2.00.00.00.000.000001" required>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Merk / Type</label>
                                    <input type="text" name="merk" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Ukuran/CC</label>
                                    <input type="text" name="ukuran" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Bahan</label>
                                    <input type="text" name="bahan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Tahun Pembelian</label>
                                    <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                        @for ($i = 2021; $i > 2000; $i--)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Pabrik</label>
                                    <input type="text" name="nomor_pabrik" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Rangka</label>
                                    <input type="text" name="nomor_rangka" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Mesin</label>
                                    <input type="text" name="nomor_mesin" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Polisi</label>
                                    <input type="text" name="nomor_polisi" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">BPKB</label>
                                    <input type="text" name="bpkb" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Penggunaan Barang</label>
                                    <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                        @foreach (list_penggunaanbarang() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Harga</label>
                                    <input type="text" name="harga" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8"></textarea>
                                </div>
                            </section>
                            @break
                            @case('gedung-bangunan')
                            <section>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Nama Barang / Jenis Barang</label>
                                    <select name="nama_barang" id="" class="form-control col-md-8" required>
                                        @foreach (list_namabarang()[$kode] as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control col-md-8" value="52.01.14.2005.01.2021" required>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                    <input type="text" name="nomor_register" class="form-control col-md-8" value="2.00.00.00.000.000001" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Kondisi Bangunan</label>
                                    <select name="kondisi_bangunan" id="" class="form-control col-md-8" required>
                                        @foreach (list_kondisibangunan() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Bangunan bertingkat</label>
                                    <input type="text" name="bangunan_bertingkat" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Kontruksi Beton</label>
                                    <select name="kontruksi_betok" id="" class="form-control col-md-8" required>
                                        @foreach (list_status() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Luas Bangunan</label>
                                    <input type="text" name="luas_bangunan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Letak / Lokasi</label>
                                    <textarea name="lokasi" id="" cols="30" rows="3" class="form-control col-md-8"></textarea>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Tahun Pengadaan</label>
                                    <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                        @for ($i = 2021; $i > 2000; $i--)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Bangunan</label>
                                    <input type="text" name="nomor_bangunan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Tanggal Dokumen Bangunan</label>
                                    <input type="date" name="tgl_dok_bangunan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Status Tanah</label>
                                    <select name="status_tanah" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Status Tanah --</option>
                                        @foreach (list_statustanah() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Luas Tanah</label>
                                    <input type="text" name="luas_tanah" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Kode Tanah</label>
                                    <input type="text" name="nomor_kode_tanah" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Penggunaan Barang</label>
                                    <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                        @foreach (list_penggunaanbarang() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Harga</label>
                                    <input type="text" name="harga" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8"></textarea>
                                </div>
                            </section>
                            @break
                            @case('jalan-irigasi-jaringan')
                            <section>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Nama Barang / Jenis Barang</label>
                                    <select name="nama_barang" id="" class="form-control col-md-8" required>
                                        @foreach (list_namabarang()[$kode] as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control col-md-8" value="52.01.14.2005.01.2021" required>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                    <input type="text" name="nomor_register" class="form-control col-md-8" value="2.00.00.00.000.000001" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Kondisi Bangunan</label>
                                    <select name="kondisi_bangunan" id="" class="form-control col-md-8" required>
                                        @foreach (list_kondisibangunan() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Kontruksi</label>
                                    <textarea name="kontruksi" id="" cols="30" rows="3" class="form-control col-md-8"></textarea>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Panjang</label>
                                    <input type="text" name="panjang" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Lebar</label>
                                    <input type="text" name="lebar" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Luas</label>
                                    <input type="text" name="luas" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Letak / Lokasi</label>
                                    <textarea name="lokasi" id="" cols="30" rows="3" class="form-control col-md-8"></textarea>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Tahun Pengadaan</label>
                                    <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                        @for ($i = 2021; $i > 2000; $i--)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Kepemilikan</label>
                                    <input type="text" name="no_kepemilikan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Tanggal Dokumen Kepemilikan</label>
                                    <input type="date" name="tgl_dok_kepemilikan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Status Tanah</label>
                                    <select name="status_tanah" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Status Tanah --</option>
                                        @foreach (list_statustanah() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Kode Tanah</label>
                                    <input type="text" name="nomor_kode_tanah" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Penggunaan Barang</label>
                                    <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                        @foreach (list_penggunaanbarang() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Harga</label>
                                    <input type="text" name="harga" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8"></textarea>
                                </div>
                            </section>
                            @break
                            @case('asset-tetap')
                            <section>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Nama Barang / Jenis Barang</label>
                                    <select name="nama_barang" id="" class="form-control col-md-8" required>
                                        @foreach (list_namabarang()[$kode] as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control col-md-8" value="52.01.14.2005.01.2021" required>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Nomor Register</label>
                                    <input type="text" name="nomor_register" class="form-control col-md-8" value="2.00.00.00.000.000001" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Jenis Asset</label>
                                    <select name="nama_barang" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Jenis Asset --</option>
                                        @foreach (list_jenisasset() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control col-md-8">
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Tahun Pembelian</label>
                                    <select name="tahun_pengadaan" id="" class="form-control col-md-8" required>
                                        @for ($i = 2021; $i > 2000; $i--)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Penggunaan Barang</label>
                                    <select name="penggunaan_barang" id="" class="form-control col-md-8" required>
                                        @foreach (list_penggunaanbarang() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Harga</label>
                                    <input type="text" name="harga" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8"></textarea>
                                </div>
                            </section>
                            @break
                            @case('kontruksi-pengerjaan')
                            <section>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Nama Barang / Jenis Barang</label>
                                    <input type="text" name="nama_barang" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Fisik Bangunan</label>
                                    <select name="fisik_bangunan" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Fisik Bangunan --</option>
                                        @foreach (list_fisikbangunan() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
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
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Luas</label>
                                    <input type="text" name="luas" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penduduk" class="col-md-4">Letak / Lokasi</label>
                                    <textarea name="lokasi" id="" cols="30" rows="3" class="form-control col-md-8"></textarea>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Nomor Bangunan</label>
                                    <input type="text" name="nomor_bangunan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Tanggal Dokumen Bangunan</label>
                                    <input type="date" name="tgl_dok_bangunan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Tanggal Mulai</label>
                                    <input type="date" name="tgl_dok_bangunan" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Status Tanah</label>
                                    <select name="status_tanah" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Status Tanah --</option>
                                        @foreach (list_statustanah() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Nomor Kode Tanah</label>
                                    <input type="text" name="nomor_kode_tanah" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Harga</label>
                                    <input type="text" name="harga" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control col-md-8"></textarea>
                                </div>
                            </section>
                            @break
                            @default
                                
                        @endswitch
                        
                        <section>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> SIMPAN</button>
                            </div>
                        </section>
                    </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection

