<x-adminlte-layout title="data penduduk" menu="penduduk">
    <x-slot name="header">
        <x-header judul="data penduduk" active="detail penduudk">
            <li class="breadcrumb-item"><a href="{{ url('penduduk')}}">Daftar Penduduk</a></li>
        </x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header row">
                      <div class="col-md-8">
                          <form id="data-{{ $penduduk->id }}" action="{{url('/penduduk',$penduduk->id)}}" method="post">
                              @csrf
                              @method('delete')
                              </form>
                          <a href="{{ url('/penduduk')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="kembali ke daftar penduduk"><i class="fas fa-angle-left"></i> Kembali</a>
                          <a href="{{ url('/penduduk/'.Crypt::encryptString($penduduk->id).'/edit')}}" class="btn btn-outline-success btn-flat btn-sm pop-info" title="ubah data penduduk"><i class="fas fa-pen"></i> Ubah</a>
                          <button onclick="deleteRow( {{ $penduduk->id }} )" class="btn btn-outline-danger btn-flat btn-sm pop-info" title="Hapus Data Penduduk"><i class="fas fa-trash-alt"></i> Hapus</button>
        
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{ url('/cetakdata?s=detailpenduduk&id='.$penduduk->id)}}" target="_blank" class="btn btn-outline-info btn-flat btn-sm pop-info" title="Cetak Detail Penduduk"><i class="fas fa-print"></i> CETAK</a>
                      </div>
                </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                            <section>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="icon fas fa-info"></i> Persentase Kelengkapan Data!</h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ nilai_kelengkapan($penduduk) }}" aria-valuemin="0"
                                                     aria-valuemax="100" style="width: {{ nilai_kelengkapan($penduduk) }}%">
                                                  <span>{{ nilai_kelengkapan($penduduk) }}% Complete</span>
                                                </div>
                                              </div>
                                          </div>
                                    </div>
                                    <div class="col-3">
                                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-user"></i> Biodata</a>
                                        <a class="nav-link" id="v-pills-kelahiran-tab" data-toggle="pill" href="#v-pills-kelahiran" role="tab" aria-controls="v-pills-kelahiran" aria-selected="false"><i class="fas fa-id-card-alt"></i> Kelahiran</a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-address-card"></i> Kependudukan</a>
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-users"></i> Keluarga</a>
                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-user-md"></i> Kesehatan</a>
                                        <a class="nav-link" id="v-pills-perkawinan-tab" data-toggle="pill" href="#v-pills-perkawinan" role="tab" aria-controls="v-pills-perkawinan" aria-selected="false"><i class="fas fa-heart"></i> Perkawinan</a>
                                      </div>
                                    </div>
                                    <div class="col-9">
                                      <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            {{-- data utama --}}
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th width="40%">Nama Lengkap</th>
                                                        <td class="text-capitalize">: {{ $penduduk->nama_penduduk }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Induk Kependudukan (NIK)</th>
                                                        <td>: {{ $penduduk->nik }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Kelamin</th>
                                                        <td>: {{ $penduduk->jk }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tempat Tanggal Lahir</th>
                                                        <td class="text-capitalize">: {{ $penduduk->tempat_lahir.', '.date_indo($penduduk->tgl_lahir) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Agama</th>
                                                        <td>: {{ $penduduk->agama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td>: {{ $penduduk->alamat_sekarang }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pekerjaan</th>
                                                        <td>: {{ $penduduk->pekerjaan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Golongan Darah</th>
                                                        <td>: {{ $penduduk->golongan_darah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pendidikan dalam KK</th>
                                                        <td>: {{ $penduduk->pendidikan_kk }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pendidikan Ditempuh</th>
                                                        <td>: {{ $penduduk->pendidikan_tempuh }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Handphone</th>
                                                        <td>: {{ $penduduk->no_telp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat Email</th>
                                                        <td>: {{ $penduduk->email }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-kelahiran" role="tabpanel" aria-labelledby="v-pills-kelahiran-tab">
                                            {{-- data kependudukan --}}
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Nomor Akta Kelahiran</th>
                                                        <td>: {{ $penduduk->no_akta }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tempat Lahir</th>
                                                        <td>: {{ $penduduk->tempat_lahir }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Lahir</th>
                                                        <td>: {{ $penduduk->tgl_lahir }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Waktu Lahir</th>
                                                        <td>: {{ $penduduk->waktu_lahir }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tempat Dilahirkan</th>
                                                        <td>: {{ $penduduk->tempat_dilahirkan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Kelahiran</th>
                                                        <td>: {{ $penduduk->jenis_kelahiran }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Anak Ke</th>
                                                        <td>: {{ $penduduk->anak_ke }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Penolong Kelahiran</th>
                                                        <td>: {{ $penduduk->penolong_kelahiran }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Berat Lahir</th>
                                                        <td>: {{ $penduduk->berat_lahir }} gram</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Panjang Badan</th>
                                                        <td>: {{ $penduduk->panjang_lahir }} cm</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            {{-- data kependudukan --}}
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Status KTP Elektronik</th>
                                                        <td>: {{ $penduduk->status_ktp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status Rekam KTP</th>
                                                        <td>: {{ $penduduk->status_rekam }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status Penduduk</th>
                                                        <td class="text-uppercase">: {{ $penduduk->status_penduduk }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>KK Sebelumnya</th>
                                                        <td>: {{ $penduduk->kk_sebelum }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Hubungan KK </th>
                                                        <td>: {{ $penduduk->hubungan_keluarga }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status Kewarganegaraan</th>
                                                        <td class="text-uppercase">: {{ $penduduk->status_warganegara }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Paspor</th>
                                                        <td>: {{ $penduduk->nomor_paspor }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Berakhir Paspor</th>
                                                        <td>: {{ $penduduk->tgl_akhirpaspor }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor KITAS/KITAP</th>
                                                        <td>: {{ $penduduk->nomor_kitas }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                            {{-- data keluarga --}}
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Nama Ayah</th>
                                                        <td>: {{ $penduduk->nama_ayah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIK Ayah</th>
                                                        <td>: {{ $penduduk->nik_ayah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Ibu</th>
                                                        <td>: {{ $penduduk->nama_ibu }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIK Ibu</th>
                                                        <td>: {{ $penduduk->nik_ibu }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                            {{-- data kesehatan --}}
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>status Kecacatan</th>
                                                        <td>: {{ $penduduk->cacat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sakit Menahun</th>
                                                        <td>: {{ $penduduk->sakit_menahun }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Akseptor KB</th>
                                                        <td>: {{ $penduduk->akseptor_kb }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Asuransi</th>
                                                        <td>: {{ $penduduk->asuransi }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-perkawinan" role="tabpanel" aria-labelledby="v-pills-perkawinan-tab">
                                            {{-- data kesehatan --}}
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>status perkawinan</th>
                                                        <td>: {{ $penduduk->status_perkawinan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>No. Akta Nikah</th>
                                                        <td>: {{ $penduduk->no_bukunikah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Perkawinan</th>
                                                        <td>: {{ $penduduk->tgl_perkawinan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Akta Perceraian</th>
                                                        <td>: {{ $penduduk->akta_perceraian }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Perceraian</th>
                                                        <td>: {{ $penduduk->tgl_perceraian }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </section>
                        </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </x-slot>
</x-adminlte-layout>
