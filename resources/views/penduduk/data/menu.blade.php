<li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-heartbeat"></i>
      <p>
        Layanan Mandiri
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/layananmandiri/lapor')}}" class="nav-link">
          &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
          <p>Lapor Penduduk</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/layananmandiri/surat')}}" class="nav-link">
          &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
          <p>Surat Menyurat</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/forumdiskusi')}}" class="nav-link">
          &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
          <p>Forum Diskusi</p>
        </a>
      </li>
    </ul>
</li>