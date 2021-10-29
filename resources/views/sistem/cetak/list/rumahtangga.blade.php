<!DOCTYPE html>
<html>
<head>
	<title>Data Rumah Tangga</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Rumah Tangga</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nomor</th>
                    <th>Kepala Rumah Tangga</th>
                    <th>NIK</th>
                    <th>Jumlah Anggota</th>
                    <th>Alamat</th>
                    <th>Dusun</th>
                    <th>RW</th>
                    <th>RT</th>
                    <th>Tanggal Terdaftar</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($rumahtangga as $item)
                <tr>
                        <td class="text-center">{{ $loop->iteration}}</td>
                        <td>{{ $item->nomor }}</td>
                        <td>{{ $item->nama_penduduk}}</td>
                        <td>{{ DbCikara::datapenduduk($item->nik,'nik')->nama_penduduk }}</td>
                        <td class="text-center">{{ DbCikara::countData('anggota_rumah_tangga',['rumahtangga_id',$item->id])}}</td>
                        <td>{{ $item->alamat_sekarang}}</td>
                        <td>{{ $item->nama_dusun }}</td>
                        <td>{{ $item->nama_rw }}</td>
                        <td>{{ $item->nama_rt }}</td>
                        <td>{{ date_indo($item->tgl_daftar) }}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="11">tidak ada data</td>
                    </tr>
                @endforelse
        </table>
	</div>
</body>
</html>