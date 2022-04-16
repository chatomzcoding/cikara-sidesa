<x-adminlte-layout title="Data Layanan Surat Langsung">
    <x-slot name="header">
        <x-header judul="Data Surat Layanan Langsung" p="Form Surat {{ $formatsurat->nama_surat }}" active="Buat Layanna Surat Langsung"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ url('suratpenduduk?layanan=langsung') }}" class="btn btn-secondary btn-sm btn-flat"><i class="fas fa-angle-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                        <section>
                            <form action="" method="get">
                                <input type="hidden" name="id" value="{{ $formatsurat->id }}">
                            <div class="form-group row">
                                <label for="" class="col-md-4 p-2">Pilih Penduduk</label>
                                <div class="col-md-8 p-0">
                                        <select name="penduduk_id" data-width="100%" class="form-control penduduk" onchange="this.form.submit()" required>
                                            <option value="">-- Pilih Penduduk --</option>
                                            @foreach ($penduduk as $item)
                                                <option value="{{ $item->id}}" @if($main['penduduk_id'] == $item->id)
                                                    selected
                                                @endif>{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                            </section>
                        <main>
                            <section>
                                @if (!is_null($main['penduduk_id']))
                                    @switch($formatsurat->format)
                                        @case('k-pengantar')
                                        @include('admin.layananmandiri.surat.format.k-pengantar')
                                        @break
                                        @default
                                    @endswitch
                                    @include('admin.layananmandiri.surat.format.penduduk')
                                    @include('admin.layananmandiri.surat.format.format')
                                @endif
                            </section>
                        </main>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </x-slot>
</x-adminlte-layout>