<!DOCTYPE html>
<html>
<head>
	<title>Data Kelompok</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @include('sistem.cetak.header')

	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Kelompok</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Kelompok</th>
                    <th>Ketua Kelompok</th>
                    <th>Kategori Kelompok</th>
                    <th>Jumlah Anggota</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($kelompok as $item)
                <tr>
                        <td class="text-center">{{ $loop->iteration}}</td>
                        <td>{{ $item->nama_kelompok}}</td>
                        <td>{{ $item->nama_penduduk}}</td>
                        <td>{{ $item->nama_kategori}}</td>
                        <td class="text-center">{{ DbCikara::countData('anggota_kelompok',['kelompok_id',$item->id]) }}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">tidak ada data</td>
                    </tr>
                @endforelse
        </table>
    @include('sistem.cetak.footer')

	</div>
</body>
</html>