<?php

if (! function_exists('format_surat')) {
    function daftarformatsurat()
    {
        $list = ['keperluan','keterangan','kepala_kk','no_kk','rt_tujuan','rw_tujuan','dusun_tujuan','desa_tujuan','kecamatan_tujuan','kabupaten_tujuan','alasan_pindah','tanggal_pindah','jumlah_pengikut','barang','jenis','nama','no_identitas','tempat_lahir','tgl_lahir','jk','alamat','pekerjaan','ketua_adat','agama','perbedaan','kartu_identitas','rincian','usaha','no_jamkesos','hari_lahir','waktu_lahir','kelahiran_ke','nama_ibu','nik_ibu','umur_ibu','pekerjaan_ibu','alamat_ibu','desa_ibu','kec_ibu','kab_ibu','nama_ayah','nik_ayah','umur_ayah','pekerjaan_ayah','alamat_ayah','desa_ayah','kec_ayah','kab_ayah','nama_pelapor','nik_pelapor','umur_pelapor','pekerjaan_pelapor','desa_pelapor','kec_pelapor','kab_pelapor','prov_pelapor','hub_pelapor','tempat_lahir_pelapor','tanggal_lahir_pelapor','nama_saksi1','nik_saksi1','tempat_lahir_saksi1','tanggal_lahir_saksi1','umur_saksi1','pekerjaan_saksi1','desa_saksi1','kec_saksi1','kab_saksi1','prov_saksi1','nama_saksi2','nik_saksi2','tempat_lahir_saksi2','tanggal_lahir_saksi2','umur_saksi2','pekerjaan_saksi2','desa_saksi2','kec_saksi2','kab_saksi2','prov_saksi2'];
        return $list;
    }
}
if (! function_exists('avatar')) {
    function avatar($user)
    {
        if (is_null($user->profile_photo_path)) {
            $link    = 'img/avatar.png'; 
        } else {
            $link = 'public/img/user/'.$user->profile_photo_path;
            if (!file_exists($link)) {
               $link    = 'img/avatar.png'; 
            } else {
                $link   = 'img/user/'.$user->profile_photo_path;
            }
        }
        
        return $link;
    }
}
if (! function_exists('format_surat')) {
    function format_surat($kode)
    {
        $list = [];
        switch ($kode) {
            case 'S-01':
                $list = ['keperluan','no_kk'];
                break;
            case 'S-02':
                $list = ['keterangan','no_kk'];
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
                $list = ['kepala_kk','no_kk','keperluan'];
                break;        
            case 'S-11':
                $list = ['keperluan'];
                break;        
            case 'S-12':
                $list = ['kepala_kk','no_kk','keperluan','jenis'];
                break;        
            case 'S-13':
                $list = ['kepala_kk','no_kk','barang','rincian','keterangan'];
                break;        
            case 'S-14':
                $list = ['kepala_kk','no_kk','usaha','keperluan'];
                break;        
            case 'S-15':
                $list = ['no_jamkesos','keperluan'];
                break;
            case 'S-16':
                $list = ['usaha','alamat'];
                break;        
            case 'S-17':
                $list = ['nama_bayi','tempat_lahir','tgl_lahir','jk','hari_lahir','waktu_lahir','kelahiran_ke','nama_ibu','nik_ibu','tempat_lahir_ibu','tanggal_lahir_ibu','umur_ibu','pekerjaan_ibu','alamat_ibu','desa_ibu','kec_ibu','kab_ibu','nama_ayah','nik_ayah','umur_ayah','pekerjaan_ayah','alamat_ayah','desa_ayah','kec_ayah','kab_ayah','nama_pelapor','nik_pelapor','umur_pelapor','pekerjaan_pelapor','desa_pelapor','kec_pelapor','kab_pelapor','prov_pelapor','hub_pelapor','tempat_lahir_pelapor','tanggal_lahir_pelapor','nama_saksi1','nik_saksi1','tempat_lahir_saksi1','tanggal_lahir_saksi1','umur_saksi1','pekerjaan_saksi1','desa_saksi1','kec_saksi1','kab_saksi1','prov_saksi1','nama_saksi2','nik_saksi2','tempat_lahir_saksi2','tanggal_lahir_saksi2','umur_saksi2','pekerjaan_saksi2','desa_saksi2','kec_saksi2','kab_saksi2','prov_saksi2','lokasi_disdukcapil'];
                break;        
            case 'S-18':
                $list = [
                    'nama_ayah',
                    'nama_ibu',
                    'alamat_orangtua',
                    'nama_anak',
                    'tempat_lahir',
                    'alamat_anak',
                    'tgl_lahir',
                    'hari_lahir',
                ];
                break;
            case 'S-19':
                $list = [
                    'nama_ayah',
                    'nik_ayah',
                    'nama_ibu',
                    'nik_ibu'
                ];
                break;
            case 'S-20':
                $list = [
                    'nama_anak',
                    'nik_anak',
                    'hari_lahir',
                    'tgl_lahir',
                    'waktu_lahir',
                    'tempat_lahir',
                    'bertempat',
                    'nama_ibu',
                    'nik_ibu',
                    'tanggal_lahir_ibu',
                    'pekerjaan_ibu',
                    'alamat_ibu',
                    'nama_ayah',
                    'nik_ayah',
                    'tanggal_lahir_ayah',
                    'pekerjaan_ayah',
                    'alamat_ayah',
                    'nama_pelapor',
                    'nik_pelapor',
                    'tempat_lahir_pelapor',
                    'tanggal_lahir_pelapor',
                    'jk_pelapor',
                    'pekerjaan_pelapor',
                    'alamat_pelapor',
                ];
                break;
            case 'S-21':
                $list = [
                    'tanggal_mati',
                    'hari',
                    'jam',
                    'tempat_mati',
                    'penyebab',
                    'nama_pelapor',
                    'nik_pelapor',
                    'tanggal_lahir_pelapor',
                    'pekerjaan_pelapor',
                    'alamat_pelapor',
                    'hubungan_pelapor'
                ];
                break;
            case 'S-22':
                $list = [
                    'lama_kandungan',
                    'hari',
                    'tanggal_mati',
                    'tempat_mati',
                    'nama_pelapor',
                    'hubungan_pelapor'
                ];
                break;
            case 'S-30':
                $list = [
                    'tujuan',
                    'keperluan',
                ];
                break;
            case 'S-31':
                $list = [
                    'no_kk',
                    'kepala_kk',
                    'keperluan',
                ];
                break;
            case 'S-33':
                $list = [
                    'no_kk',
                    'kepala_kk',
                    'kecamatan',
                    'tgl_nikah',
                    'nama_pasangan',
                ];
                break;
            case 'S-34':
                $list = [
                    'nama_istri',
                    'nik_istri',
                    'tempat_lahir_istri',
                    'tanggal_lahir_istri',
                    'agama_istri',
                    'pekerjaan_istri',
                    'alamat_istri',
                    'penyebab',
                ];
                break;
            case 'S-35':
                $list = [
                    'nama_pasangan',
                    'nama_ayah_pasangan',
                    'tempat_lahir_pasangan',
                    'tanggal_lahir_pasangan',
                    'warga_negara_pasangan',
                    'agama_pasangan',
                    'pekerjaan_pasangan',
                    'alamat_pasangan',
                ];
                break;
            case 'S-36':
                $list = [
                    'no_kk'
                ];
                break;
            case 'S-37':
                $list = [
                    'nama',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'nik',
                    'no_kk',
                    'warga_negara',
                    'agama',
                    'jk',
                    'pekerjaan',
                    'alamat',
                    'nama_usaha',
                    'jenis_usaha',
                    'akta_usaha',
                    'akta_tahun',
                    'notaris',
                    'bangunan',
                    'peruntukan_bangunan',
                    'status_bangunan',
                    'alamat_usaha',
                ];
                break;
            case 'S-38':
                $list = [
                    'keperluan'
                ];
                break;
            case 'S-39':
                $list = [
                    'selaku',
                    'mengizinkan',
                    'nama',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'warga_negara',
                    'agama',
                    'pekerjaan',
                    'alamat',
                    'rt',
                    'rw',
                    'dusun',
                    'negara_tujuan',
                    'nama_pptkis',
                    'pekerja',
                    'masa_kontrak',
                ];
                break;
            case 'S-40':
                $list = [
                    'jalan',
                    'dusun',
                    'desa',
                    'kecamatan',
                    'kabupaten',
                    'nib',
                    'status_tanah',
                    'keperluan',
                    'luas',
                    'batas_utara',
                    'batas_timur',
                    'batas_selatan',
                    'batas_barat',
                    'peroleh',
                    'tahun_peroleh',
                    'dengan_jalan',
                    'nama_saksi1',
                    'umur_saksi1',
                    'pekerjaan_saksi1',
                    'alamat_saksi1',
                    'nama_saksi2',
                    'umur_saksi2',
                    'pekerjaan_saksi2',
                    'alamat_saksi2',
                ];
                break;
                case 'S-41':
                    $list = [
                        'no_kk'
                    ];
                    break;
                case 'S-42':
                    $list = [
                        'nomor_induk',
                        'jurusan',
                        'sekolah',
                        'kelas',
                        'nama_ayah',
                        'tempat_lahir_ayah',
                        'tanggal_lahir_ayah',
                        'nik_ayah',
                        'agama_ayah',
                        'pekerjaan_ayah',
                        'penghasilan_ayah',
                        'nama_ibu',
                        'tempat_lahir_ibu',
                        'tanggal_lahir_ibu',
                        'nik_ibu',
                        'agama_ibu',
                        'pekerjaan_ibu',
                        'penghasilan_ibu',
                    ];
                    break;
                case 'S-44':
                    $list = [
                        'nama_ayah',
                        'nik_ayah',
                        'tempat_lahir_ayah',
                        'tanggal_lahir_ayah',
                        'alamat_ayah',
                        'agama_ayah',
                        'pekerjaan_ayah',
                        'warga_negara_ayah',
                        'penghasilan_ayah',
                        'no_kk',
                        'kepala_kk',
                        'sekolah',
                        'keperluan',
                    ];
                    break;
                case 'S-45':
                    $list = [
                        'nama_ibu',
                        'nik_ibu',
                        'tempat_lahir_ibu',
                        'tanggal_lahir_ibu',
                        'alamat_ibu',
                        'agama_ibu',
                        'pekerjaan_ibu',
                        'warga_negara_ibu',
                        'penghasilan_ibu',
                        'no_kk',
                        'kepala_kk',
                        'sekolah',
                        'keperluan',
                    ];
                    break;
                case 'S-47':
                    $list = [
                        'nama_kuasa',
                        'nik_kuasa',
                        'tempat_lahir_kuasa',
                        'tanggal_lahir_kuasa',
                        'umur_kuasa',
                        'jk_kuasa',
                        'pekerjaan_kuasa',
                        'alamat_kuasa',
                        'keperluan',
                    ];
                    break;
                case 'S-48':
                    $list = [
                        'merk',
                        'tahun_pembuatan',
                        'warna',
                        'no_polisi',
                        'no_mesin',
                        'no_rangka',
                        'no_bpkb',
                        'bahan_bakar',
                        'isi_silinder',
                        'atas_nama',
                        'keperluan',
                    ];
                    break;
                case 'S-49':
                    $list = [
                        'jenis_tanah',
                        'atas_nama',
                        'bukti_kepemilikan',
                        'nomor_kepemilikan',
                        'luas_tanah',
                        'batas_utara',
                        'batas_timur',
                        'batas_selatan',
                        'batas_barat',
                        'asal_tanah',
                        'bukti_pendukung',
                    ];
                    break;
                
            default:
                # code...
                break;
        }
        return $list;
    }
}
if (! function_exists('nama_label')) {
    function nama_label($label,$kode)
    {
        switch ($kode) {
            case 'S-05':
                $cdata = [
                    'barang' => 'Nama Barang',
                    'jenis' => 'Jenis Barang',
                    'nama' => 'Nama Pihak Kedua',
                ];
                break;
            case 'S-09':
                $cdata = [
                    'perbedaan' => 'Data yang berbeda',
                    'kartu_identitas' => 'Kartu Identitas Pembeda',
                ];
                break;
            case 'S-12':
                $cdata = [
                    'jenis' => 'Jenis Keramaian',
                ];
                break;
            case 'S-13':
                $cdata = [
                    'barang' => 'Nama barang yang hilang',
                    'rincian' => 'Rincian Barang',
                ];
                break;
            case 'S-14':
                $cdata = [
                    'usaha' => 'Nama Usaha',
                ];
                break;
            case 'S-16':
                $cdata = [
                    'usaha' => 'Nama Usaha',
                    'alamat' => 'Alamat Tempat Usaha',
                ];
                break;
            case 'S-22':
                $cdata = [
                    'lama_kandungan' => 'Lama Kandungan (bulan)',
                    'alamat' => 'Alamat Tempat Usaha',
                ];
                break;
            case 'S-33':
                $cdata = [
                    'kecamatan' => 'KUA di kecamatan',
                ];
                break;
            
            default:
                $cdata = [];
                break;
        }
        $udata = [
            'no_kk' => 'Nomor Kartu Keluarga',
            'jk' => 'Jenis Kelamin'
        ];
        $data   = array_merge($cdata,$udata);
        $dlabel     = str_replace('_',' ',$label);
        $result = (isset($data[$label])) ? $data[$label] : $dlabel ;
        return $result;
    }
}
if (! function_exists('form_view')) {
    function form_view($key)
    {
        $nomor      = ['no_kk','nik_ibu','nik_ayah','nik_saksi1','nik_saksi2','nik_pelapor','nik_anak','nik_istri','nik','nik_kuasa'];
        $tanggal    = ['tgl_lahir','tanggal_pindah','tanggal_lahir_ibu','tanggal_lahir_ayah','tanggal_lahir_pelapor','tanggal_lahir_saksi1','tanggal_lahir_saksi2','tanggal_mati','tgl_nikah','tanggal_lahir_istri','tanggal_lahir_pasangan','tanggal_lahir','tanggal_lahir_kuasa'];
        $angka      = ['jumlah_pengikut','kelahiran_ke','umur_ibu','umur_ayah','umur_pelapor','umur_saksi1','umur_saksi2','lama_kandungan','umur_kuasa'];
        $pekerjaan  = ['pekerjaan','pekerjaan_ibu','pekerjaan_ayah','pekerjaan_pelapor','pekerjaan_saksi1','pekerjaan_saksi2','pekerjaan_istri','pekerjaan_pasangan','pekerjaan_kuasa'];
        $waktu      = ['waktu_lahir','jam'];
        $jk         = ['jk','jk_pelapor','jk_kuasa'];
        $agama      = ['agama','agama_istri','agama_pasangan','agama_ayah','agama_ibu'];
        $warganegara  = ['warga_negara_pasangan','warga_negara','warga_negara_ayah','warga_negara_ibu'];
        if (in_array($key,$nomor)) {
            $result     = 'nomor';
        }elseif (in_array($key,$tanggal)) {
            $result     = 'tanggal';
        }elseif (in_array($key,$angka)) {
            $result     = 'angka';
        }elseif (in_array($key,$pekerjaan)) {
            $result     = 'pekerjaan';
        }elseif (in_array($key,$waktu)) {
            $result     = 'waktu';
        }elseif (in_array($key,$jk)) {
            $result     = 'jk';
        }elseif (in_array($key,$agama)) {
            $result     = 'agama';
        }elseif (in_array($key,$warganegara)) {
            $result     = 'warganegara';
        } else {
            $result     = 'string';
        }
        return $result;
    }
}
if (! function_exists('surataktif')) {
    function surataktif($kode)
    {
        $result = FALSE;
        $surat  = ['S-01','S-02','S-04','S-11','S-12','S-13','S-14','S-16','S-17','S-18'];
        if (in_array($kode,$surat)) {
            $result = TRUE;
        }
        return $result;
    }
}
if (! function_exists('cekpost')) {
    function cekpost($detail,$label)
    {
        $result = NULL;
        if (isset($detail->$label)) {
            $result   = $detail->$label;
            if ($label == 'tanggal_pindah' || $label == 'tgl_lahir' || $label == 'tanggal_lahir_ibu' || $label == 'tanggal_lahir_pelapor' || $label == 'tanggal_lahir_saksi2' || $label == 'tanggal_lahir_saksi1') {
                $result     = date_indo($result);
            }
        }
        return $result;
    }
}
if (! function_exists('jumlahlikelapor')) {
    function jumlahlikelapor($data)
    {
        if (is_null($data)) {
            $jumlah  = 0;
        } else {
            $data   = json_decode($data);
            $jumlah = count($data);
        }
        return $jumlah;
    }
}
if (! function_exists('ubahdatakey')) {
    function ubahdatakey($key)
    {
        switch ($key) {
            case 'jk':
                $result = 'Jenis Kelamin';
                break;
            case 'tgl_lahir':
                $result = 'Tanggal Lahir';
                break;
            default:
                // jika data sesuai dengan nama
                $cekarray = explode('_',$key);
                if (count($cekarray) == 2) {
                    $result = $cekarray[0].' '.$cekarray[1];
                } else {
                    $result  = $key;
                }
               break;
       }
        return $result;
    }
}
if (! function_exists('historicovid')) {
    function historicovid($data)
    {
        $data       = json_decode($data);
        $result     = NULL;
        foreach ($data as $row) {
            $result .= 'Status : '.$row->status.' </br>';
            $result .= 'Tanggal : '.date_indo($row->tanggal).' </br>';
            if (isset($row->update)) {
                $result .= 'Update : '.date_indo($row->update).'</br>';
            }
            $result .= '<hr>';
        }
        return $result;
    }
}
if (! function_exists('css_statistik')) {
    function css_statistik($data)
    {
        $result = NULL;
        if ($data == '') {
            $result = 'font-weight-bold table-info';
        }
        return $result;
    }
}

