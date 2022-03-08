@extends('layouts.admin')

@section('title')
    Data {{ $judul }}
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data {{ $judul }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar {{ $judul }}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                @if (Auth::user()->level == 'penduduk')
                  <a href="{{ url('forumdiskusi') }}" class="btn btn-outline-secondary btn-sm pop-info" title="Kembali ke daftar forum"><i class="fas fa-angle-left"></i> Kembali</a>
                @else
                  <a href="{{ url('forum') }}" class="btn btn-outline-secondary btn-sm pop-info" title="Kembali ke daftar forum"><i class="fas fa-angle-left"></i> Kembali</a>
                @endif
                <a href="" class="btn btn-outline-info btn-sm pop-info" title="perbaharui"><i class="fas fa-sync"></i> Perbaharui Pesan</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 
                  <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header bg-info">
                  <h3 class="card-title font-weight-bold">{{ $forum->nama }}</h3>
                  <div class="card-tools">
                    <span title="3 New Messages" class="badge badge-primary">{{ count($diskusi) }}</span>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    @forelse ($diskusi as $item)
                        @php
                            $photo = ($item->profile_photo_path == NULL) ? 'img/chat.png' : 'img/user/'.$item->profile_photo_path
                        @endphp
                        @if ($item->user_id == $user->id)
                            {{-- chat untuk orang lain --}}
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left text-capitalize">{{ DbCikara::namapenduduk($item->user_id) }}</span>
                                <span class="direct-chat-timestamp float-right">{{ $item->created_at }}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="{{ asset($photo) }}" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    {{ $item->isi }}
                                </div>
                            </div>
                        @else
                             <!-- chat untuk saya -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right  text-capitalize">{{ DbCikara::namapenduduk($item->user_id) }}</span>
                                <span class="direct-chat-timestamp float-left">{{ $item->created_at }}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="{{ asset($photo) }}" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    {{ $item->isi }}
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                        @endif
                    @empty
                            <div class="text-center">
                                <p>belum ada diskusi</p>
                            </div>
                    @endforelse
                  </div>
                  <!--/.direct-chat-messages-->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <form action="{{ url('kirimpesandiskusi') }}" method="post">
                      @csrf
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                    <div class="input-group">
                      <input type="text" name="isi" placeholder="Ketik Pesan Disini..." class="form-control">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                      </span>
                    </div>
                  </form>
                </div>
                <!-- /.card-footer-->
              </div>
              <!--/.direct-chat -->
              </div>
            </div>
          </div>
        </div>
    </div>
  

    @endsection

