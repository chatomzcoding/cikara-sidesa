<!DOCTYPE html>
<html>
<head>
	<title>Data Surat Penduduk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="text-center text-uppercase">
        <h6>
            LAPORAN KONDISI PENDUDUK MENURUT PENDIDIKAN, MATA PENCAHARIAN, AGAMA <br>
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
                    <th rowspan="3" style="vertical-align: middle" class="text-uppercase">
                        @for ($i = 0; $i < count(str_split($kolom['nourut'])); $i++)
                            {{ $kolom['nourut'][$i] }} <br>
                        @endfor
                    </th>
                    <th rowspan="3" style="vertical-align: middle">NAMA DUSUN</th>
                    <th colspan="{{ $kolom['kolom'] }}">KONDISI PENDUDUK BERDASARKAN</th>
                    <th colspan="3" rowspan="2" style="vertical-align: middle">KEWARGA NEGARAAN</th>
                </tr>
                <tr>
                    <th colspan="{{ count($list['pendidikan']) }}">MENURUT JENJANG PENDIDIKAN</th>
                    <th colspan="{{ count($list['pekerjaan']) }}">MENURUT MATA PENCAHARIAN</th>
                    <th colspan="{{ count($list['agama']) }}">MENURUT AGAMA</th>
                </tr>
                <tr>
                    @foreach ($list as $item)
                        @foreach ($item as $kode => $judul)
                        <td class="text-uppercase" style="vertical-align: middle">
                            @for ($i = 0; $i < count(str_split($judul)); $i++)
                                {{ $judul[$i] }} <br>
                            @endfor
                        </td>
                        @endforeach
                    @endforeach
                </tr>
                <tr>
                    @for ($i = 1; $i <= 31; $i++)
                    <th>{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody class="text-capitalize">
              @foreach ($data as $item)
                  <tr>
                      <th>{{ $item['no'] }}</th>
                      <th>{{ $item['nama_dusun'] }}</th>
                      @foreach ($item['pendidikan'] as $j)
                          <td>{{ $j }}</td>
                      @endforeach
                      @foreach ($item['pekerjaan'] as $j)
                          <td>{{ $j }}</td>
                      @endforeach
                      @foreach ($item['agama'] as $j)
                          <td>{{ $j }}</td>
                      @endforeach
                      @foreach ($item['warga'] as $j)
                          <td>{{ $j }}</td>
                      @endforeach
                  </tr>
              @endforeach
              <tr>
                  <th colspan="2" class="text-center">JUMLAH</th>
                  @foreach ($kolom['jumlah'] as $item)
                      <td>{{ $item }}</td>
                  @endforeach
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