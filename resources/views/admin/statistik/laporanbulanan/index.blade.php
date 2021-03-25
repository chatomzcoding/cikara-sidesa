@section('title')
    SIDESA - statistik laporan bulanan
@endsection
<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Laporan Kependudukan Bulanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Laporan Kependudukan Bulanan</li>
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
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="#" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-print"></i> Cetak</a>
                <a href="#" class="btn btn-outline-dark btn-flat btn-sm"><i class="fas fa-print"></i> Unduh</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <header class="text-center">
                      <h2>PEMERINTAH KABUPATEN/KOTA LOMBOK BART</h2>
                      <h4>LAPORAN PERKEMBANGAN PENDUDUK (LAMPIRAN A-9)</h4>
                  </header>
                  <section class="mb-3">
                    <table>
                        <tr>
                            <th>
                                <div>
                                    Desa / Kelurahan
                                </div>
                            </th>
                            <td>
                                <div>
                                    <input type="text" value="Nama Desa" class="form-control form-control-sm" disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div>
                                    Kecamatan
                                </div>
                            </th>
                            <td>
                                <div>
                                    <input type="text" value="Nama Kecamatan" class="form-control form-control-sm" disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div>
                                    Tahun / Bulan
                                </div>
                            </th>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="2021" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6">
                                        <select name="" id="" class="form-control">
                                            @foreach (daftar_bulan() as $id => $nama)
                                                <option value="{{ $id }}">{{ $nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                  </section>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="3" width="5%">No</th>
                                <th rowspan="3">Perincian</th>
                                <th colspan="7">Penduduk</th>
                                <th colspan="3" rowspan="2">Keluarga (KK)</th>
                            </tr>
                            <tr>
                                <th colspan="2">WNI</th>
                                <th colspan="2">WNA</th>
                                <th colspan="3">Jumlah</th>
                            </tr>
                            <tr>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L+P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L+P</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            <tr>
                                <td class="text-center">1</td>
                                <td>Penduduk/Keluarga awal bulan ini</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Kelahiran/Keluarga baru bulan ini</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Kematian bulan ini</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>Pendatang bulan ini</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>Pindah/Keluarga pergi bulan ini</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>Penduduk hilang bulan ini</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td>Penduduk/Keluarga akhir bulan ini</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/informasipublik')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Informasi Publik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Judul Dokumen</label>
                        <input type="text" name="judul_dokumen" id="judul_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Dokumen</label>
                        <input type="file" name="file_dokumen" id="file_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Kategori Informasi Publik</label>
                        <select name="kategori_informasi" id="kategori_informasi" class="form-control col-md-8" required>
                            <option value="">-- Pilih Kategori Informasi Publik</option>
                            @foreach (list_kategoriinformasipublik() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Tahun</label>
                        <input type="year" name="tahun" id="tahun" maxlength="4" class="form-control col-md-8" required>
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
    <!-- /.modal -->

    {{-- modal edit --}}
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('informasipublik.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Informasi Publik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Judul Dokumen</label>
                        <input type="text" name="judul_dokumen" id="judul_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Dokumen (abaikan jika tidak ingin mengubah)</label>
                        <input type="file" name="file_dokumen" id="file_dokumen" class="form-control col-md-8">
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Kategori Informasi Publik</label>
                        <select name="kategori_informasi" id="kategori_informasi" class="form-control col-md-8" required>
                            <option value="">-- Pilih Kategori Informasi Publik</option>
                            @foreach (list_kategoriinformasipublik() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Status Informasi Publik</label>
                        <select name="status" id="status" class="form-control col-md-8" required>
                            <option value="">-- Pilih Status --</option>
                            @foreach (list_status() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Tahun</label>
                        <input type="year" name="tahun" id="tahun" maxlength="4" class="form-control col-md-8" required>
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
                var nama_dokumen = button.data('nama_dokumen')
                var judul_dokumen = button.data('judul_dokumen')
                var kategori_informasi = button.data('kategori_informasi')
                var tahun = button.data('tahun')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_dokumen').val(nama_dokumen);
                modal.find('.modal-body #judul_dokumen').val(judul_dokumen);
                modal.find('.modal-body #kategori_informasi').val(kategori_informasi);
                modal.find('.modal-body #tahun').val(tahun);
                modal.find('.modal-body #status').val(status);
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
