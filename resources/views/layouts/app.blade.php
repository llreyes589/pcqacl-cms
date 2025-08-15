<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PCQACL Website CMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css">
  <style>
    body {
      font-size: 0.9rem;
    }
    /* Only show fixed sidebar on large screens */
    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: #fff;
      padding-top: 1rem;
    }
    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      display: block;
      padding: 0.6rem 1rem;
    }
    .sidebar a:hover {
      background-color: #495057;
      color: #fff;
    }
    @media (min-width: 992px) {
      .main-content {
        margin-left: 240px;
      }
      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 240px;
      }
    }
  </style>
</head>
<body>

    @php
    $menu = [
        ['label' => 'Overview', 'route' => '/cms/home'],
        ['label' => 'Bulletins', 'route' => '/cms/bulletins'],
        ['label' => 'Officers', 'route' => '/cms/officers'],
        ['label' => 'Board Of Trustees', 'route' => '/cms/bot'],
    ];
    @endphp
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
      <!-- Sidebar toggle button on mobile -->
      <button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
        ☰
      </button>
      <a class="navbar-brand" href="#">PCQACL CMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Notifications</a></li>
          <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Offcanvas sidebar for mobile -->
  <div class="offcanvas offcanvas-start sidebar d-lg-none" tabindex="-1" id="offcanvasSidebar">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title text-white">PCQACL CMS</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        @foreach ($menu as $m)
            <a href="{{ $m['route'] }}">{{ $m['label'] }}</a>
        @endforeach
    </div>
  </div>

  <!-- Fixed sidebar for large screens -->
  <div class="sidebar d-none d-lg-block">
    <h4 class="text-center text-white">PCQACL CMS</h4>
    @foreach ($menu as $m)
        <a href="{{ $m['route'] }}">{{ $m['label'] }}</a>
    @endforeach
  </div>

  <!-- Main content -->
  <div class="main-content p-3">
    @yield('content')

  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>
  @yield('javascript')
</body>
</html>
