<?php

if (! function_exists('list_statusrekam')) {
    function list_statusrekam()
    {
        $list = [
            'lainnya',
            'belum wajib',
            'belum rekam',
            'sudah rekam',
            'card printed',
            'print ready record',
            'card shipped',
            'sent for card printing',
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
            'lainnya',
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
        ];
        return $list;
    }
}

if (! function_exists('list_agama')) {
    function list_agama()
    {
        $list = [
            'lainnya',
            'islam',
            'kristen',
            'katholik',
            'hindu',
            'budha',
            'khonghucu',
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
            'lainnya',
            'rs/rb',
            'puskesmas',
            'polindes',
            'rumah',
        ];
        return $list;
    }
}

if (! function_exists('list_jeniskelahiran')) {
    function list_jeniskelahiran()
    {
        $list = [
            'lainnya',
            'tunggal',
            'kembar 2',
            'kembar 3',
            'kembar 4',
        ];
        return $list;
    }
}

if (! function_exists('list_penolongkelahiran')) {
    function list_penolongkelahiran()
    {
        $list = [
            'lainnya',
            'dokter',
            'bidan perawat',
            'dukun',
        ];
        return $list;
    }
}

if (! function_exists('list_pendidikandalamkk')) {
    function list_pendidikandalamkk()
    {
        $list = [
            'lainnya',
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
        ];
        return $list;
    }
}
if (! function_exists('list_pendidikantempuh')) {
    function list_pendidikantempuh()
    {
        $list = [
            'lainnya',
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
            'tidak tahu',
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
        ];
        return $list;
    }
}

if (! function_exists('list_akseptorkb')) {
    function list_akseptorkb()
    {
        $list = [
            'tidak',
            'pil',
            'iud',
            'suntik',
            'kondom',
            'susuk kb',
            'sterilisasi wanita',
            'sterilisasi pria',
            'lainnya',
        ];
        return $list;
    }
}

if (! function_exists('list_cacat')) {
    function list_cacat()
    {
        $list = [
            'tidak',
            'cacat fisik',
            'cacat netra/buta',
            'cacat rungu/wicara',
            'cacat mental/jiwa',
            'cacat fisik dan mental',
            'cacat lainnya',
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
            'lainnya',
        ];
        return $list;
    }
}

