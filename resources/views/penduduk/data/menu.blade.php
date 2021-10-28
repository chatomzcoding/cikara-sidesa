<li class="nav-item @if ($menu == 'lapor' || $menu == 'surat' || $menu == 'diskusi')
    menu-is-opening menu-open
@endif "> 
    <a href="#" class="nav-link small">
      <i class="nav-icon fas fa-heartbeat"></i>
      <p>
        Layanan Mandiri
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/layananmandiri/lapor')}}" class="nav-link small {{ menuaktif($menu,'lapor') }}">
          &nbsp;&nbsp;<i class="fas fa-file-signature nav-icon"></i>
          <p>Lapor Penduduk</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/layananmandiri/surat')}}" class="nav-link small {{ menuaktif($menu,'surat') }}">
          &nbsp;&nbsp;<i class="fas fa-envelope-open-text nav-icon"></i>
          <p>Surat Menyurat</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/forumdiskusi')}}" class="nav-link small {{ menuaktif($menu,'diskusi') }}">
          &nbsp;&nbsp;<i class="fas fa-comment-dots nav-icon"></i>
          <p>Forum Diskusi</p>
        </a>
      </li>
    </ul>
</li>
<li class="nav-item">
  <a href="{{ url('/produk')}}" class="nav-link small {{ menuaktif($menu,'produk') }}">
    <i class="fas fa-cube nav-icon"></i>
    <p>Produk</p>
  </a>
</li>