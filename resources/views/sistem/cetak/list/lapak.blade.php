<!DOCTYPE html>
<html>
<head>
	<title>Data Laporan Lapak</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Laporan Lapak</h4>
            <hr>
        </section>
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Logo</th>
                    <th>Nama Lapak</th>
                    <th>Nama Pemilik</th>
                    <th>Keterangan</th>
                    <th>Total Produk</th>
                    <th>Total Transaksi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @foreach ($lapak as $item)
                @php
                    $nama = DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk;
                @endphp
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('img/penduduk/lapak/'.$item->logo) }}" alt="logo" width="100px"></td>
                        <td>{{ $item->nama_lapak }}</td>
                        <td>{{ $nama }}</td>
                        <td>{{ $item->tentang }}</td>
                        <td class="text-center">{{ DbCikara::countData('produk',['lapak_id',$item->id]) }}</td>
                        <td class="text-center">0</td>
                        <td> @switch($item->status_lapak)
                          @case('lapak')
                            <span class="badge badge-success w-100">{{ $item->status_lapak }}</span></td>
                              @break
                          @case('menunggu')
                            <span class="badge badge-danger w-100">{{ $item->status_lapak }}</span></td>
                              @break
                          @case('tutup')
                            <span class="badge badge-warning w-100">{{ $item->status_lapak }}</span></td>
                              @break
                          @default
                              
                      @endswitch</td>
                    </tr>
                @endforeach
        </table>
	</div>
</body>
</html>