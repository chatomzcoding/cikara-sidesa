@extends('layouts.admin')

@section('title')
    Data Penduduk
    @endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Pengaduan Kelengkapan Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('penduduk')}}">Daftar Penduduk</a></li>
            <li class="breadcrumb-item active">Data Pengaduan</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <a href="{{ url('/penduduk')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar Penduduk"><i class="fas fa-angle-left"></i> Kembali</a>
                <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-flat btn-sm pop-info float-right" title="Cetak Daftar Penduduk Aduan"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="mb-3">
                    <form action="{{ url('penduduk') }}" method="get">
                      @csrf
                      <input type="hidden" name="data" value="aduan">
                      <div class="row">
                          <div class="form-group col-md-3">
                              <select name="status" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                  <option value="semua">-- Semua Status --</option>
                                      <option value="proses" @if ($filter['status'] == 'proses')
                                          selected
                                      @endif>PROSES</option>
                                      <option value="selesai" @if ($filter['status'] == 'selesai')
                                          selected
                                      @endif>SELESAI</option>
                              </select>
                          </div>
                      </div>
                  </form>
                </section>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Penduduk</th>
                                <th>Data Pengaduan</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($user as $item)
                                @php
                                        if ($filter['status'] == 'semua') {
                                            $aduan = DB::table('penduduk_aduan')
                                                        ->where('user_id',$item->user_id)
                                                        ->orderBy('id','DESC')
                                                        ->get();
                                        } else {
                                            $aduan = DB::table('penduduk_aduan')
                                            ->where('user_id',$item->user_id)
                                            ->where('status',$filter['status'])
                                            ->orderBy('id','DESC')
                                            ->get();
                                        }
                                    $penduduk = DB::table('penduduk')
                                                ->join('user_akses','penduduk.id','=','user_akses.penduduk_id')
                                                ->select('penduduk.*')
                                                ->where('user_akses.user_id',$item->user_id)
                                                ->first();
                                @endphp
                                @if (count($aduan) > 0)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td><a href="{{ url('penduduk/'.Crypt::encryptString($penduduk->id)) }}" class="pop-info" title="Detail Penduduk">{{ $penduduk->nama_penduduk }}</a> <br> <span class="small">{{ $penduduk->nik }}</span></td>
                                        <td class="text-center">
                                            <table class="table">
                                                <tr>
                                                    <td width="5%">Aksi</td>
                                                    <td width="20%">Tanggal Aduan</td>
                                                    <td>Data</td>
                                                    <td>Data Awal</td>
                                                    <td>Data Pengaduan</td>
                                                    <td width="8%">Status</td>
                                                </tr>
                                                @foreach ($aduan as $row)
                                                    @php
                                                        $dawal = 'kosong';
                                                        $key = $row->key; 
                                                    @endphp
                                                    @if (isset($penduduk->$key))
                                                        @php
                                                            $dawal = $penduduk->$key;
                                                        @endphp
                                                    @endif
                                            </td>
                                                    <tr>
                                                        <td>
                                                            <form id="data-{{ $row->id }}" action="{{url('/pendudukaduan',$row->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                </form>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <div class="dropdown-menu" role="menu">
                                                                    {{-- @if ($row->status == 'proses') --}}
                                                                        <button type="button" data-toggle="modal" data-key="{{ ubahdatakey($row->key) }}" data-isi="{{ $row->isi }}" data-awal="{{ $dawal }}"  data-sesi="{{ $row->key }}"  data-id="{{ $row->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                                            <i class="fa fa-edit"></i> Edit Data
                                                                            </button>
                                                                            <div class="dropdown-divider"></div>
                                                                    {{-- @endif --}}
                                                                <button onclick="deleteRow( {{ $row->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $row->created_at }}</td>
                                                        <td>{{ ubahdatakey($row->key) }}</td>
                                                        <td>
                                                            {{ $dawal }}
                                                        </td>
                                                        <td class="text-danger">
                                                        {{ $row->isi }}
                                                        </td>
                                                        <td>
                                                            @if ($row->status == 'selesai')
                                                                <span class="badge badge-success w-100">selesai</span>
                                                            @else
                                                                <span class="badge badge-warning w-100">proses</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">belum ada data</td>
                                </tr>
                            @endforelse
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="cetakdokumen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form target="_blank" action="{{ url('/cetakdata')}}" method="get">
                @csrf
                <input type="hidden" name="s" value="pendudukaduan">
                <input type="hidden" name="status" value="{{ $filter['status'] }}">
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
       
  {{-- modal edit --}}
  <div class="modal fade" id="ubah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('pendudukaduan.update','test')}}" method="post">
            @csrf
            @method('patch')
        <div class="modal-header">
        <h4 class="modal-title">Perbaiki Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body p-3">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="status" value="selesai">
            <section class="p-3">
                <div class="form-group row">
                    <label for="" class="col-md-4 p-2">Data</label>
                    <input type="text" name="key" id="key" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 p-2">Data Awal</label>
                    <input type="text" name="isi" id="awal" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 p-2">Data Pengaduan</label>
                    <div class="col-md-8 p-0">
                        <div class="input-group mb-3">
                            <input type="text" name="isi" id="isi" class="form-control" readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary" onclick="copy_text()"><i class="fas fa-copy"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- form dinamis --}}
                <div class="form-group row">
                    <label for="" class="col-md-4 p-2"><span id="form-nama"></span></label>
                    <div class="col-md-8 p-0">
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" style="display : none;">
                        <div class="input-group mb-3" id="form-input" style="display : none;">
                            <input type="text" name="databaru" id="databaru" class="form-control">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-dark" onclick="paste()"><i class="fas fa-clipboard"></i></button>
                            </div>
                        </div>
                        {{-- <input type="text" name="databaru" class="form-control" id="form-input" placeholder="masukkan data baru disini" > --}}
                        <input type="text" name="nik" class="form-control" maxlength="16" id="nik" pattern="[0-9]{16}" style="display : none;">
                        <input type="text" name="nik_ayah" class="form-control" maxlength="16" id="nik_ayah" pattern="[0-9]{16}" style="display : none;">
                        <input type="text" name="nik_ibu" class="form-control" maxlength="16" id="nik_ibu" pattern="[0-9]{16}" style="display : none;">
                        <select name="status_ktp" id="status_ktp" class="form-control"  style="display : none;">
                            <option value="belum">BELUM</option>
                            <option value="sudah">KTP-EL</option>
                            <option value="proses">Dalam Proses</option>
                        </select>
                        <select name="jk" id="jk" class="form-control" style="display : none;">
                            @foreach (list_jeniskelamin() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="agama" id="agama" class="form-control" style="display : none;">
                            @foreach (list_agama() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="status_penduduk" id="status_penduduk" class="form-control" style="display : none;">
                            @foreach (list_statuspenduduk() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="anak_ke" id="anak_ke" class="form-control"  style="display : none;">
                        <select name="pekerjaan" id="pekerjaan" class="form-control" data-width="100%" style="display : none;">
                            @foreach (list_pekerjaan() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <input type="email" name="email" id="email" class="form-control" style="display : none;">
                        <select name="golongan_darah" id="golongan_darah" class="form-control" style="display : none;">
                            @foreach (list_golongandarah() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="cacat" id="cacat" class="form-control" style="display : none;">
                            @foreach (list_cacat() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="sakit_menahun" id="sakit_menahun" class="form-control" style="display : none;">
                            @foreach (list_sakitmenahun() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="akseptor_kb" id="akseptor_kb" class="form-control" style="display : none;">
                            @foreach (list_akseptorkb() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="asuransi" id="asuransi" class="form-control" style="display : none;">
                            @foreach (list_asuransi() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="pendidikan_kk" id="pendidikan_kk" class="form-control" style="display : none;">
                            @foreach (list_pendidikandalamkk() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="pendidikan_tempuh" id="pendidikan_tempuh" class="form-control" style="display : none;">
                            @foreach (list_pendidikantempuh() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <select name="status_warganegara" id="status_warganegara" class="form-control" style="display : none;">
                            @foreach (list_statuskewarganegaraan() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="no_telp" id="no_telp" class="form-control" maxlength="13" pattern="[0-9]+" style="display : none;">
                    </div>
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
           
        $('#ubah').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var key = button.data('key')
            var isi = button.data('isi')
            var awal = button.data('awal')
            var sesi = button.data('sesi')
            var id = button.data('id')
            var nama = document.getElementById("form-nama");
            var modal = $(this)
            nama.innerHTML = 'Ubah ' + key;
            // hide data yang tidak dibutuhkan
            $("#form-input").hide();
            $("#nik").hide();
            $("#tgl_lahir").hide();
            $("#jk").hide();
            $("#agama").hide();
            $("#status_ktp").hide();
            $("#status_penduduk").hide();
            $("#anak_ke").hide();
            $("#pekerjaan").hide();
            $("#nik_ayah").hide();
            $("#nik_ibu").hide();
            $("#email").hide();
            $("#golongan_darah").hide();
            $("#cacat").hide();
            $("#sakit_menahun").hide();
            $("#akseptor_kb").hide();
            $("#asuransi").hide();
            $("#pendidikan_kk").hide();
            $("#pendidikan_tempuh").hide();
            $("#status_warganegara").hide();
            switch (sesi) {
                case 'tgl_lahir':
                    $("#tgl_lahir").show();
                    break;
                case 'nik':
                    $("#nik").show();
                    break;
                case 'nik_ayah':
                    $("#nik_ayah").show();
                    break;
                case 'nik_ibu':
                    $("#nik_ibu").show();
                    break;
                case 'status_ktp':
                    modal.find('.modal-body #status_ktp').val(awal);
                    $("#status_ktp").show();
                    break;
                case 'jk':
                    modal.find('.modal-body #jk').val(awal);
                    $("#jk").show();
                    break;
                case 'agama':
                    modal.find('.modal-body #agama').val(awal);
                    $("#agama").show();
                    break;
                case 'status_penduduk':
                    modal.find('.modal-body #status_penduduk').val(awal);
                    $("#status_penduduk").show();
                    break;
                case 'anak_ke':
                    modal.find('.modal-body #anak_ke').val(awal);
                    $("#anak_ke").show();
                    break;
                case 'pekerjaan':
                    modal.find('.modal-body #pekerjaan').val(awal);
                    $("#pekerjaan").show();
                    break;
                case 'email':
                    modal.find('.modal-body #email').val(awal);
                    $("#email").show();
                    break;
                case 'golongan_darah':
                    modal.find('.modal-body #golongan_darah').val(awal);
                    $("#golongan_darah").show();
                    break;
                case 'cacat':
                    modal.find('.modal-body #cacat').val(awal);
                    $("#cacat").show();
                    break;
                case 'sakit_menahun':
                    modal.find('.modal-body #sakit_menahun').val(awal);
                    $("#sakit_menahun").show();
                    break;
                case 'akseptor_kb':
                    modal.find('.modal-body #akseptor_kb').val(awal);
                    $("#akseptor_kb").show();
                    break;
                case 'asuransi':
                    modal.find('.modal-body #asuransi').val(awal);
                    $("#asuransi").show();
                    break;
                case 'pendidikan_kk':
                    modal.find('.modal-body #pendidikan_kk').val(awal);
                    $("#pendidikan_kk").show();
                    break;
                case 'pendidikan_tempuh':
                    modal.find('.modal-body #pendidikan_tempuh').val(awal);
                    $("#pendidikan_tempuh").show();
                    break;
                case 'status_warganegara':
                    modal.find('.modal-body #status_warganegara').val(awal);
                    $("#status_warganegara").show();
                    break;
                case 'no_telp':
                    $("#no_telp").show();
                    break;
                default:
                    nama.innerHTML = 'Ubah Data';
                    $("#form-input").show();
                    break;
            }
    
            modal.find('.modal-body #isi').val(isi);
            modal.find('.modal-body #key').val(key);
            modal.find('.modal-body #awal').val(awal);
            modal.find('.modal-body #id').val(id);
        })
    </script>
    <script type="text/javascript">
        function copy_text() {
            document.getElementById("isi").select();
            var nilai = document.getElementById("isi").value;
            document.execCommand("copy");
            swal({
                title: "Data Berhasil di salin",
                text: nilai,
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            });
        }
        function paste() {
            var nilai = document.getElementById("isi").value;
            var ta =  document.getElementById("databaru");
            ta.innerHTML = nilai;
        } 
    </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel"]
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
@endsection
