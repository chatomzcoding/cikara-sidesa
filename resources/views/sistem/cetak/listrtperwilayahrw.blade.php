<!DOCTYPE html>
<html>
<head>
	<title>Data RT Per Dusun</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Rukun Tetangga di RW {{ $rw->nama_rw }}</h4>
            <hr>
        </section>
        <table class="table table-bordered table-striped small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>RT</th>
                    <th>Ketua RT</th>
                    <th>NIK Ketua RT</th>
                    <th>KK</th>
                    <th>L+P</th>
                    <th>L</th>
                    <th>P</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($rt as $item)
                @php
                    $jumlahlakilaki = DbCikara::jumlahJk('rt',$item->id,'laki-laki');
                    $jumlahperempuan = DbCikara::jumlahJk('rt',$item->id,'perempuan');
                    $total          = $jumlahlakilaki + $jumlahperempuan;
                @endphp
                <tr>
                        <td class="text-center">{{ $loop->iteration}}</td>
                        <td>{{ $item->nama_rt}}</td>
                        @php
                        $center = ($item->nik == '-') ? 'text-center' : NULL; 
                    @endphp
                    <td class="{{ $center }}">{{ DbCikara::namapenduduk($item->nik)}}</td>
                    <td class="{{ $center }}">{{ $item->nik}}</td>
                        <td class="text-center">{{ DbCikara::jumlahKK('rt',$item->id) }}</td>
                        <td class="text-center">{{ $jumlahlakilaki }}</td>
                        <td class="text-center">{{ $jumlahperempuan }}</td>
                        <td class="text-center">{{ $total }}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="9">tidak ada data</td>
                    </tr>
                @endforelse
        </table>
	</div>
</body>
</html>