<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Pokok</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Data Pokok</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambahkan Data Pokok</h3>
              </div>
              <div class="card-body">
                  <form action="{{ url('/datapokok/'.$datapokok->id)}}" method="post" enctype="multipart/form-data">
                    @csrf  
                    @method('patch')
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="row">
                                  <div class="col-md-4 col-sm-6 pt-1">
                                      <div class="form-group">
                                          <label for="nama_desa">Nama Desa</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="desa" class="form-control" value="{{ $datapokok->desa}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kecamatan">Nama Kecamatan</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="kecamatan" class="form-control" value="{{ $datapokok->kecamatan}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Nama Kabupaten</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="kabupaten" class="form-control" value="{{ $datapokok->kabupaten}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Nama Bumdes</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="nama_bumdes" class="form-control" value="{{ $datapokok->nama_bumdes}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Berdiri Tanggal</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="date" name="berdiri_tanggal" class="form-control" value="{{ $datapokok->berdiri_tanggal}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Dasar Hukum</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="dasar_hukum" class="form-control" value="{{ $datapokok->dasar_hukum}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Penasehat</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="penasehat" class="form-control" value="{{ $datapokok->penasehat}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Ketua Bumdes</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="direktur" class="form-control" value="{{ $datapokok->direktur}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <input type="hidden" name="manajer_unit" value="-">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Bendahara</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="manajer_keuangan" class="form-control" value="{{ $datapokok->manajer_keuangan}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Sekertaris</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="manajer_administrasi" class="form-control" value="{{ $datapokok->manajer_administrasi}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Staf</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="staf" class="form-control" value="{{ $datapokok->staf}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Ketua Pengawas</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="ketua_pengawas" class="form-control" value="{{ $datapokok->ketua_pengawas}}" placeholder=""  >
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label for="kabupaten">Logo</label>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-6">
                                      <div class="form-group">
                                          <input type="file" name="logo"> <br>
                                          <small>input file baru jika ingin merubah gambar</small>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group text-right">
                                          <button type="submit" class="btn btn-primary btn-sm">SIMPAN PERUBAHAN</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
    </div>

    
</x-app-layout>
