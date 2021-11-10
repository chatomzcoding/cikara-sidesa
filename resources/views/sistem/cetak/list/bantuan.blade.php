<!DOCTYPE html>
<html>
<head>
	<title>Data Program Bantuan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Program Bantuan</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Program</th>
                    <th>Asal Dana</th>
                    <th>Jumlah Peserta</th>
                    <th>Masa Berlaku</th>
                    <th>Sasaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($bantuan as $item)
                <tr>
                        <td class="text-center">{{ $loop->iteration}}</td>
                        <td>{{ $item->nama_program}}</td>
                        <td>{{ $item->asal_dana}}</td>
                        <td>-</td>
                        <td>{{ $item->tgl_mulai.' - '.$item->tgl_akhir}}</td>
                        <td>{{ $item->sasaran}}</td>
                        <td class="text-center">{{ $item->status}}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="7">tidak ada data</td>
                    </tr>
                @endforelse
        </table>
	</div>
</body>
</html>