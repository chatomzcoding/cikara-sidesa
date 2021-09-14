<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{ DbCikara::chartDashboard('jumlahkunjungan') }}</span>
              <span>Kunjungan per hari</span>
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
              <span>Laporan Penduduk</span>
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
              <span class="text-bold text-lg">8</span>
              <span>Permintaan Surat</span>
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
                <span class="text-bold text-lg">Total 270</span>
                <span>Klasifikasi Laporan Penduduk</span>
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
                <span class="text-bold text-lg">12</span>
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
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
              </a>
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Transaksi</th>
                {{-- <th>More</th> --}}
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>
                  {{-- <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> --}}
                  Voucher Pulsa
                </td>
                <td>Rp. 14.000</td>
                <td>
                  <small class="text-success mr-1">
                    <i class="fas fa-arrow-up"></i>
                    12%
                  </small>
                  34 Terjual
                </td>
                {{-- <td>
                  <a href="#" class="text-muted">
                    <i class="fas fa-search"></i>
                  </a>
                </td> --}}
              </tr>
              <tr>
                <td>
                  {{-- <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> --}}
                  Baju Bayi
                </td>
                <td>Rp. 30.000</td>
                <td>
                  <small class="text-warning mr-1">
                    <i class="fas fa-arrow-down"></i>
                    0.5%
                  </small>
                  5
                </td>
                {{-- <td>
                  <a href="#" class="text-muted">
                    <i class="fas fa-search"></i>
                  </a>
                </td> --}}
              </tr>
              <tr>
                <td>
                  {{-- <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> --}}
                  Kain Pancing
                </td>
                <td>Rp. 5.000</td>
                <td>
                  <small class="text-danger mr-1">
                    <i class="fas fa-arrow-down"></i>
                    10%
                  </small>
                  21 Terjual
                </td>
                {{-- <td>
                  <a href="#" class="text-muted">
                    <i class="fas fa-search"></i>
                  </a>
                </td> --}}
              </tr>
              <tr>
                <td>
                  {{-- <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> --}}
                  Batu Bata
                  <span class="badge bg-danger">NEW</span>
                </td>
                <td>Rp. 2.000</td>
                <td>
                  <small class="text-success mr-1">
                    <i class="fas fa-arrow-up"></i>
                    63%
                  </small>
                  3000 terjual
                </td>
                {{-- <td>
                  <a href="#" class="text-muted">
                    <i class="fas fa-search"></i>
                  </a>
                </td> --}}
              </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>
   
    <!-- /.col-md-6 -->
  </div>