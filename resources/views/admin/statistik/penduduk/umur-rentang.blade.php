
@forelse (list_umurrentang() as $item)
    <tr>
        <td class="text-center">{{ $loop->iteration}}</td>
        <td>{{ $item[0]}}</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
    </tr>
    
@empty
    <tr class="text-center">
        <td colspan="5">tidak ada data</td>
    </tr>
@endforelse
<tr>
    <td></td>
    <th>JUMLAH</th>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <th>BELUM MENGISI</th>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <th>TOTAL</th>
    <td></td>
    <td></td>
    <td></td>
</tr>
           