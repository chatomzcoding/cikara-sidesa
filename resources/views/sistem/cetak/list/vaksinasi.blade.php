<!DOCTYPE html>
<html>
<head>
	<title>Data Vaksinasi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Vaksinasi</h4>
            <hr>
        </section>
        <table class="table table-bordered table-striped small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Penduduk</th>
                    <th>Jenis Vaksin</th>
                    <th>Tanggal Vaksin</th>
                    <th>Dosis</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($vaksinasi as $item)
                <tr>
                        <td class="text-center">{{ $loop->iteration}}</td>
                        <td>{{ $item->nama_penduduk}}</td>
                        <td class="text-uppercase">{{ $item->nama_kategori}}</td>
                        <td>{{ date_indo($item->tanggal_vaksin)}}</td>
                        <td class="text-center">{{ $item->dosis}}</td>
                        <td>{{ $item->keterangan}}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6">tidak ada data</td>
                    </tr>
                @endforelse
        </table>
	</div>
</body>
</html>