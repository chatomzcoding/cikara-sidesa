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
  </div>