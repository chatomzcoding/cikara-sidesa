<!DOCTYPE html>
<html>
<head>
	<title>Data Penduduk - {{ $penduduk->nik.' '.$penduduk->nama_penduduk }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Detail Penduduk</h4>
            <hr>
        </section>
		<table class="table table-bordered small">
            <tr>
                <th width="40%">Nama Lengkap</th>
                <td class="text-capitalize">{{ $penduduk->nama_penduduk }}</td>
            </tr>
            <tr>
                <th>Nomor Induk Kependudukan (NIK)</th>
                <td>{{ $penduduk->nik }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $penduduk->jk }}</td>
            </tr>
            <tr>
                <th>Tempat Tanggal Lahir</th>
                <td class="text-capitalize">{{ $penduduk->tempat_lahir.', '.date_indo($penduduk->tgl_lahir) }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $penduduk->agama }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $penduduk->alamat_sekarang }}</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td>{{ $penduduk->pekerjaan }}</td>
            </tr>
            <tr>
                <th>Golongan Darah</th>
                <td>{{ $penduduk->golongan_darah }}</td>
            </tr>
            <tr>
                <th>Pendidikan dalam KK</th>
                <td>{{ $penduduk->pendidikan_kk }}</td>
            </tr>
            <tr>
                <th>Pendidikan Ditempuh</th>
                <td>{{ $penduduk->pendidikan_tempuh }}</td>
            </tr>
            <tr>
                <th>Nomor Handphone</th>
                <td>{{ $penduduk->no_telp }}</td>
            </tr>
            <tr>
                <th>Alamat Email</th>
                <td>{{ $penduduk->email }}</td>
            </tr>
            <tr>
                <th>Nomor Akta Kelahiran</th>
                <td>{{ $penduduk->no_akta }}</td>
            </tr>
            <tr>
                <th>Waktu Lahir</th>
                <td>{{ $penduduk->waktu_lahir }}</td>
            </tr>
            <tr>
                <th>Tempat Dilahirkan</th>
                <td>{{ $penduduk->tempat_dilahirkan }}</td>
            </tr>
            <tr>
                <th>Jenis Kelahiran</th>
                <td>{{ $penduduk->jenis_kelahiran }}</td>
            </tr>
            <tr>
                <th>Anak Ke</th>
                <td>{{ $penduduk->anak_ke }}</td>
            </tr>
            <tr>
                <th>Penolong Kelahiran</th>
                <td>{{ $penduduk->penolong_kelahiran }}</td>
            </tr>
            <tr>
                <th>Berat Lahir</th>
                <td>{{ $penduduk->berat_lahir }} gram</td>
            </tr>
            <tr>
                <th>Panjang Badan</th>
                <td>{{ $penduduk->panjang_lahir }} cm</td>
            </tr>
            <tr>
                <th>Status KTP Elektronik</th>
                <td>{{ $penduduk->status_ktp }}</td>
            </tr>
            <tr>
                <th>Status Rekam KTP</th>
                <td>{{ $penduduk->status_rekam }}</td>
            </tr>
            <tr>
                <th>Status Penduduk</th>
                <td class="text-uppercase">{{ $penduduk->status_penduduk }}</td>
            </tr>
            <tr>
                <th>KK Sebelumnya</th>
                <td>{{ $penduduk->kk_sebelum }}</td>
            </tr>
            <tr>
                <th>Hubungan KK </th>
                <td>{{ $penduduk->hubungan_keluarga }}</td>
            </tr>
            <tr>
                <th>Status Kewarganegaraan</th>
                <td class="text-uppercase">{{ $penduduk->status_warganegara }}</td>
            </tr>
            <tr>
                <th>Nomor Paspor</th>
                <td>{{ $penduduk->nomor_paspor }}</td>
            </tr>
            <tr>
                <th>Tanggal Berakhir Paspor</th>
                <td>{{ $penduduk->tgl_akhirpaspor }}</td>
            </tr>
            <tr>
                <th>Nomor KITAS/KITAP</th>
                <td>{{ $penduduk->nomor_kitas }}</td>
            </tr>
            <tr>
                <th>Nama Ayah</th>
                <td>{{ $penduduk->nama_ayah }}</td>
            </tr>
            <tr>
                <th>NIK Ayah</th>
                <td>{{ $penduduk->nik_ayah }}</td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td>{{ $penduduk->nama_ibu }}</td>
            </tr>
            <tr>
                <th>NIK Ibu</th>
                <td>{{ $penduduk->nik_ibu }}</td>
            </tr>
            <tr>
                <th>status Kecacatan</th>
                <td>{{ $penduduk->cacat }}</td>
            </tr>
            <tr>
                <th>Sakit Menahun</th>
                <td>{{ $penduduk->sakit_menahun }}</td>
            </tr>
            <tr>
                <th>Akseptor KB</th>
                <td>{{ $penduduk->akseptor_kb }}</td>
            </tr>
            <tr>
                <th>Asuransi</th>
                <td>{{ $penduduk->asuransi }}</td>
            </tr>
            <tr>
                <th>status perkawinan</th>
                <td>{{ $penduduk->status_perkawinan }}</td>
            </tr>
            <tr>
                <th>No. Akta Nikah</th>
                <td>{{ $penduduk->no_bukunikah }}</td>
            </tr>
            <tr>
                <th>Tanggal Perkawinan</th>
                <td>{{ $penduduk->tgl_perkawinan }}</td>
            </tr>
            <tr>
                <th>Akta Perceraian</th>
                <td>{{ $penduduk->akta_perceraian }}</td>
            </tr>
            <tr>
                <th>Tanggal Perceraian</th>
                <td>{{ $penduduk->tgl_perceraian }}</td>
            </tr>
        </table>
	</div>
</body>
</html>