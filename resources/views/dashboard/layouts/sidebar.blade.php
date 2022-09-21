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
          <a class="nav-link  {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="bookmark" class="align-text-bottom"></span>
            Task
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="refresh-cw" class="align-text-bottom"></span>
            History
          </a>
        </li>
      </ul>

      {{-- @can('admin') --}}

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Master Data</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="activity" class="align-text-bottom"></span>
            Bisnis
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="package" class="align-text-bottom"></span>
            Platform
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="plus-square" class="align-text-bottom"></span>
            Group Layanan
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="phone" class="align-text-bottom"></span>
            Layanan
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="bell" class="align-text-bottom"></span>
            Status
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="archive" class="align-text-bottom"></span>
            Dokumentasi
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="user" class="align-text-bottom"></span>
            User
          </a>
        </li>
      </ul>

      {{-- @endcan --}}

    </div>
  </nav>