<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-lg-flex flex-nowrap align-items-center justify-content-end justify-content-lg-end">
        {{-- <a href="/" class="d-flex align-items-center mb-2 mb-sm-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a> --}}

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/img/avatar.jpg" alt="" width="48" height="48" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#"><span data-feather="user"></span> Profile</a></li>
            <li><a class="dropdown-item" href="#"><span data-feather="settings"></span> Settings</a></li>
            <li><hr class="dropdown-divider"></li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Logout <span data-feather="log-out"></span></i></button>
              </form>
          </ul>
        </div>
      </div>
    </div>
  </header>