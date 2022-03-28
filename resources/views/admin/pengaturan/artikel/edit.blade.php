<x-adminlte-layout title="artikel" menu="artikel">
    <x-slot name="header">
        <x-header judul="data artikel" active="edit artikel">
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
                    <a href="{{ url('/artikel')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar artikel"><i class="fas fa-angle-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <section>
                            <form action="{{ url('/artikel/'.$artikel->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Judul Artikel <span class="text-danger">*</span></label>
                                    <input type="text" name="judul_artikel" id="judul_artikel" class="form-control col-md-8" value="{{ $artikel->judul_artikel}}" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Kategori Artikel <span class="text-danger">*</span></label>
                                    <select name="kategoriartikel_id" id="" class="form-control col-md-8">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id}}" @if ($item->id == $artikel->kategoriartikel_id)
                                                selected
                                            @endif>{{ strtoupper($item->nama_kategori)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Gambar Artikel</label>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/pengaturan/artikel/'.$artikel->gambar_artikel) }}" alt="" width="100%">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">upload gambar jika ingin merubah</label>
                                        <input type="file" name="gambar_artikel" id="judul_artikel" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">isi artikel <span class="text-danger">*</span></label>
                                    <textarea name="isi_artikel" id="isi_artikel" cols="30" rows="10">{{ $artikel->isi_artikel}}</textarea>
                                </div>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor 4
                                    // instance, using default configuration.
                                    CKEDITOR.replace('isi_artikel', {
                                    width: '100%',
                                    height: 350
                                    });
                                </script>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
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

    

