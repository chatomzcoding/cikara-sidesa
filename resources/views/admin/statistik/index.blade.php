@extends('layouts.admin')
@section('title')
    Statistik Kependudukan - {{ list_statistikpenduduk()[$pilih] }}
@endsection

@section('header')
  <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Statistik Kependudukan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
          <li class="breadcrumb-item active">Stattistik Kependudukan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Statistik Penduduk
                              </button>
                            </h2>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="list-group">
                                    @foreach (list_statistikpenduduk() as $link => $nama)
                                        <a href="{{ url('/statistik/kependudukan/penduduk/'.$link)}}" class="list-group-item list-group-item-action @if ($link == $sesi)
                                            bg-primary
                                        @endif"> {{ $nama }}</a>
                                    @endforeach
                                  </div>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Statistik Keluarga
                              </button>
                            </h2>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="list-group">
                                    @foreach (list_statistikkeluarga() as $link => $nama)
                                        <a href="{{ url('/statistik/kependudukan/keluarga/'.$link)}}" class="list-group-item list-group-item-action">{{ $nama }}</a>
                                    @endforeach
                                  </div>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Statistik Program Bantuan
                              </button>
                            </h2>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                              <div class="list-group">
                                @foreach ($bantuan as $item)
                                    <a href="{{ url('/statistik/kependudukan/bantuan/'.$item->id)}}" class="list-group-item list-group-item-action">{{ $item->nama_program }}</a>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
          </div>
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                    <a href="#" class="btn btn-outline-info btn-flat btn-sm float-right"><i class="fas fa-print"></i> CETAK</a>
                    {{-- <a href="#" class="btn btn-outline-secondary btn-flat btn-sm"><i class="fas fa-sync"></i> Bersihkan Filter</a> --}}
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      {{-- <section class="mb-3">
                        <form action="" method="post">
                          <div class="row">
                              <div class="form-group col-md-2">
                                  <select name="" id="" class="form-control form-control-sm">
                                      <option value="">-- Dusun --</option>
                                      @foreach ($dusun as $item)
                                          <option value="{{ $item->id}}">{{ $item->nama_dusun}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </form>
                    </section> --}}
                <section>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Grafik</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Jenis Kelompok</th>
                                    <th>Jumlah</th>
                                    <th>Laki - laki</th>
                                    <th>Perempuan</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                              @switch($sesi)
                                  @case('penduduk')
                                    {{-- @include('admin.statistik.penduduk.'.$pilih) --}}
                                    @include('admin.statistik.penduduk.agama')
                                    @break
                                  @case('bantuan')
                                    @include('admin.statistik.bantuan.index')
                                      @break
                                  @default
                                      
                              @endswitch
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      {{-- grafik --}}
                      <figure class="highcharts-figure">
                        <div id="batang"></div>
                        <p class="highcharts-description">
                            Data agama dalam bentuk diagram batang
                        </p>
                    </figure>
                      <figure class="highcharts-figure">
                        <div id="pie"></div>
                        <p class="highcharts-description">
                            Data agama dalam bentuk diagram lingkaran
                        </p>
                    </figure>
                    </div>
                  </div>
                  
                </section>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/informasipublik')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Informasi Publik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Judul Dokumen</label>
                        <input type="text" name="judul_dokumen" id="judul_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Dokumen</label>
                        <input type="file" name="file_dokumen" id="file_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Kategori Informasi Publik</label>
                        <select name="kategori_informasi" id="kategori_informasi" class="form-control col-md-8" required>
                            <option value="">-- Pilih Kategori Informasi Publik</option>
                            @foreach (list_kategoriinformasipublik() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Tahun</label>
                        <input type="year" name="tahun" id="tahun" maxlength="4" class="form-control col-md-8" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <!-- /.modal -->

    {{-- modal edit --}}
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('informasipublik.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Informasi Publik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Judul Dokumen</label>
                        <input type="text" name="judul_dokumen" id="judul_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Dokumen (abaikan jika tidak ingin mengubah)</label>
                        <input type="file" name="file_dokumen" id="file_dokumen" class="form-control col-md-8">
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Kategori Informasi Publik</label>
                        <select name="kategori_informasi" id="kategori_informasi" class="form-control col-md-8" required>
                            <option value="">-- Pilih Kategori Informasi Publik</option>
                            @foreach (list_kategoriinformasipublik() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Status Informasi Publik</label>
                        <select name="status" id="status" class="form-control col-md-8" required>
                            <option value="">-- Pilih Status --</option>
                            @foreach (list_status() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Tahun</label>
                        <input type="year" name="tahun" id="tahun" maxlength="4" class="form-control col-md-8" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <!-- /.modal -->

    @section('script')
        <script>
          Highcharts.chart('batang', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Data Penduduk berdasarkan Agama'
            },
            xAxis: {
                categories: ['Islam', 'kristen', 'khatolik', 'Hindu', 'Budha','Khonghucu',' Lainnya']
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah Penganut',
                data: [20, 2, 1, 0, 0,2,3]
            }]
        });
        // pie
        Highcharts.chart('pie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Data Penduduk Berdasarkan Agama'
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
                name: 'Islam',
                y: 20,
                sliced: true,
                selected: true
            }, {
                name: 'Kristen',
                y: 2
            }, {
                name: 'Khatolik',
                y: 1
            }, {
                name: 'Hindu',
                y: 0
            }, {
                name: 'Budha',
                y: 0
            }, {
                name: 'khonghucu',
                y: 2
            }, {
                name: 'lainnya',
                y: 3
            }]

        }]
    });
        </script>
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_dokumen = button.data('nama_dokumen')
                var judul_dokumen = button.data('judul_dokumen')
                var kategori_informasi = button.data('kategori_informasi')
                var tahun = button.data('tahun')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_dokumen').val(nama_dokumen);
                modal.find('.modal-body #judul_dokumen').val(judul_dokumen);
                modal.find('.modal-body #kategori_informasi').val(kategori_informasi);
                modal.find('.modal-body #tahun').val(tahun);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel"],
                "paging": false,
                "ordering": false,
                "searching": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            });
        </script>
    @endsection

    @endsection

