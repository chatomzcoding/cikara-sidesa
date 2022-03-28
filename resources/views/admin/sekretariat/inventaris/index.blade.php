<x-adminlte-layout title="data inventaris" menu="inventaris">
    <x-slot name="header">
        <x-header judul="Data Inventaris {{ $inventaris}}" active="Daftar Inventaris {{ $inventaris}}"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header bg-secondary">
                    <h3 class="card-title">Kategori Inventaris</h3>
                  </div>
                  <div class="card-body">
                      <section class="mb-3">
                        <div class="list-group">
                            @foreach (list_inventaris() as $id => $nama)
                                <a href="{{ url('/inventaris/list/'.$id)}}" class="list-group-item list-group-item-action @if ($id == $kode)
                                list-group-item-primary
                                @endif">{{ ucwords($nama)}}</a>
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
                    <a href="{{ url('/inventaris/tambah/'.$kode)}}" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data {{ $inventaris}}"><i class="fas fa-plus"></i> Tambah</a>
                    <a href="#" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Daftar {{ $inventaris }}"><i class="fas fa-print"></i> CETAK</a>
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
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                            <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                              <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu">
                                                              <a class="dropdown-item text-success" href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Edit Data</a>
                                                              <div class="dropdown-divider"></div>
                                                              <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                            </div>
                                                        </div>
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
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                        <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                          <a class="dropdown-item text-success" href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Edit Data</a>
                                                          <div class="dropdown-divider"></div>
                                                          <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                        </div>
                                                    </div>
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
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                        <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                          <a class="dropdown-item text-success" href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Edit Data</a>
                                                          <div class="dropdown-divider"></div>
                                                          <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                        </div>
                                                    </div>
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
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                        <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                          <a class="dropdown-item text-success" href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Edit Data</a>
                                                          <div class="dropdown-divider"></div>
                                                          <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                        </div>
                                                    </div>
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
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                        <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                          <a class="dropdown-item text-success" href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Edit Data</a>
                                                          <div class="dropdown-divider"></div>
                                                          <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                        </div>
                                                    </div>
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
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                        <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                          <a class="dropdown-item text-success" href="{{ url('/inventaris/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Edit Data</a>
                                                          <div class="dropdown-divider"></div>
                                                          <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                        </div>
                                                    </div>
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
    </x-slot>
    <x-slot name="kodejs">
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
    </x-slot>
</x-adminlte-layout>