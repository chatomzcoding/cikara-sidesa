@php
    $agama = [0,20, 2, 1, 0, 0,2,3]
@endphp
@forelse (list_agama() as $item)
@php
    $no = $loop->iteration;
@endphp
<tr>
    <td class="text-center">{{ $no}}</td>
    <td>{{ $item}}</td>
    <td class="text-center">{{ $agama[$no] }}</td>
    <td class="text-center">3</td>
    <td class="text-center">1</td>
</tr>

@empty
<tr class="text-center">
    <td colspan="5">tidak ada data</td>
</tr>
@endforelse
<tr>
<th colspan="2">JUMLAH</th>
<td class="text-center">20</td>
<td class="text-center">15</td>
<td class="text-center">5</td>
</tr>
<tr>
<th colspan="2">BELUM MENGISI</th>
<td class="text-center">0</td>
<td class="text-center">0</td>
<td class="text-center">0</td>
</tr>
<tr>
<th colspan="2">TOTAL</th>
<td class="text-center">20</td>
<td class="text-center">15</td>
<td class="text-center">5</td>
</tr>
       