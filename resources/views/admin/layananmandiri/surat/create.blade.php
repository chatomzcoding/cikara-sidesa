<x-adminlte-layout title="pembuatan surat" menu="suratlayananlangsung">
    <x-slot name="header">
        <x-header judul="data pembuatan surat" active="buat surat">
            <li class="breadcrumb-item"><a href="{{ url('suratpenduduk')}}">Daftar Surat</a></li>
        </x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ url('suratpenduduk') }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-angle-left"></i> Kembali </a>
                    <span class="btn btn-outline-info btn-sm float-right"><i class="fas fa-envelope"></i> Surat {{ $penduduksurat->formatsurat->nama_surat }}</span>
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('suratpenduduk/'.$penduduksurat->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="selesai">
                                    <input type="hidden" name="id" value="{{ $penduduksurat->id }}">
                                    <table width="100%">
                                        <tr>
                                            <td colspan="2">
                                                <div class="callout callout-warning">
                                                    Tanda <strong class="text-danger">*</strong> Wajib Diisi
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <td>: {{ $penduduksurat->nomor_surat }}</td>
                                        </tr>
                                        {{-- form looping --}}
                                        @foreach (json_decode($listformat->keterangan) as $item)
                                        <tr>
                                            <th width="30%">
                                                <div class="form-group pt-2 pb-0">
                                                    <label for="" class="text-capitalize">{{ $item->label }} <strong class="text-danger">*</strong></label>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="form-group">
                                                    @switch(form_view($item->key))
                                                        @case('nomor')
                                                            <input type="text" name="{{ $item->key }}" pattern="[0-9]{16}" maxlength="16" value="{{ valueform($main,$item->key) }}" class="form-control" required>
                                                            <span class="text-danger small font-italic">* jumlah 16 angka</span>
                                                        @break
                                                        @case('tanggal')
                                                            <input type="date" name="{{ $item->key }}" class="form-control" required>
                                                            @break
                                                        @case('waktu')
                                                            <input type="time" name="{{ $item->key }}" class="form-control" required>
                                                            @break
                                                        @case('angka')
                                                            <input type="number" name="{{ $item->key }}" min="1" class="form-control" required>
                                                            @break
                                                        @case('jk')
                                                            <select name="{{ $item->key }}" id="" class="form-control" required>
                                                                @foreach (list_jeniskelamin() as $item->key)
                                                                    <option value="{{ $item->key}}">{{ strtoupper($item->key) }}</option>
                                                                @endforeach
                                                            </select>
                                                            @break
                                                        @case('agama')
                                                            <select name="{{ $item->key }}" id="" class="form-control" required>
                                                                <option value="">-- pilih agama --</option>
                                                                @foreach (list_agama() as $item->key)
                                                                    <option value="{{ $item->key}}">{{ strtoupper($item->key) }}</option>
                                                                @endforeach
                                                            </select>
                                                            @break
                                                        @case('pekerjaan')
                                                            <select name="{{ $item->key }}" id="" class="form-control" required>
                                                                <option value="">-- pilih pekerjaan --</option>
                                                                @foreach (list_pekerjaan() as $item->key)
                                                                    <option value="{{ $item->key}}">{{ strtoupper($item->key) }}</option>
                                                                @endforeach
                                                            </select>
                                                            @break
                                                        @case('warganegara')
                                                            <select name="{{ $item->key }}" id="" class="form-control" required>
                                                                <option value="">-- Pilih Warga Negara --</option>
                                                                @foreach (list_statuskewarganegaraan() as $item->key)
                                                                    <option value="{{ $item->key}}">{{ strtoupper($item->key) }}</option>
                                                                @endforeach
                                                            </select>
                                                            @break
                                                        @default
                                                            <input type="text" name="{{ $item->key }}" value="{{ valueform($main,$item->key) }}" class="form-control" required>
                                                    @endswitch
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="">Berlaku dari <strong class="text-danger">*</strong></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="date" name="tgl_awal" value="{{ tgl_sekarang() }}" class="form-control col-md-8" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="">Berlaku sampai <strong class="text-danger">*</strong></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="date" name="tgl_akhir" value="{{ tgl_sekarang() }}" class="form-control col-md-8" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="">Ditandatangani oleh <strong class="text-danger">*</strong></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                      <select name="staf_id" class="form-control penduduk" data-width="100%" required>
                                                        @foreach ($main['staf'] as $item)
                                                        <option value="{{ $item->id }}">{{ strtoupper($item->nama_pegawai.' | '.$item->jabatan) }}</option>
                                                        @endforeach
                                                      </select>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right">
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> SIMPAN DATA SURAT</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </x-slot>
</x-adminlte-layout>