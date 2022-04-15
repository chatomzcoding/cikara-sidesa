<tr>
    <th>Perihal</th>
    <td>:</td>
    <td>{{ $isi->perihal }}</td>
</tr>
<tr>
    <th>Sifat</th>
    <td>:</td>
    <td>{{ $isi->sifat }}</td>
</tr>
<tr>
    <th>Ditujuka Kepada</th>
    <td>:</td>
    <td>{{ $isi->kepada }}</td>
</tr>
<tr>
    <th>Isi Surat</th>
    <td>:</td>
    <td>{{ $isi->isi }}</td>
</tr>
@php
    $penduduk = DbCikara::showtablefirst('penduduk',['id',$isi->penduduk_id])
@endphp
@if ($penduduk)
    <tr>
        <th>Nama Penduduk</th>
        <td>:</td>
        <td class="text-capitalize">{{ $penduduk->nama_penduduk }}</td>
    </tr>
    <tr>
        <th>Tempat, Tanggal Lahir</th>
        <td>:</td>
        <td class="text-capitalize">{{ $penduduk->tempat_lahir.', '.date_indo($penduduk->tgl_lahir) }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>:</td>
        <td>{{ $penduduk->jk }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>:</td>
        <td>{{ ucwords($penduduk->alamat_sekarang) }}</td>
    </tr>
@endif
<tr>
    <th>No ID BDT</th>
    <td>:</td>
    <td>{{ $isi->idbdt }}</td>
</tr>
<tr>
    <th>Penyakit</th>
    <td>:</td>
    <td>{{ $isi->penyakit }}</td>
</tr>
<tr>
    <th>Mengetahui</th>
    <td>:</td>
    <td>{{ $isi->mengetahui }}</td>
</tr>