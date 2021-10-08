<?php

if (! function_exists('format_surat')) {
    function format_surat($kode)
    {
        $list = [];
        switch ($kode) {
            case 'S-01':
                $list = ['keperluan','tgl_awal','tgl_akhir'];
                break;
            case 'S-02':
                $list = ['keterangan','tgl_awal','tgl_akhir'];
                break;
            case 'S-03':
                $list = ['kepala_kk','no_kk'];
                break;
            case 'S-04':
                $list = ['rt_tujuan','rw_tujuan','dusun_tujuan','desa_tujuan','kecamatan_tujuan','kabupaten_tujuan','alasan_pindah','tanggal_pindah','jumlah_pengikut','keterangan'];
                break;
            case 'S-05':
                $list = ['barang','jenis','nama','no_identitas','tempat_lahir','tgl_lahir','jk','alamat','pekerjaan','ketua_adat','keterangan'];
                break;
            case 'S-07':
                $list = ['kepala_kk','no_kk','keterangan'];
                break;
            case 'S-09':
                $list = ['nama','no_identitas','tempat_lahir','tgl_lahir','jk','alamat','pekerjaan','agama','keterangan','perbedaan','kartu_identitas'];
                break;
            case 'S-10':
                $list = ['kepala_kk','no_kk','keperluan','tgl_awal','tgl_akhir'];
                break;        
            case 'S-11':
                $list = ['keperluan'];
                break;        
            case 'S-12':
                $list = ['kepala_kk','no_kk','keperluan','jenis','tgl_awal','tgl_akhir'];
                break;        
            case 'S-13':
                $list = ['kepala_kk','no_kk','rincian','keterangan'];
                break;        
            case 'S-14':
                $list = ['kepala_kk','no_kk','keperluan','usaha','tgl_awal','tgl_akhir'];
                break;        
            case 'S-15':
                $list = ['keperluan','no_jamkesos'];
                break;        
            case 'S-17':
                $list = ['nama','tempat_lahir','tgl_lahir','jk','hari_lahir','waktu_lahir','kelahiran_ke','nama_ibu','nik_ibu','umur_ibu','pekerjaan_ibu','alamat_ibu','desa_ibu','kec_ibu','kab_ibu','nama_ayah','nik_ayah','umur_ayah','pekerjaan_ayah','alamat_ayah','desa_ayah','kec_ayah','kab_ayah','nama_pelapor','nik_pelapor','umur_pelapor','pekerjaan_pelapor','desa_pelapor','kec_pelapor','kab_pelapor','prov_pelapor','hub_pelapor','tempat_lahir_pelapor','tanggal_lahir_pelapor','nama_saksi1','nik_saksi1','tempat_lahir_saksi1','tanggal_lahir_saksi1','umur_saksi1','pekerjaan_saksi1','desa_saksi1','kec_saksi1','kab_saksi1','prov_saksi1','nama_saksi2','nik_saksi2','tempat_lahir_saksi2','tanggal_lahir_saksi2','umur_saksi2','pekerjaan_saksi2','desa_saksi2','kec_saksi2','kab_saksi2','prov_saksi2'];
                break;        
            default:
                # code...
                break;
        }
        return $list;
    }
}