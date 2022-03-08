<!DOCTYPE html>
<html>
<head>
	<title>Data Program Bantuan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @include('sistem.cetak.header')
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Program Bantuan</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Pemilih</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($pemilih as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration}}</td>
                    <td>{{ $item->nama_penduduk}}</td>
                    <td>{{ $item->keterangan}}</td>
                    <td class="text-center">{{ $item->status}}</td>
                </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4">tidak ada data</td>
                    </tr>
                @endforelse
        </table>
        
        @include('sistem.cetak.footer')
	</div>
</body>
</html>