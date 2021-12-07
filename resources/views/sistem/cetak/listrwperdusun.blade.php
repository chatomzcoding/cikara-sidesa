<!DOCTYPE html>
<html>
<head>
	<title>Data RW Per Dusun</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @include('sistem.cetak.header')

	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Rukun Warga di Dusun {{ $dusun->nama_dusun }}</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>RW</th>
                    <th>Ketua RW</th>
                    <th>NIK Ketua RW</th>
                    <th>RT</th>
                    <th>KK</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L+P</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($rw as $item)
                @php
                    $jumlahlakilaki = DbCikara::jumlahJk('rw',$item->id,'laki-laki');
                    $jumlahperempuan = DbCikara::jumlahJk('rw',$item->id,'perempuan');
                    $total          = $jumlahlakilaki + $jumlahperempuan;
                @endphp
                <tr>
                        <td class="text-center">{{ $loop->iteration}}</td>
                        <td>{{ $item->nama_rw}}</td>
                        @php
                        $center = ($item->nik == '-') ? 'text-center' : NULL; 
                    @endphp
                    <td class="{{ $center }}">{{ DbCikara::namapenduduk($item->nik)}}</td>
                    <td class="{{ $center }}">{{ $item->nik}}</td>
                        <td class="text-center">{{ DbCikara::countData('rt',['rw_id',$item->id]) }}</td>
                        <td class="text-center">{{ DbCikara::jumlahKK('rw',$item->id) }}</td>
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
    @include('sistem.cetak.footer')

	</div>
</body>
</html>