<!DOCTYPE html>
<html>
<head>
	<title>Data Dusun</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Dusun</h4>
            <hr>
        </section>
		<table class="table table-bordered small">
            <tr class="text-center">
                <th>No</th>
                <th>Nama Dusun</th>
                <th>Kepala Dusun</th>
                <th>RW</th>
                <th>KK</th>
                <th>L</th>
                <th>P</th>
                <th>L+P</th>
            </tr>
            @foreach ($dusun as $item)
                @php
                    $jumlahlakilaki = DbCikara::jumlahJk('dusun',$item->id,'laki-laki');
                    $jumlahperempuan = DbCikara::jumlahJk('dusun',$item->id,'perempuan');
                    $total          = $jumlahlakilaki + $jumlahperempuan;
                @endphp
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->nama_dusun }}</td>
                <td class="text-capitalize">{{ DbCikara::datapenduduk($item->nik,'nik')->nama_penduduk}}</td>
                <td class="text-center">{{ DbCikara::countData('rw',['dusun_id',$item->id]) }}</td>
                <td class="text-center">{{ DbCikara::jumlahKK('dusun',$item->id) }}</td>
                <td class="text-center">{{ $jumlahlakilaki }}</td>
                <td class="text-center">{{ $jumlahperempuan }}</td>
                <td class="text-center">{{ $total }}</td>
            </tr>
            @endforeach
        </table>
	</div>
</body>
</html>