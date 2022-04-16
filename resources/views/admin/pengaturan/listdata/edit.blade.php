<x-adminlte-layout title="list data" menu="listdata">
    <x-slot name="header">
        <x-header judul="data list" active="daftar list"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Daftar List Data</h3>
                    {{-- {!! button_logall($log) !!} --}}
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                <div class="card-body">
                                    <section class="mb-1">
                                        <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data List" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah List Format Surat</a>
                                    </section>
                                    <form action="{{ route('listdata.update','test')}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="id" value="{{ $listdata->id }}">
                                        <input type="hidden" name="formatsurat" value="TRUE">
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Format Surat <span class="text-danger">*</span></label>
                                            <input type="text" id="nama" value="{{ $listdata->formatsurat->id.' | '.$listdata->formatsurat->nama_surat }}" class="form-control col-md-8" readonly>
                                       </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">Nama List <span class="text-danger">*</span></label>
                                            <input type="text" name="nama" id="nama" value="{{ $listdata->nama }}" class="form-control col-md-8" required>
                                       </div>
                                       <div class="form-group row">
                                            <label for="" class="col-md-4">Keterangan (opsional)</label>
                                            <textarea name="keterangan" id="" cols="30" rows="5" class="form-control">@foreach ($keterangan as $item)
{{ $item->key }} | {{ $item->label }} @
@endforeach
                                            </textarea>
                                       </div>
                                       <div class="form-group text-right">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                                       </div>
                                    </form>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </x-slot>
</x-adminlte-layout>