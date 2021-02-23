<li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-file-signature"></i>
      <p>
        Transaksi Kas
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/bumdes/jurnal/pemasukan')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Pemasukan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/bumdes/jurnal/pengeluaran')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Pengeluaran</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/bumdes/jurnal/semua')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Semua</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-file-invoice"></i>
      <p>
        Laporan
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/laporankeuangan/neraca')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Neraca</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/laporankeuangan/neracalajur')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Neraca Lajur</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/laporankeuangan/labarugi')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Laba Rugi</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/laporanbukubesar/cari')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Buku Besar</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Buku Besar Pembantu</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Alokasi Laba</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Laporan Arus Kas</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Laporan Perubahan Modal</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-cog"></i>
      <p>
        Data Master
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/laporan')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Laporan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/daftarakun')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Kode Akun</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/daftarakunpembantu')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Kode Akun Pembantu</p>
        </a>
      </li>
    </ul>
  </li>