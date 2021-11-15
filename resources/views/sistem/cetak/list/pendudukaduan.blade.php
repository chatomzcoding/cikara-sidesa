<!DOCTYPE html>
<html>
<head>
	<title>Data Penduduk Aduan Biodata</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Penduduk Aduan Biodata</h4>
            <hr>
        </section>
        <table class="table table-bordered table-striped small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Penduduk</th>
                    <th>Data Pengaduan</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @forelse ($user as $item)
                    @php
                            if ($status == 'semua') {
                                $aduan = DB::table('penduduk_aduan')
                                            ->where('user_id',$item->user_id)
                                            ->get();
                            } else {
                                $aduan = DB::table('penduduk_aduan')
                                            ->where('user_id',$item->user_id)
                                            ->where('status',$status)
                                            ->get();
                            }
                        $penduduk = DB::table('penduduk')
                                    ->join('user_akses','penduduk.id','=','user_akses.penduduk_id')
                                    ->select('penduduk.*')
                                    ->where('user_akses.user_id',$item->user_id)
                                    ->first();
                    @endphp
                    @if (count($aduan) > 0)
                        <tr>
                            <td class="text-center">{{ $loop->iteration}}</td>
                            <td><a href="{{ url('penduduk/'.Crypt::encryptString($penduduk->id)) }}" class="pop-info" title="Detail Penduduk">{{ $penduduk->nama_penduduk }}</a> <br> <span class="small">{{ $penduduk->nik }}</span></td>
                            <td class="text-center">
                                <table class="table">
                                    <tr>
                                        <td width="20%">Tanggal Aduan</td>
                                        <td>Data</td>
                                        <td>Data Awal</td>
                                        <td>Data Pengaduan</td>
                                        <td width="8%">Status</td>
                                    </tr>
                                    @foreach ($aduan as $row)
                                        @php
                                            $dawal = 'type data tidak ada';
                                            $key = $row->key; 
                                        @endphp
                                        @if (isset($penduduk->$key))
                                            @php
                                                $dawal = $penduduk->$key;
                                            @endphp
                                        @endif
                                </td>
                                        <tr>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ ubahdatakey($row->key) }}</td>
                                            <td>
                                                {{ $dawal }}
                                            </td>
                                            <td class="text-danger">
                                            {{ $row->isi }}
                                            </td>
                                            <td>
                                                @if ($row->status == 'selesai')
                                                    <span class="badge badge-success w-100">selesai</span>
                                                @else
                                                    <span class="badge badge-warning w-100">proses</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="4" class="text-center">belum ada data</td>
                    </tr>
                @endforelse
        </table>
	</div>
</body>
</html>