if (! function_exists('list_sakitmenahun')) {
    function list_sakitmenahun()
    {
        $list = [
            'tidak',
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
// KATEGORI SURAT
if (! function_exists('list_kategorisurat')) {
    function list_kategorisurat()
    {
        $list = [
            'surat keterangan',
            'surat pengantar',
            'surat rekomendasi',
            'surat lainnya'
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
            // 'umur-rentang' => 'Umur (Rentang)',
            // 'umur-kategori' => 'Umur (Kategori)',
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
            // 'status-covid' => 'Status Covid'
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
if (! function_exists('list_statuslaporan')) {
    function list_statuslaporan()
    {
        $list = [
            'menunggu',
            'proses',
            'selesai',
        ];
        return $list;
    }
}
if (! function_exists('list_kelompokumur')) {
    function list_kelompokumur()
    {
        $list = [
            '0-4',
            '5-12',
            '13-15',
            '16-19',
            '20-24',
            '25-29',
            '30-34',
            '35-39',
            '40-44',
            '45-49',
            '50-54',
            '55-59',
            '60-64',
            '65',
        ];
        return $list;
    }
}
if (! function_exists('list_laporanpenduduk')) {
    function list_laporanpenduduk()
    {
        $list = [
                'perkembangan-penduduk' => 'Laporan Perkembangan Data Kependudukan',
                'kelompok-umur' => 'Laporan Penduduk berdasarkan kelompok umur',
                'kondisi-penduduk' => 'Laporan Kondisi Penduduk enurut Pendidikan, mata pencaharian, agama',
        ];
        return $list;
    }
}
if (! function_exists('list_kondisipenduduk')) {
    function list_kondisipenduduk($sesi)
    {
       switch ($sesi) {
           case 'pendidikan':
               $list = [
                [
                    'nama' => 'TK',
                    'kode' => ''
                ],
                [
                    'nama' => 'SD',
                    'kode' => ''
                ],
                [
                    'nama' => 'SMP',
                    'kode' => ''
                ],
                [
                    'nama' => 'SMA',
                    'kode' => ''
                ],
                [
                    'nama' => 'D1',
                    'kode' => ''
                ],
                [
                    'nama' => 'D2',
                    'kode' => ''
                ],
                [
                    'nama' => 'D3',
                    'kode' => ''
                ],
                [
                    'nama' => 'D4/S1',
                    'kode' => ''
                ],
                [
                    'nama' => 'S2',
                    'kode' => ''
                ],
                [
                    'nama' => 'S3',
                    'kode' => ''
                ]
               ];
               break;
           case 'pekerjaan':
               $list = [
                [
                    'nama' => 'PNS',
                    'kode' => ''
                ],
                [
                    'nama' => 'TNI / POLRI',
                    'kode' => ''
                ],
                [
                    'nama' => 'PETANI',
                    'kode' => ''
                ],
                [
                    'nama' => 'BURUH TANI',
                    'kode' => ''
                ],
                [
                    'nama' => 'PEG. SWASTA',
                    'kode' => ''
                ],
                [
                    'nama' => 'PEDAGANG',
                    'kode' => ''
                ],
                [
                    'nama' => 'PENGRAJIN',
                    'kode' => ''
                ],
                [
                    'nama' => 'PETERNAK',
                    'kode' => ''
                ],
                [
                    'nama' => 'NELAYAN',
                    'kode' => ''
                ],
                [
                    'nama' => 'LAIN-LAIN',
                    'kode' => ''
                ],
               ];
               break;

           default:
               $list = [];
               break;
       }
        return $list;
    }
}

if (! function_exists('list_datainput')) {
    function list_datainput()
    {
        $list = [
            'agama',
            'akseptor kb',
            'asuransi',
            'cacat',
            'golongan darah',
            'hubungan keluarga',
            'jenis kelahiran',
            'pekerjaan',
            'pendidikan dalam kk',
            'pendidikan tempuh',
            'penolong kelahiran',
            'sakit menahun',
            'status covid',
            'status kk',
            'status rekam',
        ];
        return $list;
    }
}

if (! function_exists('list_menu')) {
    function list_menu()
    {
        $list = [
            [
                'Siaga Covid-19',
                [
                    'covid' => 'Info Covid',
                    'vaksinasi' => 'Vaksinasi',
                    'datacovid' => 'Data Pemudik',
                ]
            ],
            [
                'Info Desa',
                [

                    'profil' => 'Identitas Desa',
                    'wilayah' => 'Wilayah Administratif',
                    'pemerintahdesa' => 'Pemerintahan Desa',
                    'potensi' => 'Potensi Desa',
                    'tentang' => 'Tentang Desa',
                ]
                ],
            [
                'Kependudukan',
                [
                    'penduduk' => 'Penduduk',
                    'keluarga' => 'Keluarga',
                    'rumahtangga' => 'Rumah Tangga',
                    'kelompok' => 'Kelompok',
                    'pemilih' => 'Calon Pemilih',
                ]
            ],
            [
                'Statistik',
                [
                    'statistikpenduduk' => 'Statistik Penduduk',
                ]
            ],
            [
                'Sekretariat',
                [
                    'informasipublik' => 'Informasi Publik',
                    'inventaris' => 'Inventaris',
                    'klasifikasisurat' => 'Klasifikasi Surat',
                ]
            ],
            [
                'Layanan Surat',
                [
                    'formatsurat' => 'Pengaturan Surat',
                    'syaratsurat' => 'Daftar Persyaratan',
                ]                
            ],
            [
                'Bantuan',
                [
                    'bantuan' => 'Bantuan',
                ]
            ],
            [
                'Layanan Mandiri',
                [
                    'laporpenduduk' => 'Laporan Penduduk',
                    'lapakdesa' => 'Lapak Desa',
                    'forumpenduduk' => 'Forum Penduduk',
                    'suratpenduduk' => 'Surat Penduduk',
                ]
            ],
            [
                'Admin Web',
                [
                    'datapokok' => 'Data Pokok',
                    'datauser' => 'Data User',
                    'artikel' => 'Artikel',
                    'galeri' => 'Galeri',
                    'slider' => 'Slider',
                    'berjalan' => 'Teks Berjalan',
                    'listdata' => 'Data List'
                ]
            ]
        ];
        return $list;
    }
}