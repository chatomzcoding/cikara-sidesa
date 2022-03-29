@if (session('danger'))
<div class="callout callout-danger">
    <p>{{ session('danger') }}</p>
  </div>
@endif
@if (session('success'))
<div class="callout callout-success">
    <p>{{ session('success') }}</p>
  </div>
@endif
@if (session('cetak'))
<div class="callout callout-success">
  <h4>Surat berhasil dibuat, silahkan cetak surat</h4>
    <a href="{{ url('cetaksuratlangsung/'.session('cetak')) }}" class="btn btn-primary btn-info">CETAK SURAT</a>
  </div>
@endif
@if (session('succesalert'))
<div class="alert alert-success">
    <p>{{ session('succesalert') }}</p>
  </div>
@endif
@if (session('info'))
<div class="callout callout-info">
    <p>{{ session('info') }}</p>
  </div>
@endif
@if (session('warning'))
<div class="callout callout-warning">
    <p>{{ session('warning') }}</p>
  </div>
@endif
@if (session('secondary'))
<div class="callout callout-secondary">
    <p>{{ session('secondary') }}</p>
  </div>
@endif

{{-- notifikasi data berhasil di simpan --}}
@if (session('ds'))
<div class="callout callout-success">
    <h5>Berhasil!</h5>
    <p>Data {{ session('ds') }} telah ditambahkan.</p>
  </div>
@endif
@if (session('dsc'))
<div class="callout callout-success">
    <h5>Berhasil!</h5>
    <p>{{ session('dsc') }}</p>
  </div>
@endif

{{-- notifikasi data berhasil di update --}}
@if (session('du'))
<div class="callout callout-info">
    <h5>Berhasil!</h5>
    <p>Data {{ session('du') }} telah diperbaharui.</p>
  </div>
@endif
@if (session('duc'))
<div class="callout callout-info">
    <h5>Berhasil!</h5>
    <p>{{ session('duc') }}</p>
  </div>
@endif

{{-- notifikasi data berhasil di hapus --}}
@if (session('dd'))
<div class="callout callout-danger">
    <h5>Berhasil!</h5>
    <p>Data {{ session('dd') }} telah dihapus.</p>
  </div>
@endif
@if (session('ddc'))
<div class="callout callout-danger">
    <h5>Berhasil!</h5>
    <p>{{ session('ddc') }}</p>
  </div>
@endif
@if ($errors->any())
    <div class="callout callout-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ custom_notif($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif