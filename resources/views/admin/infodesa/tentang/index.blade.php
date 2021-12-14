@extends('layouts.admin')

@section('title')
    Data Tentang Desa
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Tentang Desa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Informasi Seputar Desa</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
  
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- statistik -->
            <div class="card">
              {{-- <div class="card-header"> --}}
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
              {{-- </div> --}}
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <div class="row">
                    <div class="col-4">
                      <div class="list-group" id="list-tab" role="tablist">
                          @foreach ($info as $item)
                          <a class="list-group-item list-group-item-action @if ($loop->iteration == 1)
                          active
                          @endif" id="list-home-list" data-toggle="list" href="#list-{{ $item->id }}" role="tab" aria-controls="home">{{ strtoupper($item->nama) }}</a>
                          @endforeach
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="tab-content" id="nav-tabContent">
                          @foreach ($info as $item)
                              <div class="tab-pane fade @if ($loop->iteration == 1)
                                show active
                                @endif" id="list-{{ $item->id }}" role="tabpanel" aria-labelledby="list-home-list">
                                <header class="text-right">
                                    @if (aksesadmin())
                                      <a href="{{ url('info/'.$item->id.'/edit?page=tentang') }}" class="btn btn-success btn-sm btn-flat pop-info" title="Ubah Data {{ ucwords($item->nama) }}"><i class="fas fa-pen"></i> UBAH</a>
                                      @endif
                                    <span class="font-italic text-secondary small">diperbaharui pada tanggal {{ $item->updated_at }}</span>
                                </header>
                                <hr>
                                <section class="text-secondary">
                                  <figure>
                                    <img src="{{ asset('img/pengaturan/'.$item->gambar) }}" alt="" class="img-fluid">
                                  </figure>
                                    {!! $item->detail !!}
                                </section>
                            </div>
                          @endforeach
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection

