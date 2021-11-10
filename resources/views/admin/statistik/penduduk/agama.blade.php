@php
    $jlakilaki  = 0;
    $jperempuan = 0;
@endphp
@forelse (list_agama() as $item)
@php
    $no = $loop->iteration;
    $dlakilaki  = DbCikara::datastatistik('agama',['agama' => $item,'jk' => 'laki-laki']);
    $dperempuan = DbCikara::datastatistik('agama',['agama' => $item,'jk' => 'perempuan']);
    $jumlah     = $dlakilaki + $dperempuan;
    $jlakilaki  = $jlakilaki + $dlakilaki;
    $jperempuan  = $jperempuan + $dperempuan;
@endphp
<tr>
    <td class="text-center">{{ $no}}</td>
    <td>{{ $item}}</td>
    <td class="text-center">{{ $dlakilaki }}</td>
    <td class="text-center">{{ $dperempuan }}</td>
    <td class="text-center">{{ $jumlah }}</td>
</tr>

@empty
<tr class="text-center">
    <td colspan="5">tidak ada data</td>
</tr>
@endforelse
@php
    $tpl = $jlakilaki + $jperempuan; //total perempuan dan laki laki
    // cek jika belum ada yang isi
    $cl     = DbCikara::countData('penduduk',['jk','laki-laki']); //cek jumlah laki laki
    $cp     = DbCikara::countData('penduduk',['jk','perempuan']); //cek jumlah perempuan
    $bl     = $jlakilaki - $cl; //cek belum isi,, total kurang jumlah
    $bp     = $jperempuan - $cp; //cek belum isi,, total kurang jumlah
    $tb     = $bl + $bp;
    $total_l = $jlakilaki + $bl;
    $total_p = $jperempuan + $bp;
    $total  = $total_l + $total_p;
@endphp
<tr>
<th colspan="2">JUMLAH</th>
<td class="text-center">{{ $jlakilaki }}</td>
<td class="text-center">{{ $jperempuan }}</td>
<td class="text-center">{{ $tpl }}</td>
</tr>
<tr>
<th colspan="2">BELUM MENGISI</th>
<td class="text-center">{{ $bl }}</td>
<td class="text-center">{{ $bp }}</td>
<td class="text-center">{{ $tb }}</td>
</tr>
<tr>
<th colspan="2">TOTAL</th>
<td class="text-center">{{ $total_l }}</td>
<td class="text-center">{{ $total_p }}</td>
<td class="text-center">{{ $total }}</td>
</tr>
       