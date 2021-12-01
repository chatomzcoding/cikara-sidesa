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
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="{{ url('forumdiskusi') }}" class="btn btn-outline-secondary btn-sm pop-info" title="Kembali ke daftar forum"><i class="fas fa-angle-left"></i> Kembali</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 
                  <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ $forum->nama }}</h3>
  
                  <div class="card-tools">
                    <span title="3 New Messages" class="badge badge-primary">{{ count($diskusi) }}</span>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button> --}}
                    {{-- <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                      <i class="fas fa-comments"></i>
                    </button> --}}
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button> --}}
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    @forelse ($diskusi as $item)
                        @if ($item->user_id == $user->id)
                            {{-- chat untuk orang lain --}}
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">{{ DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk }}</span>
                                <span class="direct-chat-timestamp float-right">{{ $item->created_at }}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="{{ asset('img/chat.png') }}" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    {{ $item->isi }}
                                </div>
                            </div>
                        @else
                             <!-- chat untuk saya -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">{{ DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk }}</span>
                                <span class="direct-chat-timestamp float-left">{{ $item->created_at }}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="{{ asset('img/chat.png') }}" alt="message user image">
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
                      <input type="text" name="isi" placeholder="Ketik Pesan ..." class="form-control">
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
   
{{-- 
    @section('script')
          <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var isi = button.data('isi')
                var status = button.data('status')
                var kategori = button.data('kategori')
                var nama = button.data('nama')
                var tanggapan = button.data('tanggapan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #isi').val(isi);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #statusini').val(status);
                modal.find('.modal-body #kategori').val(kategori);
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #tanggapan').val(tanggapan);
                modal.find('.modal-body #id').val(id);
            })
          </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                // "buttons": ["excel", "pdf", "print"]
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
    @endsection --}}

    @endsection

