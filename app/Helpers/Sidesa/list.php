<?php

if (! function_exists('list_statusrekam')) {
    function list_statusrekam()
    {
        $list = [
            'belum wajib',
            'belum rekam',
            'sudah rekam',
            'card printed',
            'print ready record',
            'card shipped',
            'sent for card printing',
            'card issued'
        ];
        return $list;
    }
}

if (! function_exists('list_hubungankeluarga')) {
    function list_hubungankeluarga()
    {
        $list = [
            'kepala keluarga',
            'suami',
            'istri',
            'anak',
            'menantu',
            'cucu',
            'orangtua',
            'mertua',
            'famili',
            'pembantu',
            'lainnya'
        ];
        return $list;
    }
}

if (! function_exists('list_agama')) {
    function list_agama()
    {
        $list = [
            'islam',
            'kristen',
            'katholik',
            'hindu',
            'budha',
            'khonghucu',
            'kepercayaan terhadap tuhan yme / lainnya'
        ];
        return $list;
    }
}
if (! function_exists('list_jeniskelamin')) {
    function list_jeniskelamin()
    {
        $list = [
            'laki-laki',
            'perempuan'
        ];
        return $list;
    }
}
if (! function_exists('list_statuspenduduk')) {
    function list_statuspenduduk()
    {
        $list = [
            'tetap',
            'tidak tetap',
            'pendatang'
        ];
        return $list;
    }
}

if (! function_exists('list_tempatdilahirkan')) {
    function list_tempatdilahirkan()
    {
        $list = [
            'rs/rb',
            'puskesmas',
            'polindes',
            'rumah',
            'lainnya'
        ];
        return $list;
    }
}

if (! function_exists('list_jeniskelahiran')) {
    function list_jeniskelahiran()
    {
        $list = [
            'tunggal',
            'kembar 2',
            'kembar 3',
            'kembar 4'
        ];
        return $list;
    }
}

if (! function_exists('list_penolongkelahiran')) {
    function list_penolongkelahiran()
    {
        $list = [
            'dokter',
            'bidan perawat',
            'dukun',
            'lainnya'
        ];
        return $list;
    }
}

if (! function_exists('list_pendidikandalamkk')) {
    function list_pendidikandalamkk()
    {
        $list = [
            'tidak/belum sekolah',
            'belum tamat sd/sederajat',
            'tamat sd/sederajat',
            'sltp/sederajat',
            'slta/sederajat',
            'diploma I/II',
            'akademi/diploma III/s. muda',
            'diploma IV/strata I',
            'strata II',
            'strata III'
        ];
        return $list;
    }
}
if (! function_exists('list_pendidikantempuh')) {
    function list_pendidikantempuh()
    {
        $list = [
            'belum masuk tk/kelompok bermain',
            'sedang tk/kelompok bermain',
            'tidak pernah sekolah',
            'sedang sd/sederajat',
            'tidak tamat sd/sederajat',
            'sedang sltp/sederajat',
            'sedang slta/sederajat',
            'sedang d-1/sederajat',
            'sedang d-2/sederajat',
            'sedang d-3/sederajat',
            'sedang s-1/sederajat',
            'sedang s-2/sederajat',
            'sedang s-3/sederajat',
            'sedang slb a/sederajat',
            'sedang slb b/sederajat',
            'sedang slb c/sederajat',
            'tidak dapat membaca dan menulis huruf latin/arab',
            'tidak sedang sekolah'
        ];
        return $list;
    }
}

