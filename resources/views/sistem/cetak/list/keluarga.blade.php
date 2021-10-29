<!DOCTYPE html>
<html>
<head>
	<title>Data Keluarga</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Keluarga</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nomor KK</th>
                    <th>Kepala Keluarga</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Dusun</th>
                    <th>RW</th>
                    <th>RT</th>
                    <th>Jumlah Anggota</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($keluarga as $item)
                <tr>
                        <td class="text-center">{{ $loop->iteration}}</td>
                        <td>{{ $item->no_kk}}</td>
                        <td>{{ $item->nama_penduduk}}</td>
                        <td>{{ $item->nik}}</td>
                        <td>{{ $item->alamat_sekarang}}</td>
                        <td>{{ $item->nama_dusun }}</td>
                        <td>{{ $item->nama_rw }}</td>
                        <td>{{ $item->nama_rt }}</td>
                        <td class="text-center">{{ DbCikara::countData('anggota_keluarga',['keluarga_id',$item->id]) }}</td>
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