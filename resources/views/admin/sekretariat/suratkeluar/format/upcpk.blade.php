<input type="hidden" name="konfirmasi" value="selesai">
<div class="row">
    <div class="col-md-6">
        <table class="table table-borderless">
            <tr>
                <th>Nama</th>
                <td width="5%">:</td>
                <td class="text-capitalize">{{ $main['penduduk']->nama_penduduk }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td>{{ $main['penduduk']->jk }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-borderless">
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td width="5%">:</td>
                <td>{{ ucwords($main['penduduk']->tempat_lahir).', '.date_indo($main['penduduk']->tgl_lahir) }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ $main['penduduk']->alamat_sekarang }}</td>
            </tr>
        </table>
    </div>
</div>
<hr>
<input type="hidden" name="penduduk_id" value="{{ $main['penduduk']->id }}">
<div class="form-group row">
    <label for="" class="col-md-4">Perihal Surat</label>
    <input type="text" name="perihal" class="form-control col-md-8" required>
</div>
<div class="form-group row">
    <label for="" class="col-md-4">Sifat Surat</label>
    <select name="sifat" id="" class="form-control col-md-8" required>
        <option value="biasa">BIASA</option>
        <option value="penting">PENTING</option>
    </select>
</div>
<div class="form-group row">
    <label for="" class="col-md-4">Surat ditujukan kepada</label>
    <input type="text" name="kepada" class="form-control col-md-8" placeholder="" required>
</div>
<div class="form-group row">
    <label for="" class="col-md-4">Isi pengajuan surat</label>
    <input type="text" name="isi" class="form-control col-md-8" placeholder="" required>
</div>
<div class="form-group row">
    <label for="" class="col-md-4">Nomor ID BDT</label>
    <input type="text" name="idbdt" class="form-control col-md-8" placeholder="" required>
</div>
<div class="form-group row">
    <label for="" class="col-md-4">Penyakit</label>
    <input type="text" name="penyakit" class="form-control col-md-8" placeholder="" required>
</div>
<div class="form-group row">
    <label for="" class="col-md-4">Mengetahui</label>
    <input type="text" name="mengetahui" class="form-control col-md-8" placeholder="" required>
</div>