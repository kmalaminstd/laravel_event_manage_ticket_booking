  <!-- ===== NAVBAR ===== -->
  <nav class="navbar navbar-expand-lg main-navbar sticky-top">
    <div class="container">
      <a class="navbar-brand" href="/">Event<span>Hub</span></a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMain">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="/events">Browse Events</a></li>
        </ul>
        <div class="d-flex align-items-center gap-2">
          <button class="search-toggler"><i class="bi bi-search"></i></button>

          @guest
            <a href="/auth/login" class="btn btn-login">Login</a>
            <a href="/auth/register" class="btn btn-register">Register</a>
          @endguest

          @can('admin')
            <a href="/admin" class="btn btn-login">Dashbaord</a>
            <a href="/logout" class="btn btn-login">Log Out</a>
          @endcan

          @can('user')
            <a href="/user" class="btn btn-login">Dashbaord</a>
            <a href="/logout" class="btn btn-login">Log Out</a>
          @endcan

          @can('organizer')
            <a href="/organizer" class="btn btn-login">Dashbaord</a>
            <a href="/logout" class="btn btn-login">Log Out</a>
          @endcan

        </div>
      </div>
    </div>
  </nav>