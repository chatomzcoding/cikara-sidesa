<!DOCTYPE html>
<html>
<head>
	<title>Data Daftar Format Surat</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Daftar Format Surat</h4>
            <hr>
        </section>
        <table class="table table-bordered table-striped small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Surat</th>
                    <th>Kode Surat</th>
                    <th>Klasifikasi</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @foreach ($formatsurat as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_surat }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ DbCikara::showtablefirst('klasifikasi_surat',['id',$item->klasifikasisurat_id])->nama  }}</td>
                        <td>{{ $item->kategori }}</td>
                    </tr>
                @endforeach
        </table>
	</div>
</body>
</html>