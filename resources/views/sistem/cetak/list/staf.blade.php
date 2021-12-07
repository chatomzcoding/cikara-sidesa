<!DOCTYPE html>
<html>
<head>
	<title>Data Staf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @include('sistem.cetak.header')

	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Staf</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama, NIP/NIPD, NIK</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Pangkat / Golongan</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($staf as $item)
                <tr>
                        <td class="text-center">{{ $loop->iteration}}</td>
                        <td>{{ $item->nama_pegawai.' '.$item->nip.' '.$item->nipd}}</td>
                        <td>{{ $item->tempat_lahir.', '.$item->tgl_lahir}}</td>
                        <td>{{ $item->jk}}</td>
                        <td>{{ $item->agama}}</td>
                        <td class="text-center">{{ $item->golongan}}</td>
                        <td>{{ $item->jabatan}}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="12">tidak ada data</td>
                    </tr>
                @endforelse
        </table>
    @include('sistem.cetak.footer')

	</div>
</body>
</html>