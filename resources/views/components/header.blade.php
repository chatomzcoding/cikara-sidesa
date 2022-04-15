<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">{{ $judul ?? '' }}</h1>
      @if ($p <> '')
        <p>{{ $p }}</p>
      @endif
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
        {{ $slot }}
        <li class="breadcrumb-item active">{{ $active ?? '' }}</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->