if (! function_exists('custom_notif')) {
    function custom_notif($error)
    {
        switch ($error) {
            case 'The email has already been taken.':
                $result = 'Maaf, email sudah digunakan';
                break;
            case 'The no kk has already been taken.':
                $result = 'Maaf, Nomor KK sudah digunakan';
                break;
            
            default:
                $result = $error;
                break;
        }
        return $result;
    }
}
if (! function_exists('filter_data_get')) {
    function filter_data_get($get,$data)
    {
        $result     = FALSE;
        if (is_array($get)) {
            $index_a    = 0;
            $look       = 0; // tanda kebenaran
            foreach ($get as $index => $value) {
                // cek jika field tidak ada
                if (isset($_GET[$index]) AND isset($data[$index_a])) {
                    if ($index == 'tanggal') {
                        $d_tanggal = explode(' ',$data[$index_a]);
                        if ($_GET[$index] == $d_tanggal[0] || (empty($_GET[$index]) || $_GET[$index] == 'semua')) {
                            $look++;
                        }
                    } else {
                        if ($_GET[$index] == $data[$index_a] || $_GET[$index] == 'semua') {
                            $look++;
                        }
                    }
                    
                } else {
                    $look++;
                }
                $index_a++;
            }
            if ($look == count($get)) {
                $result = TRUE;
            }
        } else {
            $result = TRUE;
        }
        return $result;
    }
}

if (! function_exists('nilai_kelengkapan')) {
    function nilai_kelengkapan($data)
    {
        $nilai  = 0;
        if (!is_null($data->status_rekam)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->kk_sebelum)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->hubungan_keluarga)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->no_akta)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->waktu_lahir)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->berat_lahir)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->panjang_lahir)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->nomor_paspor)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->tgl_akhirpaspor)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->nomor_kitas)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->lat_penduduk)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->long_penduduk)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->no_telp)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->email)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->alamat_sebelum)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->no_bukunikah)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->tgl_perkawinan)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->akta_perceraian)) {
            $nilai = $nilai + 1;
        }
        if (!is_null($data->tgl_perceraian)) {
            $nilai = $nilai + 1;
        }
        $jumlah = 19;

        $persen     = $nilai/$jumlah * 100;
        return round($persen);
    }
}
if (! function_exists('get_filter')) {
    function get_filter($data)
    {
        $result = [];
        for ($i=0; $i < count($data); $i++) { 
            $filter = (isset($_GET[$data[$i]])) ? $_GET[$data[$i]] : 'semua' ;
            $result[$data[$i]] = $filter;
        }
        return $result;
    }
}