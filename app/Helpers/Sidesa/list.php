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
            'lainnya'
        ];
        return $list;
    }
}
if (! function_exists('list_statusktp')) {
    function list_statusktp()
    {
        $list = [
            'belum',
            'sudah',
            'proses',
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
            'lainnya'
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
            'kembar 4',
            'lainnya'
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
            'strata III',
            'lainnya'
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
            'tidak sedang sekolah',
            'lainnya'
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
            'lainnya'
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
if (! function_exists('list_statuscovid')) {
    function list_statuscovid()
    {
        $list = [
            'terkonfirmasi',
            'sembuh',
            'meninggal',
            'pemantauan'
        ];
        return $list;
    }
}

if (! function_exists('list_golongandarah')) {
    function list_golongandarah()
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
            'tidak tahu'
        ];
        return $list;
    }
}

if (! function_exists('list_akseptorkb')) {
    function list_akseptorkb()
    {
        $list = [
            'pil',
            'iud',
            'suntik',
            'kondom',
            'susuk kb',
            'sterilisasi wanita',
            'sterilisasi pria',
            'lainnya',
            'tidak'
        ];
        return $list;
    }
}

if (! function_exists('list_cacat')) {
    function list_cacat()
    {
        $list = [
            'cacat fisik',
            'cacat netra/buta',
            'cacat rungu/wicara',
            'cacat mental/jiwa',
            'cacat fisik dan mental',
            'cacat lainnya',
            'tidak',
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
            'lainnya'
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
            'asthma',
            'tidak'
        ];
        return $list;
    }
}

if (! function_exists('list_sasaran')) {
    function list_sasaran()
    {
        $list = [
            'penduduk',
            'keluarga / kk',
        ];
        return $list;
    }
}
if (! function_exists('list_status')) {
    function list_status()
    {
        $list = [
            'aktif',
            'tidak aktif',
        ];
        return $list;
    }
}
if (! function_exists('list_statuspilihan')) {
    function list_statuspilihan()
    {
        $list = [
            'ya',
            'tidak',
        ];
        return $list;
    }
}
if (! function_exists('list_kategoriinformasipublik')) {
    function list_kategoriinformasipublik()
    {
        $list = [
            'informasi berkala',
            'informasi serta-merta',
            'informasi setiap saat',
            'informasi dikecualikan',
        ];
        return $list;
    }
}

// INVENTARIS

if (! function_exists('list_inventaris')) {
    function list_inventaris()
    {
        $list = [
            'tanah' => 'tanah',
            'peralatan-mesin' => 'peralatan dan mesin',
            'gedung-bangunan' => 'gedung dan bangunan',
            'jalan-irigasi-jaringan' => 'jalan, irigasi, dan jaringan',
            'asset-tetap' => 'asset tetap lainnya',
            'kontruksi-pengerjaan' => 'kontruksi dalam pengerjaan'
        ];
        return $list;
    }
}
if (! function_exists('list_namabarang')) {
    function list_namabarang()
    {
        $list = [
            'tanah' => [
                '1.00.00.00.000 - TANAH',
                '1.01.00.00.000 - TANAH DESA',
                '1.01.01.00.000 - TANAH KAS DESA',
                '1.01.01.01.000 - TANAH BENGKOK',
                '1.01.01.01.001 - TANAH BENGKOK KEPALA DESA',
                '1.01.01.01.999 - TANAH BENGKOK LAINNYA',
                '1.01.01.02.000 - TANAH BONDO',
            ],
            'peralatan-mesin' => [
                '2.00.00.00.000 - PERALATAN DAN MESIN',
                '2.01.00.00.000 - ALAT BESAR',
                '2.01.01.00.000 - ALAT BESAR DARAT',
                '2.01.01.01.000 - TRACTOR',
                '2.01.01.01.001 - CRAWLER TRACTOR + ATTACHMENT',
                '2.01.01.01.002 - WHELL TRACTOR + ATTACHMENT',
                '2.01.01.01.003 - SWAMP TRACTOR + ATTACHMENT',
            ],
            'gedung-bangunan' => [
                '3.00.00.00.000 - GEDUNG DAN BANGUNAN',
                '3.01.00.00.000 - BANGUNAN GEDUNG',
                '3.01.01.00.000 - BANGUNAN GEDUNG TEMPAT KERJA',
                '3.01.01.01.000 - BANGUNAN GEDUNG KANTOR',
                '3.01.01.01.001 - BANGUNAN GEDUNG KANTOR PERMANEN',
                '3.01.01.01.002 - BANGUNAN GEDUNG KANTOR SEMI PERMANEN',
                '3.01.01.01.003 - BANGUNAN GEDUNG KANTOR DARURAT',
            ],
            'jalan-irigasi-jaringan' => [
                '4.00.00.00.000 - JALAN',
                '4.01.00.00.000 - JALAN DAN JEMBATAN',
                '4.01.01.00.000 - JALAN',
                '4.01.01.01.000 - JALAN DESA',
                '4.01.01.01.001 - JALAN DESA',
                '4.01.01.01.999 - JALAN DESA LAINNYA',
                '4.01.01.02.000 - JALAN KHUSUS',
            ],
            'asset-tetap' => [
                '5.00.00.00.000 - ASET TETAP LAINNYA',
                '5.01.00.00.000 - BAHAN PERPUSTAKAAN',
                '5.01.01.00.000 - BAHAN PERPUSTAKAAN TERCETAK',
                '5.01.01.01.000 - BUKU',
                '5.01.01.01.001 - MONOGRAF',
                '5.01.01.01.002 - REFERENSI',
                '5.01.01.01.999 - BUKU LAINNYA',
            ],
            'kontruksi-pengerjaan' => NULL
        ];
        return $list;
    }
}

if (! function_exists('list_haktanah')) {
    function list_haktanah()
    {
        $list = [
            'hak pakai',
            'hak pengelolaan'
        ];
        return $list;
    }
}
if (! function_exists('list_penggunaanbarang')) {
    function list_penggunaanbarang()
    {
        $list = [
            'pemerintah desa',
            'badan permusyarawaratan daerah',
            'ppk',
            'lkmd',
            'karang taruna',
            'rw'
        ];
        return $list;
    }
}
if (! function_exists('list_penggunaan')) {
    function list_penggunaan()
    {
        $list = [
            'industri',
            'jalan',
            'komersial',
            'permukiman',
            'tanah publik',
            'tanah kosong',
            'perkebunan',
            'pertanian'
        ];
        return $list;
    }
}

if (! function_exists('list_asalusul')) {
    function list_asalusul()
    {
        $list = [
            'bantuan kabupaten',
            'bantuan pemerintah',
            'bantuan provinsi',
            'pembelian sendiri',
            'sumbangan',
            'hak adat',
            'hibah'
        ];
        return $list;
    }
}
if (! function_exists('list_kondisibangunan')) {
    function list_kondisibangunan()
    {
        $list = [
            'baik',
            'rusak ringan',
            'rusak sedang',
            'rusak berat',
        ];
        return $list;
    }
}
if (! function_exists('list_statustanah')) {
    function list_statustanah()
    {
        $list = [
            'tanah milik pemda',
            'tanah negara (tanah yang dikuasai langsung oleh negara)',
            'tanah hak ulayat (tanah masyarakat hukum adat)',
            'tanah hak (tanah kepunyaan perorangan atau badan hukum)'
        ];
        return $list;
    }
}

if (! function_exists('list_jenisasset')) {
    function list_jenisasset()
    {
        $list = [
            'buku',
            'barang kesenian',
            'hewan ternak',
            'tumbuhan',
        ];
        return $list;
    }
}
if (! function_exists('list_fisikbangunan')) {
    function list_fisikbangunan()
    {
        $list = [
            'darurat',
            'permanen',
            'semi permanen'
        ];
        return $list;
    }
}

// BANTUAN
if (! function_exists('list_sasaranbantuan')) {
    function list_sasaranbantuan()
    {
        $list = [
            'penduduk perorangan',
            'keluarga - kk',
            'rumah tangga',
            'Kelompok / organisasi'
        ];
        return $list;
    }
}
// BANTUAN
if (! function_exists('list_statuskk')) {
    function list_statuskk()
    {
        $list = [
            'aktif',
            'hilang/pindah/mati',
            'kosong',
        ];
        return $list;
    }
}
if (! function_exists('list_asaldana')) {
    function list_asaldana()
    {
        $list = [
            'pusat',
            'provinsi',
            'kab/kota',
            'dana desa',
            'lain - lain (hibah)',
        ];
        return $list;
    }
}

// STATISTIK
if (! function_exists('list_statistikpenduduk')) {
    function list_statistikpenduduk()
    {
        $list = [
            'umur-rentang' => 'Umur (Rentang)',
            'umur-kategori' => 'Umur (Kategori)',
            'pendidikan-dalam-kk' => 'Pendidikan Dalam KK',
            'pendidikan-sedang-ditempuh' => 'Pendidikan Sedang Ditempuh',
            'pekerjaan' => 'pekerjaan',
            'status-perkawinan' => 'Status Perkawinan',
            'agama' => 'Agama',
            'jk' => 'Jenis Kelamin',
            'hubungan-dalam-kk' => 'Hubungan Dalam KK',
            'warga-negara' => 'Warga Negara',
            'status-penduduk' => 'Status Penduduk',
            'goldar' => 'Golongan Darah',
            'penyandang-cacat' => 'Penyandang Cacat',
            'penyakit-menahun' => 'Penyakit Menahun',
            'akseptor-kb' => 'Akseptor KB',
            'akta-kelahiran' => 'Akta Kelahiran',
            'kepemilikan-ktp' => 'Kepemilikan KTP',
            'jenis-asuransi' => 'Jenis Asuransi',
            'status-covid' => 'Status Covid'
        ];
        return $list;
    }
}
if (! function_exists('list_statistikkeluarga')) {
    function list_statistikkeluarga()
    {
        $list = [
            'kelas-sosial' => 'Kelas Sosial',
        ];
        return $list;
    }
}
if (! function_exists('list_umurrentang')) {
    function list_umurrentang()
    {
        $list = [
            ['DI BAWAH 1 TAHUN',0,1],
            ['2 S/D 4 TAHUN',2,4],
            ['5 S/D 9 TAHUN',5,9],
            ['10 S/D 14 TAHUN',10,14],
            ['15 S/D 19 TAHUN',15,19],
            ['20 S/D 24 TAHUN',20,24],
            ['25 S/D 29 TAHUN',25,29],
            ['30 S/D 34 TAHUN',30,34],
            ['35 S/D 39 TAHUN',35,39],
            ['40 S/D 44 TAHUN',40,44],
            ['45 S/D 49 TAHUN',45,49],
            ['50 S/D 54 TAHUN',50,54],
            ['55 S/D 59 TAHUN',55,59],
            ['60 S/D 64 TAHUN',60,64],
            ['65 S/D 69 TAHUN',64,69],
            ['70 S/D 74 TAHUN',70,74],
            ['DIATAS 75 TAHUN',75,200],
        ];
        return $list;
    }
}

if (! function_exists('list_statuscovid')) {
    function list_statuscovid()
    {
        $list = [
            'ODP',
            'PDP',
            'ODR',
            'OTG',
            'POSITIF',
            'DLL'
        ];
        return $list;
    }
}
if (! function_exists('list_statuspegawai')) {
    function list_statuspegawai()
    {
        $list = [
            '1',
            '2',
        ];
        return $list;
    }
}