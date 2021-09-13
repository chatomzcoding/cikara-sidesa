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
                      
                      {{ DbCikara::countData('lapor',['user_id',Auth::user()->id])}}
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
                    5
                    {{-- <span class="info-box-number">{{ DbCikara::countData('penduduk')}}</span> --}}
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
                    12
                    {{-- <span class="info-box-number">{{ DbCikara::countData('keluarga')}}</span> --}}
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-people-carry"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Bantuan</span>
                    5
                    {{-- <span class="info-box-number">{{ DbCikara::countData('bantuan')}}</span> --}}
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
          text: 'Penduduk Online per - hari'
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
      Highcharts.chart('lapor', {
        title: {
          text: 'Laporan Penduduk per - hari'
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
          name: 'laporan',
          data: [2, 5, 0, 3, 3, 7, 10, 23]
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
      Highcharts.chart('surat', {
        title: {
          text: 'Permintaan Pembuatan Surat per - hari'
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
          name: 'Surat',
          data: [5, 6, 8, 3, 3, 5, 10, 8]
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

        Highcharts.chart('klasifikasi', {
          chart: {
            type: 'column'
          },
          title: {
            text: 'Klasifikasi Laporan Penduduk'
          },
          xAxis: {
            categories: ['Laporan Selesai', 'Laporan diProses', 'Laporan Menunggu']
          },
          credits: {
            enabled: false
          },
          series: [{
            name: 'Laporan',
            color : ['green','orange','grey'],
            data: [
              {
                y : 120,
                color : 'green'
              },
              {
                y : 140,
                color : 'orange'
              }
              ,
              {
                y : 10,
                color : 'grey'
              }
              ]
          }]
        });

        Highcharts.chart('covid', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Statistik Data Covid 19'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Terkonfirmasi',
                y: 12,
                sliced: true,
                selected: true
            }, {
                name: 'Meninggal',
                y: 1
            }, {
                name: 'Sembuh',
                y: 8
            }, {
                name: 'Dalam Pemantauan',
                y: 27
            }]
        }]
    });
    </script>
    @endsection
   

