<x-adminlte-layout title="Data Surat Keluar">
    <x-slot name="header">
        <x-header judul="Data Surat Keluar" p="Form Surat Keluar {{ $formatsurat->nama_surat }}" active="Buat Surat Keluar"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ url('suratkeluar') }}" class="btn btn-secondary btn-sm btn-flat"><i class="fas fa-angle-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                      @if ($formatsurat->format == 'upcpk')
                        <section>
                            <div class="form-group row">
                                <label for="" class="col-md-4">Pilih Penduduk</label>
                                <div class="col-md-8 p-0">
                                    <form action="" method="get">
                                        <input type="hidden" name="id" value="{{ $formatsurat->id }}">
                                        <select name="penduduk_id" data-width="100%" class="form-control penduduk" onchange="this.form.submit()" required>
                                            <option value="">-- Pilih Penduduk --</option>
                                            @foreach ($penduduk as $item)
                                                <option value="{{ $item->id}}" @if($main['id'] == $item->id)
                                                    selected
                                                @endif>{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            </section>
                      @endif
                     
                        <main>
                            <form action="{{ url('datasuratkeluar') }}" method="post">
                                @csrf
                                <input type="hidden" name="formatsurat_id" value="{{ $formatsurat->id }}">
                                <section>
                                    @switch($formatsurat->format)
                                        @case('upcpk')
                                          <hr>
                                            @if (!is_null($main['id']))
                                                @include('admin.sekretariat.suratkeluar.format.upcpk')
                                            @endif
                                              @break
                                          @case('undangan')
                                            @include('admin.sekretariat.suratkeluar.format.undangan')
                                              @break
                                          @default
                                              
                                      @endswitch
                                  </section>
                                <section class="text-right">
                                    <button type="submit" class="btn btn-primary btn-flat">BUAT SURAT</button>
                                </section>
                            </form>
                        </main>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </x-slot>
</x-adminlte-layout>