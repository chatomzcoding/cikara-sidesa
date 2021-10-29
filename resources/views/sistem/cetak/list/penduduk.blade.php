<!DOCTYPE html>
<html>
<head>
	<title>Data Penduduk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Penduduk</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Dusun</th>
                    <th>RW</th>
                    <th>RT</th>
                    <th>Pendidikan dalam KK</th>
                    <th>Pekerjaan</th>
                    <th>Kawin</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($penduduk as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration}}</td>
                    <td>{{ $item->nik}}</td>
                    <td>{{ $item->nama_penduduk}}</td>
                    <td>{{ $item->jk}}</td>
                    <td>{{ $item->alamat_sekarang}}</td>
                    @php
                        $rt     = DbCikara::showtablefirst('rt',['id',$item->rt_id]);
                        $rw     = DbCikara::showtablefirst('rw',['id',$rt->rw_id]);
                        $dusun  = DbCikara::showtablefirst('dusun',['id',$rw->dusun_id]);
                    @endphp
                    <td>{{ $dusun->nama_dusun }}</td>
                    <td>{{ $rw->nama_rw }}</td>
                    <td>{{ $rt->nama_rt }}</td>
                    <td>{{ $item->pendidikan_kk}}</td>
                    <td>{{ $item->pekerjaan}}</td>
                    <td>{{ $item->status_perkawinan}}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="16" class="text-center">belum ada data</td>
                    </tr>
                @endforelse
            {{-- <tfoot class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Aksi</th>
                    <th>NIK</th>
                    <th>Tag ID Card</th>
                    <th>Nama</th>
                    <th>No. KK</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>No. Rumah Tangga</th>
                    <th>Alamat</th>
                    <th>Dusun</th>
                    <th>RW</th>
                    <th>RT</th>
                    <th>Pendidikan dalam KK</th>
                    <th>Umur</th>
                    <th>Pekerjaan</th>
                    <th>Kawin</th>
                </tr>
            </tfoot> --}}
        </table>
	</div>
</body>
</html>