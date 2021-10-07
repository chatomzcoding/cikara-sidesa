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
            default:
                # code...
                break;
        }
        return $list;
    }
}