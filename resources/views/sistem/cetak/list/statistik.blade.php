<!DOCTYPE html>
<html>
<head>
	<title>Data Statistik {{ $data['header'] }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Statistik {{ $data['header'] }}</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Jenis Kelompok</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($data['tabel'] as $item)
                <tr>
                    <td class="text-center">{{ $item['no']}}</td>
                    <td>{{ $item['nama']}}</td>
                    <td class="text-center">{{ $item['l']}}</td>
                    <td class="text-center">{{ $item['p']}}</td>
                    <td class="text-center">{{ $item['lp']}}</td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="5">tidak ada data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
	</div>
</body>
</html>