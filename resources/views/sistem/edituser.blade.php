<x-adminlte-layout title="edit user" menu="pengaturan">
    <x-slot name="header">
        <x-header judul="data user" active="pengaturan akun"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title"><i class="fas fa-users-cog"></i> Pengaturan Akun</h3>
                </div>
                <div class="card-body">
                    @include('sistem.notifikasi')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <section class="container">
                        <form action="{{ route('user.update','test')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="id" value="{{ $user->id}}">
                            <input type="hidden" name="level" value="{{ $user->level}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group p-2">
                                                <label for="">Nama Lengkap <strong class="text-danger">*</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-6">
                                            <div class="form-group">
                                                @if ($user->level == 'admin' || $user->level == 'staf')
                                                    @if ($user->level == 'admin')
                                                        <input type="text" name="name" value="{{ $user->name}}" class="form-control">
                                                    @else
                                                        <input type="text" name="name" value="{{ $user->name}}" class="form-control" readonly>
                                                    @endif
                                                @else
                                                    <input type="text" value="{{ DbCikara::datapenduduk($user->id,'id')->nama_penduduk}}" class="form-control" disabled>
                                                    <input type="hidden" name="name" value="{{ $user->name}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group p-2">
                                                <label for="">Email <strong class="text-danger">*</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="email" name="email" value="{{ $user->email}}" class="form-control" required>
                                                <small class="font-italic">email digunakan untuk login ke sistem</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <section class="container">
                                        @if (is_null($user->profile_photo_path))
                                            <img src="{{ asset('img/avatar.png')}}" alt="" class="img-fluid">
                                            <small>Ubah Photo</small>
                                        @else
                                            <img src="{{ asset('img/user/'.$user->profile_photo_path)}}" alt="" class="img-fluid">
                                        @endif
                                    </section>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="">Upload Photo untuk melakukan perubahan pada photo</label>
                                        <input type="file" class="form-control" name="profile_photo_path">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="callout callout-warning">
                                        <p>Abaikan Form Password jika tidak ingin dirubah</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group p-2">
                                                <label for="">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="******" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group p-2">
                                                <label for="">Ulangi Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" placeholder="******" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <hr>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                </div>
            </div>
            </div>
        </div>
    </x-slot>
</x-adminlte-layout>