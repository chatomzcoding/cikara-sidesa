<!DOCTYPE html>
<html>
<head>
	<title>Data User Staf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @include('sistem.cetak.header')
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data User Staf</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama User</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-capitalize">{{ $item->nama_pegawai }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->jabatan }} </td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @endforeach
        </table>
        
        @include('sistem.cetak.footer')
	</div>
</body>
</html>