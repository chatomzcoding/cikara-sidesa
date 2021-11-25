{{-- form looping --}}
@foreach (format_surat($format->kode) as $item)
    <tr>
        <th width="30%">
            <div class="form-group pt-2 pb-0">
                <label for="" class="text-capitalize">{{ nama_label($item) }} <strong class="text-danger">*</strong></label>
            </div>
        </th>
        <td>
            <div class="form-group">
                @switch($item)
                    @case('no_kk')
                    <input type="text" name="{{ $item }}" pattern="[0-9]{16}" maxlength="16" class="form-control" required>
                    @break
                    @case('tanggal_pindah')
                    <input type="date" name="{{ $item }}" class="form-control" required>
                        @break
                    @case('jumlah_pengikut')
                    <input type="number" name="{{ $item }}" min="1" max="20" class="form-control" value="1" required>
                        @break
                    @default
                        <input type="text" name="{{ $item }}" class="form-control" required>
                        
                @endswitch
            </div>
        </td>
    </tr>
@endforeach

{{-- @php
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
            <label for="">Nama <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nama_anak',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Anak <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama_anak" maxlength="100" class="form-control" required>
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
@if (in_array('nama_bayi',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Bayi <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama_bayi" maxlength="100" class="form-control" required>
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
@if (in_array('waktu_lahir',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Waktu Lahir <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="time" name="waktu_lahir" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('hari_lahir',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Hari Lahir <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="hari_lahir" maxlength="20" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('alamat_anak',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Alamat Anak <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="alamat_anak" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kelahiran_ke',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">kelahiran Ke <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" name="kelahiran_ke" min="1" class="form-control" required>
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



@if (in_array('lokasi_disdukcapil',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Lokasi Disdukcapil <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="lokasi_disdukcapil" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nama_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama_ibu" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nik_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">NIK Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nik_ibu" pattern="[0-9]{16}" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tempat_lahir_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tempat Lahir Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="tempat_lahir_ibu" maxlength="100" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tanggal_lahir_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tanggal Lahir Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" name="tanggal_lahir_ibu" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('umur_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Umur Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="umur_ibu" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('pekerjaan_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Pekerjaan Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="pekerjaan_ibu" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('alamat_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Alamat Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="alamat_ibu" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('desa_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Desa Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="desa_ibu" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kec_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kecamatan Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kec_ibu" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kab_ibu',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kabupaten Ibu <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kab_ibu" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nama_ayah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Ayah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama_ayah" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nik_ayah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">NIK Ayah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nik_ayah" pattern="[0-9]{16}" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('umur_ayah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Umur Ayah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="umur_ayah" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('pekerjaan_ayah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Pekerjaan Ayah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="pekerjaan_ayah" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('alamat_ayah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Alamat Ayah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="alamat_ayah" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('desa_ayah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Desa Ayah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="desa_ayah" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kec_ayah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kecamatan Ayah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kec_ayah" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kab_ayah',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kabupaten Ayah <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kab_ayah" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('alamat_orangtua',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Alamat Orang Tua <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="alamat_orangtua" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nama_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nik_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">NIK Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nik_pelapor" pattern="[0-9]{16}" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('umur_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Umur Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="umur_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('pekerjaan_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Pekerjaan Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="pekerjaan_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('desa_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Desa Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="desa_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kec_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kecamatan Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kec_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kab_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kabupaten Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kab_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('prov_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Provinsi Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="prov_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('hub_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Hubungan Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="hub_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tempat_lahir_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tempat Lahir Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="tempat_lahir_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tanggal_lahir_pelapor',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tanggal Lahir Pelapor <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" name="tanggal_lahir_pelapor" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nama_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nik_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">NIK Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nik_saksi1" pattern="[0-9]{16}" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tempat_lahir_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tempat Lahir Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="tempat_lahir_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tanggal_lahir_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tanggal Lahir Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" name="tanggal_lahir_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('umur_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Umur Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="umur_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('pekerjaan_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Pekerjaan Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="pekerjaan_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('desa_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Desa Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="desa_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kec_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kecamatan Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kec_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kab_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kabupaten Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kab_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('prov_saksi1',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Provinsi Saksi 1 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="prov_saksi1" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nama_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Nama Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nama_saksi2" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('nik_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">NIK Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="nik_saksi2" pattern="[0-9]{16}" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tempat_lahir_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tempat Lahir Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="tempat_lahir_saksi2" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('tanggal_lahir_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Tanggal Lahir Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" name="tanggal_lahir_saksi2" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('umur_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Umur Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="umur_saksi2" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('pekerjaan_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Pekerjaan Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="pekerjaan_saksi2" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('desa_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Desa Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="desa_saksi2" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kec_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kecamatan Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kec_saksi2" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('kab_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Kabupaten Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="kab_saksi2" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif
@if (in_array('prov_saksi2',$list))
<tr>
    <td>
        <div class="form-group">
            <label for="">Provinsi Saksi 2 <strong class="text-danger">*</strong></label>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" name="prov_saksi2" maxlength="255" class="form-control" required>
        </div>
    </td>
</tr>
@endif --}}
