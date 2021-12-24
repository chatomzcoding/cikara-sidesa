@extends('layouts.mini')

@section('title')
    Perkembangan Penduduk
@endsection

@section('container')
    
    <header class="text-center">
        <h5>
            LAPORAN KONDISI PENDUDUK MENURUT PENDIDIKAN, MATA PENCAHARIAN, AGAMA <br>
            PEMERINTAH DAERAH KABUPATEN TASIKMALAYA <br>
            KECAMATAN PAGERAGEUNG <br>
            DESA PUTERAN <br>
            BULAN DESEMBER 2021
        </h5>
    </header>
    <main class="mt-3">
        <div class="table-responsiv small">
            <table border="1" width="100%">
                <tr class="text-center">
                    <th rowspan="3">{!! teksvertikal('NO URUT') !!}</th>
                    <th rowspan="3">NAMA DUSUN</th>
                    <th colspan="27">KONDISI PENDUDUK BEDASARKAN</th>
                    <th colspan="3" rowspan="2">KEWARGANEGARAAN</th>
                </tr>
                <tr class="text-center">
                    <th colspan="10">MENURUT JENJANG PENDIDIKAN</th>
                    <th colspan="10">MENURUT MATA PENCAHARIAN</th>
                    <th colspan="7">MENURUT MENURUT AGAMA</th>
                </tr>
                <tr class="text-center">
                    @foreach (list_kondisipenduduk('pendidikan') as $item)
                        <th>{!! teksvertikal($item['nama']) !!}</th>
                    @endforeach
                    @foreach (list_kondisipenduduk('pekerjaan') as $item)
                        <th>{!! teksvertikal($item['nama']) !!}</th>
                    @endforeach
                    @foreach (list_agama() as $item)
                        <th class="text-capitalize">{!! teksvertikal($item) !!}</th>
                    @endforeach
                    <th>{!! teksvertikal('WNA') !!}</th>
                    <th>{!! teksvertikal('WNI') !!}</th>
                    <th>{!! teksvertikal('JUMLAH') !!}</th>
                </tr>
                <tr class="table-secondary text-center small">
                    @for ($i = 1; $i < 33; $i++)
                        <th>{{ $i }}</th>
                    @endfor
                </tr>
                <tr>
                    <th colspan="2">JUMLAH</th>
                    @for ($i = 1; $i < 31; $i++)
                        <th>-</th>
                    @endfor
                </tr>
            </table>
        </div>
        <div class="container mt-3">
            <div class="row">

                <div class="col-md-4">
                    <section class="text-center">
                        MENGETAHUI : <br>
                        KEPALA DESA PUTERAN <br><br><br><br>
                        <strong><u>DAHLAN KUSNANDI</u></strong> 
                    </section>
                </div>
                <div class="col-md-4">
    
                </div>
                <div class="col-md-4">
                    <section class="text-center">
                        PUTERAN, {{ date_indo() }} <br>
                        KASI PEMERINTAHAN <br> <br><br><br>
                        <strong><u>APIT SAEPUL MILLAH</u></strong>
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection