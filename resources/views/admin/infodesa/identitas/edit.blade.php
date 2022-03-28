<x-adminlte-layout title="ubah data desa" menu="profil">
    <x-slot name="header">
        <x-header judul="identitas desa" active="ubah identitas desa"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/profil')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke Profil Desa"><i class="fas fa-angle-left"></i> Kembali</a>
                    </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <div class="row">
                        {{-- <div class="col-md-4">
        
                        </div> --}}
                        <div class="col-md-12">
                            <form action="{{ url('/profil/'.$profil->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr class="table-info">
                                            <th colspan="3">DESA</th>
                                        </tr>
                                        <tr>
                                            <th width="30%">Nama Desa</th>
                                            <td width="1%">:</td>
                                            <td><input type="text" name="nama_desa" value="{{ $profil->nama_desa}}" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Desa</th>
                                            <td>:</td>
                                            <td><input type="text" name="kode_desa" value="{{ $profil->kode_desa}}" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Pos Desa</th>
                                            <td>:</td>
                                            <td><input type="text" name="kode_pos" value="{{ $profil->kode_pos}}" class="form-control" maxlength="5" required></td>
                                        </tr>
                                        <tr>
                                            <th>Kepala Desa</th>
                                            <td>:</td>
                                            <td><input type="text" name="kepala_desa" value="{{ $profil->kepala_desa}}" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th>NIP Kepala Desa</th>
                                            <td>:</td>
                                            <td><input type="text" name="nip_kepaladesa" value="{{ $profil->nip_kepaladesa}}" maxlength="16" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Kantor Desa</th>
                                            <td>:</td>
                                            <td>
                                                <textarea name="alamat" id="" class="form-control" cols="30" rows="3" required>{{ $profil->alamat}}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>E-mail Kantor</th>
                                            <td>:</td>
                                            <td><input type="email" name="email" value="{{ $profil->email}}" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Telepon Desa</th>
                                            <td>:</td>
                                            <td><input type="text" name="telepon" value="{{ $profil->telepon}}" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Website Desa</th>
                                            <td>:</td>
                                            <td><input type="url" name="website" value="{{ $profil->website}}" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Kecamatan</th>
                                            <td>:</td>
                                            <td><input type="text" name="nama_kecamatan" value="{{ $profil->nama_kecamatan}}" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Kecamatan</th>
                                            <td>:</td>
                                            <td><input type="text" name="kode_kecamatan" value="{{ $profil->kode_kecamatan}}" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Camat</th>
                                            <td>:</td>
                                            <td><input type="text" name="nama_camat" value="{{ $profil->nama_camat}}" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th>NIP Camat</th>
                                            <td>:</td>
                                            <td><input type="text" name="nip_camat" value="{{ $profil->nip_camat}}" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Kabupaten</th>
                                            <td>:</td>
                                            <td><input type="text" name="nama_kabupaten" value="{{ $profil->nama_kabupaten}}" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Kabupaten</th>
                                            <td>:</td>
                                            <td><input type="text" name="kode_kabupaten" value="{{ $profil->kode_kabupaten}}" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Provinsi</th>
                                            <td>:</td>
                                            <td><input type="text" name="provinsi" value="{{ $profil->provinsi}}" class="form-control" required></td>
        
                                        </tr>
                                        <tr>
                                            <th>Kode Provinsi</th>
                                            <td>:</td>
                                            <td><input type="text" name="kode_provinsi" value="{{ $profil->kode_provinsi}}" class="form-control" required></td>
                                        </tr>
                                    </table>
                                    <section>
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                                        </div>
                                    </section>
                                  </div>
                            </form>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </x-slot>
</x-adminlte-layout>
