<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  
    <div class="position-sticky pt-3 sidebar-sticky">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Menu Utama</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Overview
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/task*') ? 'active' : '' }}" href="/dashboard/task">
            <span data-feather="book" class="align-text-bottom"></span>
            Permintaan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/history*') ? 'active' : '' }}" href="/dashboard/history">
            <span data-feather="refresh-cw" class="align-text-bottom"></span>
            History
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/mail*') ? 'active' : '' }}" href="/dashboard/mail">
            <span data-feather="message-square" class="align-text-bottom"></span>
            Surat
          </a>
        </li>
      </ul>

      {{-- @can('admin') --}}

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Master Data</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/bisnis*') ? 'active' : '' }}" href="/dashboard/bisnis">
            <span data-feather="activity" class="align-text-bottom"></span>
            Bisnis
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/platform*') ? 'active' : '' }}" href="/dashboard/platform">
            <span data-feather="package" class="align-text-bottom"></span>
            Platform
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/gruplayanan*') ? 'active' : '' }}" href="/dashboard/gruplayanan">
            <span data-feather="plus-square" class="align-text-bottom"></span>
            Group Layanan
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/layanan*') ? 'active' : '' }}" href="/dashboard/layanan">
            <span data-feather="phone" class="align-text-bottom"></span>
            Layanan
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/status*') ? 'active' : '' }}" href="/dashboard/status">
            <span data-feather="bell" class="align-text-bottom"></span>
            Status
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          {{-- <a class="nav-link  {{ Request::is('dashboard/dokumentasi*') ? 'active' : '' }}" href="/dashboard/dokumentasi"> --}}
          <a class="nav-link  disabled" href="/dashboard/dokumentasi">
            <span data-feather="archive" class="align-text-bottom"></span>
            Dokumentasi
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          {{-- <a class="nav-link  {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user"> --}}
          <a class="nav-link  disabled" href="/dashboard/user">
            <span data-feather="user" class="align-text-bottom"></span>
            User
          </a>
        </li>
      </ul>

      {{-- @endcan --}}

    </div>
  </nav>