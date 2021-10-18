@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('header')
  <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
  
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-signature"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Laporan Dibuat</span>
                    <span class="info-box-number">
                      {{ $total['laporan'] }}
                      {{-- {{ DbCikara::countData('lapor',['user_id',Auth::user()->id])}} --}}
                      {{-- <small>%</small> --}}
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope-open-text"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Surat Dibuat</span>
                    <span class="info-box-number">
                      {{ $total['surat'] }}
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
    
              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>
    
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dice-d6"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Produk</span>
                    <span class="info-box-number">
                      {{ $total['produk'] }}
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tag"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Forum</span>
                    <span class="info-box-number">{{ $total['forum']}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            @include('chart')
          </div>
        </section>
    @endsection

    
    @section('script')
    <script>
      Highcharts.chart('visitors', {
        title: {
          text: 'Kunjungan Website per - hari'
        },

        subtitle: {
          text: 'Source: thesolarfoundation.com'
        },

        yAxis: {
          title: {
            text: 'Number of Employees'
          }
        },

        xAxis: {
          accessibility: {
            rangeDescription: 'Range: 2010 to 2017'
          }
        },

        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
        },

        plotOptions: {
          series: {
            label: {
              connectorAllowed: false
            },
            pointStart: 1
          }
        },

        series: [{
          name: 'Kunjungan',
          data: [{{ DbCikara::chartDashboard('kunjungan') }}]
        }],

        responsive: {
          rules: [{
            condition: {
              maxWidth: 500
            },
            chartOptions: {
              legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
              }
            }
          }]
        }

        });
    </script>
    @endsection
   

