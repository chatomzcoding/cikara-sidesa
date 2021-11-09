<!DOCTYPE html>
<html>
<head>
	<title>Data Sub Potensi Desa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Sub Potensi Desa - {{ $potensi->nama_potensi }}</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @foreach ($subpotensi as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('img/desa/potensi/'.$item->gambar) }}" alt="poto potensi" width="150px" class="img-responsive"> </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->detail }}</td>
                    </tr>
                @endforeach
        </table>
	</div>
</body>
</html>