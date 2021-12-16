
<li class="nav-item @if ($menu == 'datacovid' || $menu == 'covid' || $menu == 'vaksinasi')
menu-is-opening menu-open
@endif">
    <a href="#" class="nav-link small small">
      <i class="nav-icon fas fa-heartbeat"></i>
      <p>
        Siaga Covid-19
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('covid') }}" class="nav-link small small {{ menuaktif($menu,'covid') }}">
          &nbsp;&nbsp;<i class="fas fa-lungs-virus nav-icon"></i>
          <p>Info Covid</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/vaksinasi')}}" class="nav-link small small {{ menuaktif($menu,'vaksinasi') }}">
          &nbsp;&nbsp;<i class="fas fa-syringe nav-icon"></i>
          <p>Vaksinasi</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/pemudik')}}" class="nav-link small small {{ menuaktif($menu,'datacovid') }}">
          &nbsp;&nbsp;<i class="fas fa-plane-arrival nav-icon"></i>
          <p>Data Pemudik</p>
        </a>
      </li>
    </ul>
</li>
<li class="nav-item @if ($menu == 'profil' || $menu == 'wilayah' || $menu == 'pemerintahdesa' || $menu == 'potensi' || $menu == 'tentang')
      menu-is-opening menu-open
@endif">
  
    <a href="#" class="nav-link small">
      <i class="nav-icon fas fa-landmark"></i>
      <p>
        Info Desa
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/profil')}}" class="nav-link small {{ menuaktif($menu,'profil') }}">
          &nbsp;&nbsp;<i class="far fa-id-card nav-icon"></i>
          <p>Identitas Desa</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/dusun')}}" class="nav-link small {{ menuaktif($menu,'wilayah') }}">
          &nbsp;&nbsp;<i class="far fa-map nav-icon"></i>
          <p>Wilayah Administratif</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/staf')}}" class="nav-link small {{ menuaktif($menu,'pemerintahdesa') }}">
          &nbsp;&nbsp;<i class="far fa-building nav-icon"></i>
          <p>Pemerintahan Desa</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/potensi')}}" class="nav-link small {{ menuaktif($menu,'potensi') }}">
          &nbsp;&nbsp;<i class="fas fa-campground nav-icon"></i>
          <p>Potensi Desa</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/info?page=tentang')}}" class="nav-link small {{ menuaktif($menu,'tentang') }}">
          &nbsp;&nbsp;<i class="fas fa-book-reader nav-icon"></i>
          <p>Tentang Desa</p>
        </a>
      </li>
    </ul>
</li>
<li class="nav-item @if ($menu == 'penduduk' || $menu == 'keluarga' || $menu == 'rumahtangga' || $menu == 'kelompok')
menu-is-opening menu-open
@endif">
    <a href="#" class="nav-link small">
      <i class="nav-icon fas fa-users"></i>
      <p>
        Kependudukan
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/penduduk')}}" class="nav-link small {{ menuaktif($menu,'penduduk') }}">
          &nbsp;&nbsp;<i class="far fa-id-badge nav-icon"></i>
          <p>Penduduk</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/keluarga')}}" class="nav-link small {{ menuaktif($menu,'keluarga') }}">
          &nbsp;&nbsp;<i class="far fa-address-card nav-icon"></i>
          <p>Keluarga</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/rumahtangga')}}" class="nav-link small {{ menuaktif($menu,'rumahtangga') }}">
          &nbsp;&nbsp;<i class="fas fa-house-user nav-icon"></i>
          <p>Rumah Tangga</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/kelompok')}}" class="nav-link small {{ menuaktif($menu,'kelompok') }}">
          &nbsp;&nbsp;<i class="fas fa-user-friends nav-icon"></i>
          <p>Kelompok</p>
        </a>
      </li>
    </ul>
</li>
<li class="nav-item @if ($menu == 'statistikpenduduk' || $menu == 'laporanbulanan' || $menu == 'laporankelompok')
menu-is-opening menu-open
@endif">
    <a href="#" class="nav-link small">
      <i class="nav-icon fas fa-chart-line"></i>
      <p>
        Statistik
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/statistik/kependudukan/penduduk/pendidikan-dalam-kk')}}" class="nav-link small {{ menuaktif($menu,'statistikpenduduk') }}">
          &nbsp;&nbsp;<i class="fas fa-chart-area nav-icon"></i>
          <p>Statistik Kependudukan</p>
        </a>
      </li>
    </ul>
</li>
<li class="nav-item @if ($menu == 'informasipublik' || $menu == 'inventaris' || $menu == 'klasifikasisurat')
menu-is-opening menu-open
@endif">
    <a href="#" class="nav-link small">
      <i class="nav-icon fas fa-archive"></i>
      <p>
        Sekretariat
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/informasipublik')}}" class="nav-link small {{ menuaktif($menu,'informasipublik') }}">
          &nbsp;&nbsp;<i class="fas fa-book-open nav-icon"></i>
          <p>Informasi Publik</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/inventaris/list/tanah')}}" class="nav-link small {{ menuaktif($menu,'inventaris') }}">
          &nbsp;&nbsp;<i class="fas fa-car nav-icon"></i>
          <p>Inventaris</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/klasifikasisurat')}}" class="nav-link small {{ menuaktif($menu,'klasifikasisurat') }}">
          &nbsp;&nbsp;<i class="fas fa-boxes nav-icon"></i>
          <p>Klasifikasi Surat</p>
        </a>
      </li>
    </ul>
