<x-app-layout>
    @section('title')
        Bumdes - Jurnal Umum {{ $sesi}}
    @endsection
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Jurnal Umum</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Jurnal Umum</li>
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
                <h3 class="card-title">Daftar Jurnal</h3>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="text-right my-2">
                      @if ($sesi <> 'semua')
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Jurnal {{ $sesi}}</button>
                      @endif
                  </section>
                <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Bukti Transaksi</th>
                    <th>Keterangan</th>
                    <th>Nama Akun</th>
                    <th>Nama Akun Pembantu</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th width="10%">Opsi</th>
                </tr>
                </thead>
                <tbody class="text-capitalize">
                    @foreach ($jurnal as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration}}</td>
                            <td>{{ $item->tgl_transaksi}}</td>
                            <td>{{ $item->bukti_transaksi}}</td>
                            <td><small>{{ $item->keterangan}} <br>{{ $item->keterangan}}</small></td>
                            <td>
                                @foreach ($item->listakun as $item2)
                                    @php
                                        if ($item2->status_jurnalakun == 'debet') {
                                            $statusdebet = $item2->daftarakun_id;
                                        } else {
                                            $statuskredit = $item2->daftarakun_id;
                                        }
                                    @endphp
                                    <small>
                                    @if ($item2->status_jurnalakun == 'debet')
                                        <strong> {{ DbHelp::nama_akun($item2->daftarakun_id)}}</strong> <br>
                                    @else
                                    {{ DbHelp::nama_akun($item2->daftarakun_id)}}
                                    @endif
                                    </small>
                                @endforeach
                            </td>
                            <td>{{ DbHelp::nama_akunpembantu($item->id)}}</td>
                            <td><strong>{{ norupiah($item->nominal_jurnal)}}</strong></td>
                            <td><br>{{ norupiah($item->nominal_jurnal)}}</td>
                            <td class="text-center">
                                <form id="data-{{ $item->id }}" action="{{url('/jurnalumum',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                                  {{-- <a href="{{ url('/cikaradivisi',Crypt::encryptString($item->id))}}" class="btn btn-link btn-success btn-lg"><i class="fas fa-external-link-alt"></i></a> --}}
                                  <button type="button" data-toggle="modal" data-tgl_transaksi="{{ $item->tgl_transaksi }}" data-bukti_transaksi="{{ $item->bukti_transaksi }}" data-keterangan="{{ $item->keterangan }}" data-nominal_jurnal="{{ $item->nominal_jurnal }}" data-debet="{{ $statusdebet }}" data-kredit="{{ $statuskredit }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                </button> &nbsp;&nbsp;
                                <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                <tfoot class="text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Bukti Transaksi</th>
                        <th>Keterangan</th>
                        <th>Nama Akun</th>
                        <th>Nama Akun Pembantu</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th width="10%">Opsi</th>
                    </tr>
                </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/jurnalumum')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id}}">
            <div class="modal-header">
            <h4 class="modal-title">Form Tambah Jurnal {{ $sesi}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Tanggal Transaksi</label>
                        <input type="date" class="col-md-8 form-control" name="tgl_transaksi" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Bukti Transaksi</label>
                        <input type="text" class="col-md-8 form-control" name="bukti_transaksi" placeholder="kode bukti transaksi" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Keterangan</label>
                        <input type="text" class="col-md-8 form-control" name="keterangan" placeholder="keterangan jurnal" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Pos Akun Debet</label>
                        <select name="debet" id="" class="form-control col-md-8">
                            @foreach ($debet as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_akun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Pos Akun Kredit</label>
                        <select name="kredit" id="" class="form-control col-md-8">
                            @foreach ($kredit as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_akun}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- cek status akun pembantu --}}
                    @if (count($akunpembantu) > 0)
                        <div class="form-group row">
                            <label for="" class="col-md-4 p-2">Akun Pembantu</label>
                            <select name="akunpembantu" id="" class="form-control col-md-8">
                                <option value="">-- pilih akun pembantu --</option>
                                @foreach ($akunpembantu as $item)
                                    <option value="{{ $item->id}}">{{ $item->nama_akun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 p-2">Status Akun Pembantu</label>
                            <select name="status_jurnalakunpembantu" id="" class="form-control col-md-8">
                                <option value="debet">debet</option>
                                <option value="kredit">kredit</option>
                            </select>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nominal</label>
                        <input type="text" id="rupiah" class="col-md-8 form-control" name="nominal_jurnal" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    {{-- modal edit --}}
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('jurnalumum.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Form Edit Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Tanggal Transaksi</label>
                        <input type="date" id="tgl_transaksi" class="col-md-8 form-control" name="tgl_transaksi" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Bukti Transaksi</label>
                        <input type="text" id="bukti_transaksi" class="col-md-8 form-control" name="bukti_transaksi" placeholder="kode bukti transaksi" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Keterangan</label>
                        <input type="text" id="keterangan" class="col-md-8 form-control" name="keterangan" placeholder="keterangan jurnal" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Pos Akun Debet</label>
                        <select name="debet" id="debet" class="form-control col-md-8">
                            @foreach ($debet as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_akun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Pos Akun Kredit</label>
                        <select name="kredit" id="kredit" class="form-control col-md-8">
                            @foreach ($kredit as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_akun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nominal</label>
                        <input type="text" id="rupiah1" class="col-md-8 form-control" name="nominal_jurnal" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @section('script')
        
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var tgl_transaksi = button.data('tgl_transaksi')
                var bukti_transaksi = button.data('bukti_transaksi')
                var keterangan = button.data('keterangan')
                var nominal_jurnal = button.data('nominal_jurnal')
                var debet = button.data('debet')
                var kredit = button.data('kredit')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #tgl_transaksi').val(tgl_transaksi);
                modal.find('.modal-body #bukti_transaksi').val(bukti_transaksi);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #rupiah1').val(nominal_jurnal);
                modal.find('.modal-body #debet').val(debet);
                modal.find('.modal-body #kredit').val(kredit);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    @endsection

</x-app-layout>
