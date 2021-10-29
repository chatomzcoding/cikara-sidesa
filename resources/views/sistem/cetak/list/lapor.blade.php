<!DOCTYPE html>
<html>
<head>
	<title>Data Laporan Penduduk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Laporan Penduduk</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Photo</th>
                    <th>Nama Penduduk</th>
                    <th>Isi Laporan</th>
                    <th>Kategori</th>
                    <th>Posting</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @foreach ($lapor as $item)
                    @php
                        if ($item->identitas == 'ya') {
                          $nama = DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk;
                        } else {
                          $nama   = "nama disamarkan";
                        }
                        
                    @endphp
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('img/penduduk/lapor/'.$item->photo) }}" alt="laporan" width="100px"></td>
                        @if ($item->identitas == 'ya')
                         <td>{{ $nama }}</td>
                        @else
                          <td class="text-danger font-italic">{{ $nama }}</td>
                        @endif
                        <td>{{ $item->isi }} <br> 
                        @if (!is_null($item->tanggapan))
                          <i class="text-secondary">Tanggapan :{{ $item->tanggapan }}</i>
                        @endif
                        </td>
                        <td>{{ $item->kategori }}</td>
                        <td class="text-center">{{ $item->posting }}</td>
                        <td>
                            @switch($item->status)
                                @case('selesai')
                                  <span class="badge badge-success w-100">{{ $item->status }}</span></td>
                                    @break
                                @case('menunggu')
                                  <span class="badge badge-danger w-100">{{ $item->status }}</span></td>
                                    @break
                                @case('proses')
                                  <span class="badge badge-warning w-100">{{ $item->status }}</span></td>
                                    @break
                                @default
                                    
                            @endswitch
                    </tr>
                @endforeach
        </table>
	</div>
</body>
</html>