</li>
<li class="nav-item @if ($menu == 'formatsurat' || $menu == 'syaratsurat')
menu-is-opening menu-open
@endif">
    <a href="#" class="nav-link small">
      <i class="nav-icon fas fa-envelope-open"></i>
      <p>
        Layanan Surat
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/formatsurat')}}" class="nav-link small {{ menuaktif($menu,'formatsurat') }}">
          &nbsp;&nbsp;<i class="fas fa-mail-bulk nav-icon"></i>
          <p>Pengaturan Surat</p>
        </a>
      </li>
     
      <li class="nav-item">
        <a href="{{ url('datasyaratsurat') }}" class="nav-link small {{ menuaktif($menu,'syaratsurat') }}">
          &nbsp;&nbsp;<i class="fas fa-file-alt nav-icon"></i>
          <p>Daftar Persyaratan</p>
        </a>
      </li>
    </ul>
</li>

<li class="nav-item">
  <a href="{{ url('/bantuan')}}" class="nav-link small {{ menuaktif($menu,'bantuan') }}">
    <i class="nav-icon fas fa-people-carry"></i>
    <p class="text">Bantuan</p>
  </a>
</li>
<li class="nav-item @if ($menu == 'laporpenduduk' || $menu == 'lapakdesa' || $menu == 'forumpenduduk' || $menu == 'suratpenduduk' || $menu == 'layananpenduduk' || $menu == 'layanankk' || $menu == 'layanancovid')
menu-is-opening menu-open
@endif">
  <a href="#" class="nav-link small">
    <i class="nav-icon fas fa-map-marked-alt"></i>
    <p class="text">
      Layanan Mandiri
      <i class="fas fa-angle-left right"></i>
      {{-- <span class="badge badge-info right">6</span> --}}
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('/lapor')}}" class="nav-link small {{ menuaktif($menu,'laporpenduduk') }}">
        &nbsp;&nbsp;<i class="fas fa-file-signature nav-icon"></i>
        <p>Laporan Penduduk</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/tampilan/lapak')}}" class="nav-link small {{ menuaktif($menu,'lapakdesa') }}">
        &nbsp;&nbsp;<i class="fas fa-store nav-icon"></i>
        <p>Lapak Desa</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/forum')}}" class="nav-link small {{ menuaktif($menu,'forumpenduduk') }}">
        &nbsp;&nbsp;<i class="fas fa-comment-dots nav-icon"></i>
        <p>Forum</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/suratpenduduk')}}" class="nav-link small {{ menuaktif($menu,'suratpenduduk') }}">
        &nbsp;&nbsp;<i class="fas fa-envelope-open-text nav-icon"></i>
        <p>Surat</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item @if ($menu == 'datapokok' || $menu == 'datauser' || $menu == 'artikel' || $menu == 'galeri' || $menu == 'slider' || $menu == 'berjalan')
menu-is-opening menu-open
@endif">
  <a href="#" class="nav-link small">
    <i class="nav-icon fas fa-desktop"></i>
    <p>
      Admin Web
      <i class="fas fa-angle-left right"></i>
      {{-- <span class="badge badge-info right">6</span> --}}
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('/datapokok')}}" class="nav-link small {{  menuaktif($menu,'datapokok') }}">
        &nbsp;&nbsp;<i class="fas fa-folder nav-icon"></i>
        <p>Data Pokok</p>
      </a>
    </li>
      <li class="nav-item">
        <a href="{{ url('/user')}}" class="nav-link small {{  menuaktif($menu,'datauser') }}">
          &nbsp;&nbsp;<i class="fas fa-user nav-icon"></i>
          <p>Data User</p>
        </a>
      </li>
    <li class="nav-item">
      <a href="{{ url('/artikel')}}" class="nav-link small {{  menuaktif($menu,'artikel') }}">
        &nbsp;&nbsp;<i class="fas fa-file-alt nav-icon"></i>
        <p>Artikel</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/galeri')}}" class="nav-link small {{  menuaktif($menu,'galeri') }}">
        &nbsp;&nbsp;<i class="fas fa-images nav-icon"></i>
        <p>Galeri</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/slider')}}" class="nav-link small {{ menuaktif($menu,'slider') }}">
        &nbsp;&nbsp;<i class="fas fa-image nav-icon"></i>
        <p>Slider</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('info?page=teksberjalan') }}" class="nav-link small {{ menuaktif($menu,'berjalan') }}">
        &nbsp;&nbsp;<i class="fas fa-list-alt nav-icon"></i>
        <p>Teks Berjalan</p>
      </a>
    </li>
  </ul>
</li>