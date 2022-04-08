<!DOCTYPE html>
<html>
<head>
	<title>Data Surat Penduduk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="text-center text-uppercase">
        <h6>
            LAPORAN PERKEMBANGAN DATA KEPENDUDUKAN <br>
            PEMERINTAH DAERAH KABUPATEN {{ $desa->nama_kabupaten }} <br>
            KECAMATAN {{ $desa->nama_kecamatan }} <br>
            DESA {{ $desa->nama_desa }} <br>
            BULAN {{ bulan_indo().' '.ambil_tahun() }}
        </h6>
    </header>
	<div class="container-fluid">
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">NAMA DUSUN</th>
                    <th rowspan="2">LUAS WILAYAH</th>
                    <th colspan="2">JUMLAH</th>
                    <th colspan="3">JUMLAH PENDUDUK BLN LALU</th>
                    <th colspan="3">LAHIR BULAN INI</th>
                    <th colspan="3">MATI BULAN INI</th>
                    <th colspan="3">PINDAH BULAN INI</th>
                    <th colspan="3">DATANG BULAN INI</th>
                    <th colspan="3">JUMLAH PENDUDUK BULAN INI</th>
                    <th colspan="3">WAJIB KTP</th>
                    <th rowspan="2">Jumlah KK</th>
                    <th rowspan="2">Telah Memiliki KK</th>
                    <th rowspan="2">Telah Memiliki Akte Lahir</th>
                </tr>
                <tr>
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
                    <TH>Miliki</TH>
                    <TH>Belum</TH>
                    <TH>Jml</TH>
                </tr>
                <tr>
                    @for ($i = 1; $i <= 29; $i++)
                    <th>{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $item['no'] }}</td>
                        <td>{{ $item['nama_dusun'] }}</td>
                        <td>{{ norupiah($item['luas']) }}</td>
                        <td>{{ $item['rt'] }}</td>
                        <td>{{ $item['rw'] }}</td>
                        @foreach ($item['jumlah'] as $key => $value)
                            @for ($i = 0; $i < count($value); $i++)
                                <td class="text-right">{{ $value[$i] }}</td>
                            @endfor
                        @endforeach
                        <td class="text-right">{{ $item['kk'] }}</td>
                        <td class="text-right">{{ $item['kkmiliki'] }}</td>
                        <td class="text-right">{{ $item['akte_lahir'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <footer style="margin-top: 70px">
        <table width="100%">
            <tr>
                <td width="50%"></td>
                <td class="text-center">
                   {{ $desa->nama_desa }}, {{ date_indo(tgl_sekarang()) }} <br>
                   KASI PEMERINTAHAN <br><br><br><br>
                   @if ($staf)
                       {{ ucwords($staf->nama_pegawai) }} <br>
                       {{ $staf->nip }}
                   @else
                       nama pegawai <br>
                   @endif
                </td>
            </tr>
        </table>
    </footer>

	</div>
</body>
</html>