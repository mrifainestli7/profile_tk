<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/berita*') ? 'active' : '' }}" aria-current="page" href="{{ route('berita.index') }}">
            <span data-feather="home" class="align-text-bottom"></span>
            Berita
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/prestasi*') ? 'active' : '' }}" href="{{ route('prestasi.index') }}" href="{{ route('prestasi.index') }}">
            <span data-feather="award" class="align-text-bottom"></span>
            Prestasi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/mapel*') ? 'active' : '' }}" href="{{ route('mapel.index') }}" href="{{ route('mapel.index') }}">
            <span data-feather="book" class="align-text-bottom"></span>
            Kurikulum
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/guru*') ? 'active' : '' }}" href="{{ route('guru.index') }}" href="{{ route('guru.index') }}">
            <span data-feather="users" class="align-text-bottom"></span>
            Guru
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/kelas*') ? 'active' : '' }}" href="{{ route('kelas.index') }}" href="{{ route('kelas.index') }}">
            <span data-feather="users" class="align-text-bottom"></span>
            Kelas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/galeri*') ? 'active' : '' }}" href="{{ route('galeri.index') }}" href="{{ route('galeri.index') }}">
            <span data-feather="book" class="align-text-bottom"></span>
            Galeri Foto
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/link_form_pendaftaran*') ? 'active' : '' }}" href="{{ route('link_form_pendaftaran.index') }}" href="{{ route('link_form_pendaftaran.index') }}">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Link Form Pendaftaran
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="/logout">
            <span data-feather="layers" class="align-text-bottom"></span>
            Log-out
          </a>
        </li>
      </ul>

    </div>
  </nav>