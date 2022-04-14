<!DOCTYPE html>
<html>
<head>
	<title>Data Surat Penduduk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="text-center text-uppercase">
        <h6>
            LAPORAN PENDUDUK BERDASARKAN KELOMPOK UMUR <br>
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
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama Dusun</th>
                    <th colspan="2">0-4 TH</th>
                    <th colspan="2">5-12 TH</th>
                    <th colspan="2">13-15 TH</th>
                    <th colspan="2">16-19 TH</th>
                    <th colspan="2">20-24 TH</th>
                    <th colspan="2">25-29 TH</th>
                    <th colspan="2">30-34 TH</th>
                    <th colspan="2">35-39 TH</th>
                    <th colspan="2">40-44 TH</th>
                    <th colspan="2">45-49 TH</th>
                    <th colspan="2">50-54 TH</th>
                    <th colspan="2">55-59 TH</th>
                    <th colspan="2">60-64 TH</th>
                    <th colspan="2">65 TH.KEATAS</th>
                    <th colspan="2">JUMLAH</th>
                    <th rowspan="2">TOTAL</th>
                </tr>
                <tr>
                    @for ($i = 0; $i < 15; $i++)
                        <th>LK</th>
                        <th>PR</th>
                    @endfor
                </tr>
                <tr>
                    @for ($i = 1; $i <= 33; $i++)
                    <th>{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody class="text-capitalize">
               @foreach ($data as $item)
                   <tr>
                       <th>{{ $item['no'] }}</th>
                       <th>{{ $item['nama_dusun'] }}</th>
                       @foreach ($item['umur'] as $i)
                           <td class="text-right">{{ $i[0] }}</td>
                           <td class="text-right">{{ $i[1] }}</td>
                       @endforeach
                       <td class="text-right">{{ $item['jumlah'][0] }}</td>
                       <td class="text-right">{{ $item['jumlah'][1] }}</td>
                       <th class="text-right">{{ $item['total'] }}</th>
                   </tr>
               @endforeach
               <tr>
                   <th colspan="2" class="text-center">JUMLAH</th>
                   @for ($i = 0; $i < 28; $i++)
                       <td class="text-right">{{ jumlahjkdusun($jumlah['jumlahkolom'],$i) }}</td>
                   @endfor
                   <td class="text-right">{{ $jumlah['jumlahjk'][0] }}</td>
                   <td class="text-right">{{ $jumlah['jumlahjk'][1] }}</td>
                   <td class="text-right">{{ $jumlah['total'] }}</td>
               </tr>
            </tbody>
        </table>
    <footer style="margin-top: 70px">
        <table width="100%">
            <tr class="text-uppercase">
                <td class="text-center" width="40%">
                   MENGETAHUI :<br>
                   KEPALA DESA {{ $desa->nama_desa }} <br><br><br><br>
                   @if ($main['kepaladesa'])
                       <u class="text-uppercase">{{ ucwords($main['kepaladesa']->nama_pegawai) }}</u> <br>
                       {{ $main['kepaladesa']->nip }}
                   @else
                       nama kepala desa <br>
                   @endif
                </td>
                <td width="20%"></td>
                <td class="text-center">
                   {{ $desa->nama_desa }}, {{ date_indo(tgl_sekarang()) }} <br>
                   KASI PEMERINTAHAN <br><br><br><br>
                   @if ($staf)
                       <u class="text-uppercase">{{ ucwords($staf->nama_pegawai) }}</u> <br>
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