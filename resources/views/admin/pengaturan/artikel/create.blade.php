<x-adminlte-layout title="artikel" menu="artikel">
    <x-slot name="header">
        <x-header judul="data artikel" active="tambah artikel baru">
            <li class="breadcrumb-item"><a href="{{ url('artikel')}}">Daftar Artikel</a></li>
        </x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header">
                    <a href="{{ url('/artikel')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="kembali ke daftar artikel"><i class="fas fa-angle-left"></i> Kembali</a>
                    
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <section>
                            <form action="{{ url('/artikel')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Judul Artikel <span class="text-danger">*</span></label>
                                    <input type="text" name="judul_artikel" id="judul_artikel" class="form-control col-md-8" value="{{ old('judul_artikel')}}" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Kategori Artikel <span class="text-danger">*</span></label>
                                    <select name="kategoriartikel_id" id="" class="form-control col-md-8" required>
                                        <option value="">-- Pilih Kategori Artikel --</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id}}">{{ strtoupper($item->nama_kategori)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Gambar Artikel (opsional)</label>
                                    <input type="file" name="gambar_artikel" id="judul_artikel" class="form-control col-md-8">
                                </div>
                                <div class="form-group">
                                    <label for="">isi artikel</label>
                                    <textarea name="isi_artikel" id="isi_artikel" cols="30" rows="10" required>{{ old('isi_artikel') }}</textarea>
                                </div>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor 4
                                    // instance, using default configuration.
                                    CKEDITOR.replace('isi_artikel', {
                                    width: '100%',
                                    height: 300
                                    });
                                </script>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> POSTING ARTIKEL</button>
                                    {!! viewLogAktif() !!}
                                </div>
                            </form>
                      </section>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="kodejs">

    </x-slot>
</x-adminlte-layout>

