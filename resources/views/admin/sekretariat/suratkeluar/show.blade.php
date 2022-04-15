<x-adminlte-layout title="Data Surat Keluar">
    <x-slot name="header">
        <x-header judul="Data Surat Keluar" p="Detail Surat {{ $suratkeluar->formatsurat->nama_surat }} | Nomor Surat : {{ $suratkeluar->nomor_surat }}" active="Detail Surat Keluar"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ url('suratkeluar') }}" class="btn btn-secondary btn-sm btn-flat"><i class="fas fa-angle-left"></i> Kembali</a>
                    <a href="{{ url('suratkeluar/create?id='.$suratkeluar->formatsurat->id) }}" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-plus"></i> Buat {{ strtoupper($suratkeluar->formatsurat->nama_surat) }}</a>
                    @if ($suratkeluar->konfirmasi == 'selesai')
                        <a href="#" data-toggle="modal" data-target="#cetak" class="float-right btn btn-info btn-sm btn-flat">CETAK SURAT</a>
                    @else
                        <span class="float-right badge badge-warning p-2">Surat perlu di konfirmasi oleh {{ $suratkeluar->konfirmasi }} !</span>                        
                    @endif
                  </div>
                  <div class="card-body">
                        <main>
                            <section>
                                @php
                                    $isi = json_decode($suratkeluar->isi)
                                @endphp
                                <section>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="20%">Nama Surat</th>
                                            <td width="3%">:</td>
                                            <td class="text-uppercase">{{ $suratkeluar->formatsurat->nama_surat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <td>:</td>
                                            <td>{{ $suratkeluar->nomor_surat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Dibuat</th>
                                            <td>:</td>
                                            <td>{{ $suratkeluar->created_at }}</td>
                                        </tr>
                                        <tr class="table-info">
                                            <th colspan="3">isi dalam surat</th>
                                        </tr>
                                        @switch($suratkeluar->formatsurat->format)
                                            @case('upcpk')
                                                    @include('admin.sekretariat.suratkeluar.show.upcpk')
                                                    @break
                                            @case('undangan')
                                                    @include('admin.sekretariat.suratkeluar.show.undangan')
                                                    @break
                                                @default
                                        @endswitch
                                    </table>
                                </section>
                        </main>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="modal fade" id="cetak">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form target="_blank" action="{{ url('/datasuratkeluar/'.$suratkeluar->id)}}" method="get">
                  @csrf
                  <input type="hidden" name="s" value="cetak">
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
                              <option value="{{ $item->id}}">{{ strtoupper($item->nama_pegawai.' | '.$item->jabatan)}}</option>
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
</x-adminlte-layout>