<!DOCTYPE html>
<html>
<head>
	<title>Data Potensi Desa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Potensi Desa</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Gambar</th>
                    <th>Nama Potensi</th>
                    <th>Keterangan</th>
                    <th>Dilihat</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @foreach ($potensi as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('img/desa/potensi/'.$item->poto_potensi) }}" alt="poto potensi" width="150px"> </td>
                        <td>{{ $item->nama_potensi }}</td>
                        <td>{{ $item->keterangan_potensi }}</td>
                        <td class="text-center">{{ $item->dilihat }}</td>
                    </tr>
                @endforeach
        </table>
	</div>
</body>
</html>