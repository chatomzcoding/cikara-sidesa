<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{ DbCikara::chartDashboard('jumlahkunjungan') }}</span>
              <span>Total Kunjungan</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="far fa-calendar-alt"></i>
              </span>
              <span class="text-muted">{{ bulan_indo() }}</span>
            </p>
          </div>
          <!-- /.d-flex -->

          <div class="position-relative mb-4">
            <figure class="highcharts-figure">
                <div id="visitors"></div>
              </figure>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{ DbCikara::countData('lapor') }}</span>
              <span>Total Laporan Penduduk</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> 10%
              </span>
              <span class="text-muted">Sejak Hari Kemarin</span>
            </p>
          </div>

          <div class="position-relative mb-4">
            <figure class="highcharts-figure">
                <div id="lapor"></div>
              </figure>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{ DbCikara::countData('penduduk_surat') }}</span>
              <span>Total Permintaan Surat</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> 3%
              </span>
              <span class="text-muted">Sejak Hari Lalu</span>
            </p>
          </div>
          <!-- /.d-flex -->

          <div class="position-relative mb-4">
            <figure class="highcharts-figure">
                <div id="surat"></div>
              </figure>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="text-bold text-lg">{{ DbCikara::countData('lapor') }}</span>
                <span>Total Laporan Penduduk</span>
              </p>
              <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                  <i class="fas fa-arrow-up"></i> 3%
                </span>
                <span class="text-muted">Sejak Hari Lalu</span>
              </p>
            </div>
            <!-- /.d-flex -->
  
            <div class="position-relative mb-4">
              <figure class="highcharts-figure">
                  <div id="klasifikasi"></div>
                </figure>
            </div>
          </div>
        </div>
      </div>
    <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="text-bold text-lg">{{ DbCikara::countData('covid') }}</span>
                <span>Statistik Data Covid 19</span>
              </p>
              <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                  <i class="fas fa-arrow-up"></i> 5%
                </span>
                <span class="text-muted">Sejak Bulan Lalu</span>
              </p>
            </div>
            <!-- /.d-flex -->
  
            <div class="position-relative mb-4">
              <figure class="highcharts-figure">
                  <div id="covid"></div>
                </figure>
            </div>
          </div>
        </div>
      </div>
    <!-- /.col-md-6 -->
    <div class="col-md-12">
        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Produk</h3>
            {{-- <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
              </a>
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
              </a>
            </div> --}}
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Dilihat</th>
                {{-- <th>More</th> --}}
              </tr>
              </thead>
              <tbody>
                @foreach ($produk as $item)
                  <tr>
                    <td class="text-capitalize">
                      <img src="{{ asset('img/penduduk/produk/'.$item->gambar) }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                      {{ $item->nama }}
                    </td>
                    <td>{{ rupiah($item->harga) }}</td>
                    <td>
                      {{-- <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small> --}}
                      {{ $item->dilihat }} dilihat
                    </td>
                    {{-- <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td> --}}
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>
   
    <!-- /.col-md-6 -->
  </div>