@php
    $list = format_surat($format->kode);
@endphp
@if (in_array('kepala_kk',$list))
    
    <tr>
        <th>
            Kepala Keluarga <strong class="text-danger">*</strong>
        </th>
        <td>
            @if (is_null($data['kepalakk']))
                <input type="text" name="kepala_kk" maxlength="30" class="form-control" required>
            @else
                : {{ ucwords($data['kepalakk']->nama_penduduk)}}
                <input type="hidden" name="kepala_kk" value="{{ $data['kepalakk']->nama_penduduk }}">
            @endif
        </td>
    </tr>
@endif
@if (in_array('no_kk',$list))
    <tr>
        <th>
            Nomor Kartu Keluarga <strong class="text-danger">*</strong>
        </th>
        <td>
            @if (is_null($data['kepalakk']))
            <input type="text" name="no_kk" maxlength="16" class="form-control" required>
        @else
            : {{ $data['datakk']->no_kk}}
            <input type="hidden" name="no_kk" value="{{ $data['datakk']->no_kk }}">
        @endif
        </td>
    </tr>
@endif
@if (in_array('rt_tujuan',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">RT Tujuan <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="rt_tujuan" maxlength="10" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('rw_tujuan',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">RW Tujuan <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="rw_tujuan" maxlength="10" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('dusun_tujuan',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Dusun Tujuan <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="dusun_tujuan" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('desa_tujuan',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Desa Tujuan <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="desa_tujuan" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kecamatan_tujuan',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kecamatan Tujuan <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kecamatan_tujuan" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kabupaten_tujuan',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kabupaten Tujuan <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kabupaten_tujuan" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('alasan_pindah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Alasan Pindah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="alasan_pindah" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tanggal_pindah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tanggal Pindah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" name="tanggal_pindah" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('jumlah_pengikut',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Jumlah Pengikut <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" name="jumlah_pengikut" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('barang',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Barang <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="barang" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('jenis',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Jenis <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="jenis" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nama',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Lengkap <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('no_identitas',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">No Identitas <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="no_identitas" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tempat_lahir',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tempat Lahir <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="tempat_lahir" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tgl_lahir',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tanggal Lahir <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('jk',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Jenis Kelamin <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <select name="jk" id="" class="form-control" required>
                <option value="laki-laki">Laki - laki</option>
                <option value="perempuan">Perempuan</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>
    </td>
</tr>
@endif
@if (in_array('alamat',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Alamat <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="alamat" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('pekerjaan',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Pekerjaan <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="pekerjaan" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('agama',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Agama <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="agama" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('ketua_adat',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Ketua Adat <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="ketua_adat" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('perbedaan',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Informasi perbedaan identitas <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="perbedaan" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kartu_identitas',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kartu Identitas <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kartu_identitas" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('rincian',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Rincian Surat <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="rincian" class="form-control" maxlength="255" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('keperluan',$list))
  
@endif
@if (in_array('keperluan',$list))
    <tr>
        <td>
            <div class="form-group">
                <label for="">Keperluan Surat <strong class="text-danger">*</strong></label>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="text" name="keperluan" class="form-control" maxlength="255" required>
            </div>
        </td>
    </tr>
@endif
@if (in_array('keterangan',$list))
    <tr>
        <td>
            <div class="form-group">
                <label for="">Keterangan Surat <strong class="text-danger">*</strong></label>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="text" name="keterangan" maxlength="255" class="form-control" required>
            </div>
        </td>
    </tr>
@endif
@if (in_array('usaha',$list))
    <tr>
        <td>
            <div class="form-group">
                <label for="">Nama Usaha <strong class="text-danger">*</strong></label>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="text" name="usaha" maxlength="255" class="form-control" required>
            </div>
        </td>
    </tr>
@endif
@if (in_array('no_jamkesos',$list))
    <tr>
        <td>
            <div class="form-group">
                <label for="">Nomor Jamkesos <strong class="text-danger">*</strong></label>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="text" name="no_jamkesos" maxlength="255" class="form-control" required>
            </div>
        </td>
    </tr>
@endif
@if (in_array('tgl_awal',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Berlaku dari <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" name="tgl_awal" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tgl_akhir',$list))
    <tr>
        <td>
            <div class="form-group">
                <label for="">Berlaku sampai <strong class="text-danger">*</strong></label>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="date" name="tgl_akhir" class="form-control" required>
            </div>
        </td>
    </tr>
@endif
@if (in_array('keperluan',$list))
   
@endif

