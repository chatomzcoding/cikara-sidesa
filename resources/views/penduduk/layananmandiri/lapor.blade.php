@extends('layouts.admin')

@section('title')
    Data {{ $judul }}
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data {{ $judul }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar {{ $judul }}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
  
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- statistik -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-signature"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Laporan</span>
                      <span class="info-box-number">
                        {{ count($lapor) }}
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
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-double"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Laporan Selesai</span>
                      <span class="info-box-number">
                        {{ $total['selesai'] }}
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
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-highlighter"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Laporan diproses</span>
                      <span class="info-box-number">
                        {{ $total['proses'] }}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-history"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Laporan menunggu</span>
                      <span class="info-box-number">
                        {{ $total['menunggu'] }}
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
                <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Laporan </a>
                {{-- <a href="#" class="btn btn-outline-info btn-sm float-right"><i class="fas fa-print"></i> Cetak</a> --}}
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Aksi</th>
                                <th>Photo</th>
                                <th>Isi Laporan</th>
                                <th>Kategori</th>
                                <th>Identitas</th>
                                <th>Posting</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($lapor as $item)
                                @php
                                    $nama = DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk;
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                      <form id="data-{{ $item->id }}" action="{{url('/lapor',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        </form>
                                        @if ($item->status == 'menunggu')
                                        <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        @endif
                                    </td>
                                    <td><img src="{{ asset('img/penduduk/lapor/'.$item->photo) }}" alt="" width="100px"></td>
                                    <td>{{ $item->isi }} <br> 
                                      @if (!is_null($item->tanggapan))
                                        <i class="text-secondary">Tanggapan :{{ $item->tanggapan }}</i>
                                      @endif</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td class="text-center">{{ $item->identitas }}</td>
                                    <td class="text-center">{{ $item->posting }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case('selesai')
                                              <span class="badge badge-success w-100">{{ $item->status }}</span></td>
                                                @break
                                            @case('menunggu')
                                              <span class="badge badge-danger w-100">{{ $item->status }}</span></td>
                                                @break
                                            @case('proses')
                                              <span class="badge badge-warning w-100">{{ $item->status }}</span></td>
                                                @break
                                            @default
                                                
                                        @endswitch
                                </tr>
                            @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    {{-- modal edit --}}
    <div class="modal fade" id="tambah">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ url('proseslapor')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="status" value="menunggu">
          <div class="modal-header">
          <h4 class="modal-title">Tambahkan Laporan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body p-3">
              <input type="hidden" name="user_id" value="{{ $user->id }}">
              <section class="p-3">
                <div class="form-group row">
                      <label for="" class="col-md-4">Kategori Laporan</label>
                      <select name="kategori" id="" class="form-control col-md-8" required>
                          <option value="">-- pilih kategori --</option>
                          @foreach (DbCikara::showtable('kategori',['label','lapor']) as $item)
                              <option value="{{ $item->nama_kategori }}">{{ ucwords($item->nama_kategori) }}</option>
                          @endforeach
                      </select>
                </div>
                 <div class="form-group row">
                     <label for="" class="col-md-4">Isi Laporan <br> <i>maksimal 255 karakter</i></label>
                     <textarea name="isi" id="isi" cols="30" rows="4" maxlength="255" class="form-control col-md-8" required></textarea>
                  </div>
                 <div class="form-group row">
                     <label for="" class="col-md-4">Tampilkan identitas</label>
                     <select name="identitas" id="identitas" class="form-control col-md-8 data-pilihan" required>
                       <option value="">-- pilih --</option>
                       <option value="ya">Ya</option>
                       <option value="tidak">Tidak</option>
                     </select>
                  </div>
                 <div class="form-group row hide-pilihan" style="display : none;">
                     <label for="" class="col-md-4">Tampilkan Di UMUM</label>
                     <select name="posting" id="posting" class="form-control col-md-8">
                       <option value="tidak">Tidak</option>
                       <option value="ya">Ya</option>
                     </select>
                  </div>
                 <div class="form-group row">
                     <label for="" class="col-md-4">Photo Laporan</label>
                     <input type="file" name="photo" class="col-md-8" required>
                  </div>
              </section>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> KIRIM LAPORAN</button>
          </div>
          </form>
      </div>
      </div>
  </div>
  <!-- /.modal -->

  

    @section('script')
          <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var isi = button.data('isi')
                var status = button.data('status')
                var kategori = button.data('kategori')
                var nama = button.data('nama')
                var tanggapan = button.data('tanggapan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #isi').val(isi);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #statusini').val(status);
                modal.find('.modal-body #kategori').val(kategori);
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #tanggapan').val(tanggapan);
                modal.find('.modal-body #id').val(id);
            })
          </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                // "buttons": ["excel", "pdf", "print"]
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

            $(function () {
            $(".data-pilihan").change(function () {
                if ($(this).val() == "ya") {
                    $(".hide-pilihan").show();
                } else {
                    $(".hide-pilihan").hide();
                }
            });
        });
        </script>
    @endsection

    @endsection

