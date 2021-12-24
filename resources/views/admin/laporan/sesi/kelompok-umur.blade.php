@extends('layouts.mini')

@section('title')
    Perkembangan Penduduk
@endsection

@section('container')
    
    <header class="text-center">
        <h5>
            LAPORAN PENDUDUK BERDASARKAN KELOMPOK UMUR <br>
            PEMERINTAH DAERAH KABUPATEN TASIKMALAYA <br>
            KECAMATAN PAGERAGEUNG <br>
            DESA PUTERAN <br>
            BULAN DESEMBER 2021
        </h5>
    </header>
    <main class="mt-3">
        <div class="table-responsive">
            <table border="1" width="100%">
                <tr class="text-center small">
                    <th rowspan="2">NO</th>
                    <th rowspan="2">NAMA DUSUN</th>
                    @foreach (list_kelompokumur() as $item)
                    <th colspan="2">{{ $item }} TH</th>
                    @endforeach
                    <th colspan="2">JUMLAH</th>
                    <th rowspan="2">TOTAL</th>
                </tr>
                <tr class="text-center small">
                    @foreach (list_kelompokumur() as $item)
                        <th>LK</th>
                        <th>PR</th>
                    @endforeach
                    <th>LK</th>
                    <th>PR</th>
                </tr>
                <tr class="table-secondary text-center small">
                    @for ($i = 1; $i < 34; $i++)
                        <th>{{ $i }}</th>
                    @endfor
                </tr>
                <tr class="text-right">
                    <th colspan="2">JUMLAH</th>
                    @foreach (list_kelompokumur() as $item)
                        <th>-</th>
                        <th>-</th>
                    @endforeach
                    <th></th>
                    <th></th>
                    <th></th>
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