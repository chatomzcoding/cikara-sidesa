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
            'asthma',
            'tidak ada/tidak sakit'
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
            'penduduk Perorangan',
            'keluarga - kk',
            'Rumah Tangga',
            'Kelompok / Organisasi'
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

// fungsi untuk data dummy
if (! function_exists('data_lapor')) {
    function data_lapor()
    {
        $list = [
            [1,'agung lesmana','izin pak ada penduduk yang buang sampah sembarangan di daerah batas desa, mohon ditindaklanjuti','kebersihan','proses','warning'],
            [2,'firman setiawan','ada hewan yang hilang dari kandang sapi, di dusun 1 rw 3 rt 2 kemungkinan ada maling','keamanan','selesai','success'],
            [3,'siti maryam','salah satu warga ada yang sakit parah, perlu bantuan medis di dusun 2 rt 3 rw 1','kesehatan','menunggu','secondary'],
            [4,'budi ardiansyah','bagaimana solusi untuk pemberantasan hama di persawahan, tolong segera carikan solusinya secepatnya','pertanian','selesai','success']
        ];
        return $list;
    }
}
if (! function_exists('data_lapak')) {
    function data_lapak()
    {
        $list = [
            [1,'toko jaya','lilis nurhasanah','menjual berbagai macam bahan bangunan',5,2,'aktif','success'],
            [2,'agung cell','puspa nurjanah','jual vocher listrik dan pulsa',12,5,'aktif','danger'],
            [3,'bunda asih','agum gurnida','menyediakan alat alat bayi dan anak',120,40,'aktif','success'],
            [4,'ikan pancing','dewi aniarsah','jual beli alat pancing ikan',7,3,'aktif','success']
        ];
        return $list;
    }
}
if (! function_exists('data_produk')) {
    function data_produk()
    {
        $list = [
            [1,'kail.jpg','kail pancing','berbagai jenis kail tersedia',3000,'tersedia'],
            [2,'pancing.jpg','alat pancing','pancing terbaru',120000,'tersedia'],
            [3,'pakan.jpg','pakan ikan','pancing terbaru',5000,'tersedia'],
        ];
        return $list;
    }
}
if (! function_exists('data_forum')) {
    function data_forum()
    {
        $list = [
            [1,'diskusi sampah desa','berdiskusi untuk penanggulangan sampah di desa',30,'aktif','success'],
            [2,'PSBB diperpanjang','berdiskusi masalah PSBB',52,'aktif','success'],
            [3,'kebijakan baru pemdes 2021','membahas isi dari pemdes 2021',20,'non-aktif','danger'],
            [4,'Bantuan langsung Tunai','membahas terkait program BLT',16,'aktif','success']
        ];
        return $list;
    }
}
if (! function_exists('data_covid')) {
    function data_covid()
    {
        $list = [
            [1,'andri anjasmara','kp jeungjing rt 3 rw 4 ','terkonfirmasi','warning'],
            [2,'nunung','kp dayeuh manggung rt 1 rw 1','sembuh','success'],
            [3,'didi junaedi','kp batununggul','terkonfirmasi','warning'],
            [4,'teti agustini','kp dayeuh manggung','meninggal','danger'],
        ];
        return $list;
    }
}
if (! function_exists('data_surat')) {
    function data_surat()
    {
        $list = [
            [1,'didi junaedi','12 Agustus 2021 09:10','Surat Keterangan Usaha','tolong dibuatkan surat usaha untuk saya','selesai','success'],
            [2,'widi widiastuti','12 Agutustus 2021 07:34','Surat Keterangan Tidak Mampu','nanti diambil besok pak','proses','warning'],
            [3,'lilis lestari','09 Agustus 2021 14:00','Surat Keterangan Domisili','saya mau buat rekening baru','selesai','success'],
            [4,'agung permana','09 Agustus 2021 08:12','Surat Keterangan Usaha','-','selesai','success']
        ];
        return $list;
    }
}
if (! function_exists('data_penduduk')) {
    function data_penduduk()
    {
        $list = [
            [1,'3203847364534001','wini purwanti',1,'002','001','ibu rumah tangga','aktif','success'],
            [2,'3203847364534021','lisa barliana',1,'003','001','pewagai','aktif','success'],
            [3,'3203847364534066','ayu purwanti',2,'002','002','pedagang','aktif','success'],
            [4,'32038473dd534002','didi junaedi',2,'002','002','guru','aktif','success']
        ];
        return $list;
    }
}
if (! function_exists('data_kk')) {
    function data_kk()
    {
        $list = [
            [1,'3203847364534001','asep saefulloh',2,2,'002','001'],
            [2,'3203847364534021','didin wahyudin',1,1,'003','001'],
            [3,'3203847364534066','firman setiawan',0,1,'002','002'],
            [4,'32038473dd534002','didi junaedi',4,3,'002','002']
        ];
        return $list;
    }
}
if (! function_exists('data_barang')) {
    function data_barang()
    {
        $list = [
            [1,'produk.jpg','Pisang Sale',20000,'makanan yang terbuat dari pisang yang dikeringkan'],
            [2,'produk2.jpg','Rumpi Rebon',10000,'makanan rebon khas tasimalaya'],
            [3,'produk3.jpg','Emping Nori',5000,'makanan nori yang dibuat kedalam emping'],
            [4,'produk4.jpg','Sambal Bawang Kika',25000,'sambal bawang enak menggunakan bahan alami'],
        ];
        return $list;
    }
}