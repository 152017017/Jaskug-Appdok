<header class="p-2 mb-3 border-bottom">
    <div class="container">

      <div class="col d-lg-flex flex-nowrap" style="padding-left:12%">
        @yield('title')

      <div class="col d-lg-flex flex-nowrap align-items-center justify-content-end" style="padding-right: auto">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/img/avatar.jpg" alt="" width="40" height="40" class="rounded-circle">
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
</header>