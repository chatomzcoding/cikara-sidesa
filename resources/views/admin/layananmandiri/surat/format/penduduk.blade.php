<input type="hidden" name="konfirmasi" value="selesai">
<div class="row">
    <div class="col-md-6">
        <table class="table table-borderless">
            <tr>
                <th>Nama</th>
                <td width="5%">:</td>
                <td class="text-capitalize">{{ $main['data']['penduduk']->nama_penduduk }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td>{{ $main['data']['penduduk']->jk }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-borderless">
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td width="5%">:</td>
                <td>{{ ucwords($main['data']['penduduk']->tempat_lahir).', '.date_indo($main['data']['penduduk']->tgl_lahir) }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ $main['data']['penduduk']->alamat_sekarang }}</td>
            </tr>
        </table>
    </div>
</div>