if (! function_exists('list_pekerjaan')) {
    function list_pekerjaan()
    {
        $list = [
            'belum/tidak bekerja',
            'mengurus rumah tangga',
            'pelajar/mahasiswa',
            'pensiunan',
            'pegawai negeri sipil (pns)',
            'tentara nasional indonesia (tni)',
            'kepolisian ri (polri)',
            'perdagangan',
            'petani/pekebun',
            'peternak',
            'nelayan/perikanan',
            'industri',
            'kontruksi',
            'tranportasi',
            'karyawan swasta',
            'karyawan bumn',
            'karyawan bumd',
            'karyawan honorer',
            'buruh harian lepas',
            'buruh tani/perkebunan',
            'buruh nelayan/perikanan',
            'buruh peternakan',
            'pembantu rumah tangga',
            'tukang cukur',
            'tukang listrik',
            'tukang batu',
            'tukang kayu',
            'tukang sol sepatu',
            'tukang las/pandai besi',
            'tukang jahit',
            'tukang gigi',
            'penata rias',
            'penata busana',
            'penata rambut',
            'mekanik',
            'seniman',
            'tabib',
            'paraji',
            'perancang busana',
            'peterjemah',
            'imam masjid',
            'pendeta',
            'pastor',
            'wartawan',
            'ustadz/mubaligh',
            'juru masak',
            'promotor acara',
            'anggota dpr-ri',
            'anggota dpd',
            'anggota bpk',
            'presiden',
            'wakil presiden',
            'anggota mahkamah konstitusi',
            'anggota kabinet kementerian',
            'duta besar',
            'gubernur',
            'wakil gubernur',
            'bupati',
            'wakil bupati',
            'walikota',
            'wakil walikota',
            'anggota dprd provinsi',
            'anggota dprd kabupaten/kota',
            'dosen',
            'guru',
            'pilot',
            'pengacara',
            'notaris',
            'arsitek',
            'akuntan',
            'konsulyan',
            'dokter',
            'bidan',
            'perawat',
            'apoteker',
            'psikiater/psikolog',
            'penyiar televisi',
            'penyiar radio',
            'pelaut',
            'peneliti',
            'sopir',
            'pialang',
            'paranormal',
            'pedagang',
            'perangkat desa',
            'kepala desa',
            'biarawati',
            'wiraswasta',
            'lainya'
        ];
        return $list;
    }
}

if (! function_exists('list_statuskewarganegaraan')) {
    function list_statuskewarganegaraan()
    {
        $list = [
            'wni',
            'wna',
            'dua kewarganegaraan'
        ];
        return $list;
    }
}

if (! function_exists('list_statusperkawinan')) {
    function list_statusperkawinan()
    {
        $list = [
            'belum kawin',
            'kawin',
            'cerai hidup',
            'cerai mati'
        ];
        return $list;
    }
}

if (! function_exists('liat_golongandarah')) {
    function liat_golongandarah()
    {
        $list = [
            'A',
            'B',
            'AB',
            'O',
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
            'TIDAK TAHU'
        ];
        return $list;
    }
}

if (! function_exists('list_akseptorkb')) {
    function list_akseptorkb()
    {
        $list = [
            'PIL',
            'IUD',
            'SUNTIK',
            'KONDOM',
            'SUSUK KB',
            'STERILISASI WANITA',
            'STERILISASI PRIA',
            'LAINNYA'
        ];
        return $list;
    }
}

if (! function_exists('list_cacat')) {
    function list_cacat()
    {
        $list = [
            'CACAT FISIK',
            'CACAT NETRA/BUTA',
            'CACAT RUNGU/WICARA',
            'CACAT MENTAL/JIWA',
            'CACAT FISIK DAN MENTAL',
            'CACAT LAINNYA',
            'TIDAK CACAT'
        ];
        return $list;
    }
}

if (! function_exists('list_asuransi')) {
    function list_asuransi()
    {
        $list = [
            'tidak/belum punya',
            'bpjs penerima bantuan iuran',
            'bpjs non penerima bantuan iuran',
            'asuransi lainnya'
        ];
        return $list;
    }
}

if (! function_exists('list_sakitmenahun')) {
    function list_sakitmenahun()
    {
        $list = [
            'jantung',
            'lever',
            'paru-paru',
            'kanker',
            'stroke',
            'diabetes melitus',
            'ginjal',
            'malaria',
            'lepra/kusta',
            'hiv/aids',
            'gila/stres',
            'tbc',
            'asthma'
        ];
        return $list;
    }
}