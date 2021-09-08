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
                <a href="{{ url('/inventaris/list/'.$kode)}}" class="btn btn-outline-primary btn-flat btn-sm"><i class="fas fa-arrow-left"></i> Kembali ke daftar Inventaris {{ $inventaris}}</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                    <form action="{{ url('/inventaris')}}" method="post">
                        @csrf

                        <input type="hidden" name="kode" value="{{ $kode}}">
                        @switch($kode)
                            @case('tanah')
                                <section>
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <select name="nama_barang" id="" class="form-control" required>
                                            @foreach (list_namabarang()[$kode] as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_penduduk">Kode Barang</label>
                                        <input type="text" name="kode_barang" class="form-control" value="52.01.14.2005.01.2021" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_penduduk">Nomor Register</label>
                                        <input type="text" name="nomor_register" class="form-control" value="1.00.00.00.000.000001" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_penduduk">Luas Tanah</label>
                                        <input type="text" name="luas_tanah" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tahun Pengadaan</label>
                                        <select name="tahun_pengadaan" id="" class="form-control" required>
                                            @for ($i = 2021; $i > 2000; $i--)
                                                <option value="{{ $i}}">{{ $i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Letak / Alamat</label>
                                        <textarea name="lokasi" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hak Tanah</label>
                                        <select name="hak_tanah" id="" class="form-control" required>
                                            @foreach (list_haktanah() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penggunaan Barang</label>
                                        <select name="penggunaan_barang" id="" class="form-control" required>
                                            @foreach (list_penggunaanbarang() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Sertifikat</label>
                                        <input type="date" name="tanggal_sertifikat" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nomor Sertifikat</label>
                                        <input type="text" name="no_sertifikat" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penggunaan</label>
                                        <select name="penggunaan" id="" class="form-control" required>
                                            <option value="">-- Pilih Penggunaan Lahan --</option>
                                            @foreach (list_penggunaan() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Asal Usul</label>
                                        <select name="asal_usul" id="" class="form-control" required>
                                            <option value="">-- Pilih Asal Usul Lahan --</option>
                                            @foreach (list_asalusul() as $item)
                                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="text" name="harga" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </section>
                            @break
                            @case('peralatan-mesin')
                            <section>
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <select name="nama_barang" id="" class="form-control" required>
                                        @foreach (list_namabarang()[$kode] as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" value="52.01.14.2005.01.2021" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Register</label>
                                    <input type="text" name="nomor_register" class="form-control" value="2.00.00.00.000.000001" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Merk / Type</label>
                                    <input type="text" name="merk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Ukuran/CC</label>
                                    <input type="text" name="ukuran" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Bahan</label>
                                    <input type="text" name="bahan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Pembelian</label>
                                    <select name="tahun_pengadaan" id="" class="form-control" required>
                                        @for ($i = 2021; $i > 2000; $i--)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Pabrik</label>
                                    <input type="text" name="nomor_pabrik" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Rangka</label>
                                    <input type="text" name="nomor_rangka" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Mesin</label>
                                    <input type="text" name="nomor_mesin" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Polisi</label>
                                    <input type="text" name="nomor_polisi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">BPKB</label>
                                    <input type="text" name="bpkb" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Penggunaan Barang</label>
                                    <select name="penggunaan_barang" id="" class="form-control" required>
                                        @foreach (list_penggunaanbarang() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </section>
                            @break
                            @case('gedung-bangunan')
                            <section>
                                <div class="form-group">
                                    <label for="">Nama Barang / Jenis Barang</label>
                                    <select name="nama_barang" id="" class="form-control" required>
                                        @foreach (list_namabarang()[$kode] as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" value="52.01.14.2005.01.2021" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Register</label>
                                    <input type="text" name="nomor_register" class="form-control" value="2.00.00.00.000.000001" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kondisi Bangunan</label>
                                    <select name="kondisi_bangunan" id="" class="form-control" required>
                                        @foreach (list_kondisibangunan() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Bangunan bertingkat</label>
                                    <input type="text" name="bangunan_bertingkat" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Kontruksi Beton</label>
                                    <select name="kontruksi_betok" id="" class="form-control" required>
                                        @foreach (list_status() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Luas Bangunan</label>
                                    <input type="text" name="luas_bangunan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Letak / Lokasi</label>
                                    <textarea name="lokasi" id="" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Pengadaan</label>
                                    <select name="tahun_pengadaan" id="" class="form-control" required>
                                        @for ($i = 2021; $i > 2000; $i--)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Bangunan</label>
                                    <input type="text" name="nomor_bangunan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Tanggal Dokumen Bangunan</label>
                                    <input type="date" name="tgl_dok_bangunan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Status Tanah</label>
                                    <select name="status_tanah" id="" class="form-control" required>
                                        <option value="">-- Pilih Status Tanah --</option>
                                        @foreach (list_statustanah() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Luas Tanah</label>
                                    <input type="text" name="luas_tanah" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Kode Tanah</label>
                                    <input type="text" name="nomor_kode_tanah" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Penggunaan Barang</label>
                                    <select name="penggunaan_barang" id="" class="form-control" required>
                                        @foreach (list_penggunaanbarang() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </section>
                            @break
                            @case('jalan-irigasi-jaringan')
                            <section>
                                <div class="form-group">
                                    <label for="">Nama Barang / Jenis Barang</label>
                                    <select name="nama_barang" id="" class="form-control" required>
                                        @foreach (list_namabarang()[$kode] as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" value="52.01.14.2005.01.2021" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Register</label>
                                    <input type="text" name="nomor_register" class="form-control" value="2.00.00.00.000.000001" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kondisi Bangunan</label>
                                    <select name="kondisi_bangunan" id="" class="form-control" required>
                                        @foreach (list_kondisibangunan() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Kontruksi</label>
                                    <textarea name="kontruksi" id="" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Panjang</label>
                                    <input type="text" name="panjang" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Lebar</label>
                                    <input type="text" name="lebar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Luas</label>
                                    <input type="text" name="luas" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Letak / Lokasi</label>
                                    <textarea name="lokasi" id="" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Pengadaan</label>
                                    <select name="tahun_pengadaan" id="" class="form-control" required>
                                        @for ($i = 2021; $i > 2000; $i--)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Kepemilikan</label>
                                    <input type="text" name="no_kepemilikan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Tanggal Dokumen Kepemilikan</label>
                                    <input type="date" name="tgl_dok_kepemilikan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Status Tanah</label>
                                    <select name="status_tanah" id="" class="form-control" required>
                                        <option value="">-- Pilih Status Tanah --</option>
                                        @foreach (list_statustanah() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Kode Tanah</label>
                                    <input type="text" name="nomor_kode_tanah" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Penggunaan Barang</label>
                                    <select name="penggunaan_barang" id="" class="form-control" required>
                                        @foreach (list_penggunaanbarang() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </section>
                            @break
                            @case('asset-tetap')
                            <section>
                                <div class="form-group">
                                    <label for="">Nama Barang / Jenis Barang</label>
                                    <select name="nama_barang" id="" class="form-control" required>
                                        @foreach (list_namabarang()[$kode] as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" value="52.01.14.2005.01.2021" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Nomor Register</label>
                                    <input type="text" name="nomor_register" class="form-control" value="2.00.00.00.000.000001" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Asset</label>
                                    <select name="nama_barang" id="" class="form-control" required>
                                        <option value="">-- Pilih Jenis Asset --</option>
                                        @foreach (list_jenisasset() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control">
                                <div class="form-group">
                                    <label for="">Tahun Pembelian</label>
                                    <select name="tahun_pengadaan" id="" class="form-control" required>
                                        @for ($i = 2021; $i > 2000; $i--)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Penggunaan Barang</label>
                                    <select name="penggunaan_barang" id="" class="form-control" required>
                                        @foreach (list_penggunaanbarang() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </section>
                            @break
                            @case('kontruksi-pengerjaan')
                            <section>
                                <div class="form-group">
                                    <label for="">Nama Barang / Jenis Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Fisik Bangunan</label>
                                    <select name="fisik_bangunan" id="" class="form-control" required>
                                        <option value="">-- Pilih Fisik Bangunan --</option>
                                        @foreach (list_fisikbangunan() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Bangunan Bertingkat</label>
                                    <input type="number" name="bangunan_bertingkat" class="form-control">
                                <div class="form-group">
                                    <label for="">Kontruksi Beton</label>
                                    <select name="kontruksi_beton" id="" class="form-control" required>
                                        @foreach (list_status() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Luas</label>
                                    <input type="text" name="luas" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penduduk">Letak / Lokasi</label>
                                    <textarea name="lokasi" id="" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Bangunan</label>
                                    <input type="text" name="nomor_bangunan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Dokumen Bangunan</label>
                                    <input type="date" name="tgl_dok_bangunan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Mulai</label>
                                    <input type="date" name="tgl_dok_bangunan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Status Tanah</label>
                                    <select name="status_tanah" id="" class="form-control" required>
                                        <option value="">-- Pilih Status Tanah --</option>
                                        @foreach (list_statustanah() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Kode Tanah</label>
                                    <input type="text" name="nomor_kode_tanah" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Asal Usul</label>
                                    <select name="asal_usul" id="" class="form-control" required>
                                        <option value="">-- Pilih Asal Usul Lahan --</option>
                                        @foreach (list_asalusul() as $item)
                                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </section>
                            @break
                            @default
                                
                        @endswitch
                        
                        <section>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
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

