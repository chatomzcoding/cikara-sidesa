<x-adminlte-layout title="{{ $judul }}" menu="datauser">
  <x-slot name="header">
    <x-header judul="Data {{ $judul }}" active="Daftar {{ $judul }}"></x-header>
  </x-slot>
  <x-slot name="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- statistik -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total User</span>
                      <span class="info-box-number">
                        {{ $total['user'] }}
                        {{-- <small>%</small> --}}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Penduduk</span>
                      <span class="info-box-number">
                        {{ $total['penduduk'] }}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-times"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Penduduk Belum Daftar</span>
                      <span class="info-box-number">
                        {{ $total['belumdaftar'] }}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                @if (count($user) <> count($penduduk))
                    <a href="#" class="btn btn-outline-primary btn-sm pop-info" data-toggle="modal" data-target="#tambah" title="Tambah User Baru"><i class="fas fa-plus"></i> Tambah</a>
                    <a href="#" class="btn btn-outline-info btn-sm pop-info" data-toggle="modal" data-target="#tambahotomatis" title="Tambakan otomatis semua user penduduk"><i class="fas fa-plus"></i> Tambah Otomatis User</a>
                @endif
                    <a href="{{ url('user?sesi=staf') }}" class="btn btn-outline-dark btn-sm pop-info" title="Daftar User Staf"><i class="fas fa-users"></i> Data Staf</a>
                <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-sm float-right pop-info" title="Cetak daftar User"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="12%">Aksi</th>
                                <th>Nama User</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                              @php
                                  $notifikasi = json_decode($item->notifikasi);
                              @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/user',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                              <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                              </button>
                                              <div class="dropdown-menu" role="menu">
                                                  <a href="{{ url('penduduk/'.Crypt::encryptString($item->id)) }}" class="dropdown-item text-primary"><i class="fas fa-user"></i> Detail Penduduk</a>
                                                  <button type="button" data-toggle="modal" data-name ="{{ $item->name }}" data-email ="{{ $item->email }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                  <i class="fa fa-edit"></i> Edit User
                                                  </button>
                                                <div class="dropdown-divider"></div>
                                                <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                              </div>
                                          </div>
                                    </td>
                                    <td class="text-capitalize">{{ $item->nama_penduduk }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }} </td>
                                    <td>
                                      @if (!is_null($notifikasi))
                                        <span class="badge badge-danger w-100">{{ $notifikasi->status }}</span> <br>
                                        NIK : {{ $notifikasi->nik }} <br>
  
                                      @else 
                                        <p class="text-center">-</p>
                                      @endif
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="tambahotomatis">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/user')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="sesi" value="otomatis">
            <div class="modal-header">
            <h4 class="modal-title">Tambah User Otomatis</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                  <div class="alert alert-info">
                    Dengan menambahkan otomatis user penduduk, maka akan memberikan email dan password secara random sesuai dengan NIK penduduk <br>
                    contoh : <br>
                    &nbsp;&nbsp; Email : 3240959594795733@jantungdesa.com <br>
                    &nbsp;&nbsp; Password : 3240959594795733 <br>
                    Catatan : direkomendasikan untuk kepada penduduk untuk merubah email atau password agar tidak digunakan oleh orang yang tidak bertanggung jawab
  
                  </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> BUAT USER</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/user')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="level" value="penduduk">
            <div class="modal-header">
            <h4 class="modal-title">Tambah User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Penduduk</label>
                        <div class="col-md-8 p-0">
                          <select name="name" id="name" class="form-control penduduk" data-width="100%">
                              @foreach ($penduduk as $item)
                                  @if (DbCikara::countData('user_akses',['penduduk_id',$item->id]) == 0)
                                      <option value="{{ $item->nik }}">{{ strtoupper($item->nik.' | '.$item->nama_penduduk) }}</option>
                                  @endif
                              @endforeach
                          </select>
                        </div>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Email</label>
                        <input type="email" name="email" id="email" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Password</label>
                        <input type="password" name="password" id="password" class="form-control col-md-8" required>
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
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('user.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="ubahpassword" value="TRUE">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Email</label>
                        <input type="email" name="email" id="email" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Password (isi jika ingin diubah)</label>
                        <input type="password" name="password" id="password" class="form-control col-md-8">
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
  
    <div class="modal fade" id="cetakdokumen">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form target="_blank" action="{{ url('/cetakdata')}}" method="get">
              @csrf
              <input type="hidden" name="s" value="user">
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
                              <option value="{{ $item->id}}">{{ $item->nama_pegawai}}</option>
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
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var email = button.data('email')
                var password = button.data('password')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #email').val(email);
                modal.find('.modal-body #password').val(password);
                modal.find('.modal-body #id').val(id);
            })
    </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy","excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            });
        </script>
  </x-slot>
</x-adminlte-layout>