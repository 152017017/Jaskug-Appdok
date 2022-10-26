<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <a class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fa fa-laptop" aria-hidden="true"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Appdok</div>
  </a>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
    <div class="sidebar-heading">
      Menu Utama
    </div>
      <ul class="navbar-nav flex-column" id="accordionSidebar">
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="fa fa-th-large" aria-hidden="true"></i>
            Overview
          </a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/task*') ? 'active' : '' }}">
          <a class="nav-link  {{ Request::is('dashboard/task*') ? 'active' : '' }}" href="/dashboard/task">
            <i class="fa fa-book" aria-hidden="true"></i>
            Permintaan
          </a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/history*') ? 'active' : '' }}">
          <a class="nav-link  {{ Request::is('dashboard/history*') ? 'active' : '' }}" href="/dashboard/history">
            <i class="fa fa-history" aria-hidden="true"></i>
            History
          </a>
        </li>
        {{-- <li class="nav-item {{ Request::is('dashboard/mail*') ? 'active' : '' }}">
          <a class="nav-link  {{ Request::is('dashboard/mail*') ? 'active' : '' }} disabled" href="/dashboard/mail">
            <i class="fa fa-commenting" aria-hidden="true"></i>
            Surat
          </a>
        </li> --}}
      </ul>
      {{-- @can(['operator', 'admin']) --}}
      <div class="sidebar-heading">
        Master Data
      </div>
      <ul class="navbar-nav flex-column" id="accordionSidebar">
        <li class="nav-item {{ Request::is('dashboard/bisnis*') ? 'active' : '' }}">
          <a class="nav-link {{ Request::is('dashboard/bisnis*') ? 'active' : '' }}" href="/dashboard/bisnis">
            <i class="fa fa-line-chart" aria-hidden="true"></i>
            Bisnis
          </a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/platform*') ? 'active' : '' }}">
          <a class="nav-link {{ Request::is('dashboard/platform*') ? 'active' : '' }}" href="/dashboard/platform">
            <i class="fa fa-cubes" aria-hidden="true"></i>
            Platform
          </a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/gruplayanan*') ? 'active' : '' }}">
          <a class="nav-link {{ Request::is('dashboard/gruplayanan*') ? 'active' : '' }}" href="/dashboard/gruplayanan">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            Group Layanan
          </a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/layanan*') ? 'active' : '' }}">
          <a class="nav-link {{ Request::is('dashboard/layanan*') ? 'active' : '' }}" href="/dashboard/layanan">
            <i class="fa fa-phone" aria-hidden="true"></i>
            Layanan
          </a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/status*') ? 'active' : '' }}">
          <a class="nav-link {{ Request::is('dashboard/status*') ? 'active' : '' }}" href="/dashboard/status">
            <i class="fa fa-bell" aria-hidden="true"></i>
            Status
          </a>
        </li>
        {{-- <li class="nav-item {{ Request::is('dashboard/dokumentasi*') ? 'active' : '' }}">
          <a class="nav-link {{ Request::is('dashboard/dokumentasi*') ? 'active' : '' }} disabled" href="/dashboard/dokumentasi">
            <i class="fa fa-archive" aria-hidden="true"></i>
            Dokumentasi
          </a>
        </li> --}}
        <li class="nav-item {{ Request::is('dashboard/user*') ? 'active' : '' }}">
          <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
            <i class="fa fa-user" aria-hidden="true"></i>
            User
          </a>
        </li>
      </ul>
      {{-- @endcan --}}
</ul>
