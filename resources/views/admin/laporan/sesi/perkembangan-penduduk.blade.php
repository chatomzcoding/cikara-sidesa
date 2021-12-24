@extends('layouts.mini')

@section('title')
    {{ $judul }}
@endsection

@section('container')
    
    <header class="text-center">
        <h5 class="text-uppercase">
            {{ $judul }} <br>
            PEMERINTAH DAERAH {{ $info->sebutan_kabupaten }} {{ $desa->nama_kabupaten }} <br>
            {{ $info->sebutan_kecamatan }} {{ $desa->nama_kecamatan }} <br>
            {{ $info->sebutan_desa }} {{ $desa->nama_desa }} <br>
            BULAN {{ $waktu['bulan'] }} {{ $waktu['tahun'] }}
        </h5>
    </header>
    <main class="mt-3">
        <div class="table-responsive">
            <table border="1" width="100%">
                <tr class="text-center small">
                    <th rowspan="2">NO</th>
                    <th rowspan="2" width="8%">NAMA DUSUN</th>
                    <th rowspan="2">LUAS WILAYAH</th>
                    <th colspan="2">JUMLAH</th>
                    <th colspan="3">JUMLAH PENDUDUK BLN LALU</th>
                    <th colspan="3">LAHIR BULAN INI</th>
                    <th colspan="3">MATI BULAN INI</th>
                    <th colspan="3">PINDAH BULAN INI</th>
                    <th colspan="3">DATANG BULAN INI</th>
                    <th colspan="3">JUMLAH PENDUDUK BULAN INI</th>
                    <th colspan="3">WAJIB KTP</th>
                    <th rowspan="2">JUMLAH KK</th>
                    <th rowspan="2">Telah Memiliki KK</th>
                    <th rowspan="2">Telah Memiliki Akta Lahir</th>
                </tr>
                <tr class="text-center small">
                    <th>RT</th>
                    <th>RW</th>
                    <th>LK</th>
                    <th>PR</th>
                    <th>JML</th>
                    <th>LK</th>
                    <th>PR</th>
                    <th>JML</th>
                    <th>LK</th>
                    <th>PR</th>
                    <th>JML</th>
                    <th>LK</th>
                    <th>PR</th>
                    <th>JML</th>
                    <th>LK</th>
                    <th>PR</th>
                    <th>JML</th>
                    <th>LK</th>
                    <th>PR</th>
                    <th>JML</th>
                    <th>Miliki</th>
                    <th>Belum</th>
                    <th>Jml</th>
                </tr>
                <tr class="table-secondary text-center small">
                    @for ($i = 1; $i < 30; $i++)
                        <th>{{ $i }}</th>
                    @endfor
                </tr>
                <tr>
                    @for ($i = 1; $i < 30; $i++)
                        <th>&nbsp;</th>
                    @endfor
                </tr>
                @foreach ($dusun as $item)
                    <tr class="small text-center">
                        <td>{{ $loop->iteration }}</td>
                        <th class="text-capitalize">{{ $item->nama_dusun }}</th>
                        <td>luas</td>
                        <td>{{ DbCikara::jumlahrtperdusun($item->id) }}</td>
                        <td>{{ DbCikara::countData('rw',['dusun_id',$item->id]) }}</td>
                        @foreach (DbCikara::datalaporanpenduduk('jumlahpendudukbulanlalu',['dusun_id' => $item->id]) as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                        @foreach (DbCikara::datalaporanpenduduk('lahirbulanini',['dusun_id' => $item->id]) as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                        @foreach (DbCikara::datalaporanpenduduk('matibulanini',['dusun_id' => $item->id]) as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                <tr class="text-right">
                    <th colspan="2">JUMLAH</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                </tr>
            </table>
        </div>
        <div class="container mt-3">
            <div class="row">

                <div class="col-md-4">
                    <section class="text-center">
                        MENGETAHUI : <br>
                        KEPALA DESA PUTERAN <br><br><br><br>
                        <strong><u>DAHLAN KUSNANDI</u></strong> 
                    </section>
                </div>
                <div class="col-md-4">
    
                </div>
                <div class="col-md-4">
                    <section class="text-center">
                        PUTERAN, {{ date_indo() }} <br>
                        KASI PEMERINTAHAN <br> <br><br><br>
                        <strong><u>APIT SAEPUL MILLAH</u></strong>
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection