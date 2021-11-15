@forelse ($data['tabel'] as $item)
    <tr>
        <td class="text-center">{{ $item['no']}}</td>
        <td>{{ $item['nama']}}</td>
        <td class="text-center">{{ $item['l']}}</td>
        <td class="text-center">{{ $item['p']}}</td>
        <td class="text-center">{{ $item['lp']}}</td>
    </tr>
@empty
    <tr class="text-center">
        <td colspan="5">tidak ada data</td>
    </tr>
@endforelse