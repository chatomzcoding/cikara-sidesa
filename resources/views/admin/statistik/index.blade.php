<x-adminlte-layout title="Statistik Kependudukan - {{ list_statistikpenduduk()[$pilih] }}" menu="statistikpenduduk">
  <x-slot name="header">
    <x-header judul="statistik kependudukan" active="Statistik Kependudukan - {{ list_statistikpenduduk()[$pilih] }}"></x-header>
  </x-slot>
  <x-slot name="content">
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
                                        <a href="{{ url('/statistik/kependudukan/penduduk/'.$link)}}" class="list-group-item list-group-item-action @if ($link == $pilih)
                                            bg-primary
                                        @endif"> {{ $nama }}</a>
                                    @endforeach
                                  </div>
                            </div>
                          </div>
                        </div>
                        {{-- <div class="card">
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
                        </div> --}}
                        {{-- <div class="card">
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
                        </div> --}}
                      </div>
                </div>
            </div>
          </div>
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Data {{ $data['header'] }}" target="_blank"><i class="fas fa-print"></i> CETAK</a>
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
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
                                    <th>Laki-laki</th>
                                    <th>Perempuan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                              @switch($sesi)
                                  @case('penduduk')
                                    {{-- @include('admin.statistik.penduduk.'.$pilih) --}}
                                    @forelse ($data['tabel'] as $item)
                                        <tr>
                                            <td class="text-center {{ css_statistik($item['no']) }}">{{ $item['no']}}</td>
                                            <td class=" {{ css_statistik($item['no']) }}">{{ $item['nama']}}</td>
                                            <td class="text-center {{ css_statistik($item['no']) }}">{{ $item['l']}}</td>
                                            <td class="text-center {{ css_statistik($item['no']) }}">{{ $item['p']}}</td>
                                            <td class="text-center {{ css_statistik($item['no']) }}">{{ $item['lp']}}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">tidak ada data</td>
                                        </tr>
                                    @endforelse
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
    <div class="modal fade" id="cetakdokumen">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form target="_blank" action="{{ url('/cetakdata')}}" method="get">
              @csrf
              <input type="hidden" name="s" value="statistik">
              <input type="hidden" name="sesi" value="{{ $pilih }}">
              {{-- <input type="hidden" name="id" value="{{ $potensi->id }}"> --}}
          <div class="modal-header">
          <h4 class="modal-title">Informasi Cetak Dokumen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body p-3">
              <section class="p-3">
                 <div class="form-group row">
                      <label for="" class="col-md-4">Mengetahui</label>
                      <select name="staf" id="staf" class="form-control col-md-8" required>
                          <option value="">-- Pilih Staf --</option>
                          @foreach (DbCikara::showtable('staf',['status_pegawai','aktif']) as $item)
                          <option value="{{ $item->id}}">{{ strtoupper($item->nama_pegawai.' | '.$item->jabatan)}}</option>
                          @endforeach
                      </select>
                          
                 </div>
              </section>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> CETAK SEKARANG</button>
          </div>
      </form>
      </div>
      </div>
    </div>
  </x-slot>
  <x-slot name="kodejs">
    <script>
      Highcharts.chart('batang', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Penduduk berdasarkan <?= $data['header']?>'
        },
        xAxis: {
            categories: [<?= $data['judul'] ?>]
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Jumlah',
            data: [<?= $data['nilai']?>]
        }]
    });
    Highcharts.chart('pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: "Data Penduduk Berdasarkan <?= $data['header']?>"
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
        name: 'Total',
        colorByPoint: true,
        data: [ <?php 
          $no = 1;
          foreach ($data['pie'] as $row) {
        ?>
          {
            name: "<?=$row['nama'] ?>",
            y: <?=$row['nilai'] ?>,
            <?php 
              if($no == 1){
              ?>
                sliced: true,
                selected: true
              <?php 
              } 
            ?>
        },
        <?php 
          $no++;
          }
        ?>]

    }]
});
    </script>
  </x-slot>
</x-adminlte-layout>
      



