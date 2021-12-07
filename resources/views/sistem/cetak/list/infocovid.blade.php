<!DOCTYPE html>
<html>
<head>
	<title>Data Info Covid Penduduk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @include('sistem.cetak.header')
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Info Covid Penduduk</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Penduduk</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_penduduk }}</td>
                        <td>{{ date_indo($item->tanggal) }}</td>
                        <td class="text-center">{{ $item->status }}</td>
                    </tr>
                @endforeach
        </table>
        
        @include('sistem.cetak.footer')
	</div>
</body>
</html>