<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Inventaris {{ $inventaris}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Inventaris {{ $inventaris}}</li>
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
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kategori Inventaris</h3>
              </div>
              <div class="card-body">
                  <section class="mb-3">
                    <div class="list-group">
                        @foreach (list_inventaris() as $id => $nama)
                            <a href="{{ url('/inventaris/list/'.$id)}}" class="list-group-item list-group-item-action @if ($id == $kode)
                            list-group-item-primary
                            @endif">{{ $nama}}</a>
                        @endforeach
                    </div>
                  </section>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="{{ url('/inventaris/tambah/'.$kode)}}" class="btn btn-outline-primary btn-flat btn-sm"><i class="fas fa-plus"></i> Tambah Data </a>
                <a href="#" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-print"></i> Cetak</a>
                <a href="#" class="btn btn-outline-dark btn-flat btn-sm"><i class="fas fa-print"></i> Unduh</a>
                <a href="#" class="btn btn-outline-danger btn-flat btn-sm"><i class="fas fa-trash"></i> Aksi Data Terpilih</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        @switch($kode)
                            @case('tanah')
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Aksi</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang / Nomor Registrasi</th>
                                        <th>Luas (M2)</th>
                                        <th>Tahun Pengadaan</th>
                                        <th>Letak/Alamat</th>
                                        <th>Nomor Sertifikat</th>
                                        <th>Asal Usul</th>
                                        <th>Harga (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                    @forelse ($datainventaris as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration}}</td>
                                            <td class="text-center">
                                                <form id="data-{{ $item->id }}" action="{{url('/inventaris',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    </form>
                                                <a href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                                <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                            <td>{{ $item->nama_barang}}</td>
                                            <td>{{ $item->kode_barang}}</td>
                                            <td>{{ $item->luas_tanah}}</td>
                                            <td>{{ $item->tahun_pengadaan}}</td>
                                            <td>{{ $item->lokasi}}</td>
                                            <td>{{ $item->no_sertifikat}}</td>
                                            <td>{{ $item->asal_usul}}</td>
                                            <td>{{ $item->harga}}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="10">tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                    @break
                            @case('peralatan-mesin')
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2" width="5%">No</th>
                                    <th rowspan="2">Aksi</th>
                                    <th rowspan="2">Nama Barang</th>
                                    <th rowspan="2">Kode Barang / Nomor Registrasi</th>
                                    <th rowspan="2">Merk/Type</th>
                                    <th rowspan="2">Tahun Pembelian</th>
                                    <th colspan="2">Nomor</th>
                                    <th rowspan="2">Asal Usul</th>
                                    <th rowspan="2">Harga (Rp)</th>
                                </tr>
                                <tr>
                                    <th>Polisi</th>
                                    <th>BPKB</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($datainventaris as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/inventaris',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <a href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                            <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td>{{ $item->nama_barang}}</td>
                                        <td>{{ $item->kode_barang}}</td>
                                        <td>{{ $item->merk}}</td>
                                        <td>{{ $item->tahun_pengadaan}}</td>
                                        <td>{{ $item->nomor_polisi}}</td>
                                        <td>{{ $item->bpkb}}</td>
                                        <td>{{ $item->asal_usul}}</td>
                                        <td>{{ $item->harga}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="10">tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                                @break
                            @case('gedung-bangunan')
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2" width="5%">No</th>
                                    <th rowspan="2">Aksi</th>
                                    <th rowspan="2">Nama Barang</th>
                                    <th rowspan="2">Kode Barang / Nomor Registrasi</th>
                                    <th rowspan="2">Kondisi Bangunan (B, KB, RB)</th>
                                    <th rowspan="2">Letak/Lokasi</th>
                                    <th colspan="2">Dokumen Gedung</th>
                                    <th rowspan="2">Status Tanah</th>
                                    <th rowspan="2">Asal Usul</th>
                                    <th rowspan="2">Harga (Rp)</th>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nomor</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($datainventaris as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/inventaris',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <a href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>

                                            <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td>{{ $item->nama_barang}}</td>
                                        <td>{{ $item->kode_barang}}</td>
                                        <td>{{ $item->kondisi_bangunan}}</td>
                                        <td>{{ $item->lokasi}}</td>
                                        <td>{{ $item->tgl_dok_bangunan}}</td>
                                        <td>{{ $item->nomor_bangunan}}</td>
                                        <td>{{ $item->status_tanah}}</td>
                                        <td>{{ $item->asal_usul}}</td>
                                        <td>{{ $item->harga}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="11">tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                                @break
                            @case('jalan-irigasi-jaringan')
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2" width="5%">No</th>
                                    <th rowspan="2">Aksi</th>
                                    <th rowspan="2">Nama Barang</th>
                                    <th rowspan="2">Kode Barang / Nomor Registrasi</th>
                                    <th rowspan="2">Kondisi (B, KB, RB)</th>
                                    <th rowspan="2">Jenis Kontruksi</th>
                                    <th rowspan="2">Luas (m2)</th>
                                    <th colspan="2">Dokumen Kepemilikan</th>
                                    <th rowspan="2">Status Tanah</th>
                                    <th rowspan="2">Asal Usul</th>
                                    <th rowspan="2">Harga (Rp)</th>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nomor</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($datainventaris as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/inventaris',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <a href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>

                                            <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td>{{ $item->nama_barang}}</td>
                                        <td>{{ $item->kode_barang}}</td>
                                        <td>{{ $item->kondisi_bangunan}}</td>
                                        <td>{{ $item->kontruksi}}</td>
                                        <td>{{ $item->luas}}</td>
                                        <td>{{ $item->tgl_dok_kepemilikan}}</td>
                                        <td>{{ $item->no_kepemilikan}}</td>
                                        <td>{{ $item->status_tanah}}</td>
                                        <td>{{ $item->asal_usul}}</td>
                                        <td>{{ $item->harga}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="12">tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                                @break
                            @case('asset-tetap')
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Aksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang / Nomor Registrasi</th>
                                    <th>Jumlah</th>
                                    <th>Tahun Pembelian</th>
                                    <th>Asal Usul</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($datainventaris as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/inventaris',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <a href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>

                                            <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td>{{ $item->nama_barang}}</td>
                                        <td>{{ $item->kode_barang}}</td>
                                        <td>{{ $item->jumlah}}</td>
                                        <td>{{ $item->tahun_pengadaan}}</td>
                                        <td>{{ $item->asal_usul}}</td>
                                        <td>{{ $item->harga}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="9">tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                                @break
                            @case('kontruksi-pengerjaan')
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2" width="5%">No</th>
                                    <th rowspan="2">Aksi</th>
                                    <th rowspan="2">Nama Barang</th>
                                    <th rowspan="2">Fisik Bangunan (P, SP, D)</th>
                                    <th rowspan="2">Luas (M2)</th>
                                    <th colspan="2">Dokumen</th>
                                    <th rowspan="2">Tgl, Bln, Tahun Mulai</th>
                                    <th rowspan="2">Status Tanah</th>
                                    <th rowspan="2">Asal Usul Biaya</th>
                                    <th rowspan="2">Nilai Kontrak</th>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nomor</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($datainventaris as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/inventaris',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <a href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>

                                            <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td>{{ $item->nama_barang}}</td>
                                        <td>{{ $item->fisik_bangunan}}</td>
                                        <td>{{ $item->luas}}</td>
                                        <td>{{ $item->tgl_dok_bangunan}}</td>
                                        <td>{{ $item->nomor_bangunan}}</td>
                                        <td>{{ $item->tgl_mulai}}</td>
                                        <td>{{ $item->status_tanah}}</td>
                                        <td>{{ $item->asal_usul}}</td>
                                        <td>{{ $item->harga}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="11">tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                                @break
                            @default
                        @endswitch
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
            <form action="{{ url('/kelompok')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">Nama Kelompok</label>
                        <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control" placeholder="Nama Kelompok" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kode Kelompok</label>
                        <input type="text" id="kode_kelompok" name="kode_kelompok" class="form-control" placeholder="Kode Kelompok" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Ketua Kelompok</label>
                        <select name="penduduk_id" id="" class="form-control" required>
                            <option value="">-- Silahkan Masukkan NIK / Nama --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_penduduk}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="">Deskripsi Kelompok</label>
                        <textarea name="deskripsi_kelompok" id="deskripsi_kelompok" cols="30" rows="4" class="form-control"></textarea>
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
            <form action="{{ route('inventaris.update','test')}}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="logo_unit" value="">
            <div class="modal-header">
            <h4 class="modal-title">Edit Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">Nama Kelompok</label>
                        <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control" placeholder="Nama Kelompok" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kode Kelompok</label>
                        <input type="text" id="kode_kelompok" name="kode_kelompok" class="form-control" placeholder="Kode Kelompok" required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Kelompok</label>
                        <textarea name="deskripsi_kelompok" id="deskripsi_kelompok" cols="30" rows="4" class="form-control"></textarea>
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
                var nama_kelompok = button.data('nama_kelompok')
                var kode_kelompok = button.data('kode_kelompok')
                var penduduk_id = button.data('penduduk_id')
                var kategorikelompok_id = button.data('kategorikelompok_id')
                var deskripsi_kelompok = button.data('deskripsi_kelompok')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_kelompok').val(nama_kelompok);
                modal.find('.modal-body #kode_kelompok').val(kode_kelompok);
                modal.find('.modal-body #penduduk_id').val(penduduk_id);
                modal.find('.modal-body #kategorikelompok_id').val(kategorikelompok_id);
                modal.find('.modal-body #deskripsi_kelompok').val(deskripsi_kelompok);
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
