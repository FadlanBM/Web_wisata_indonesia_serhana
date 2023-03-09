
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Web</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin') }}/img/avatar/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">  
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Wisata</li>
          <li class="nav-item ">
            <a href="{{ route('wisata.create')}}" class="nav-link {{ Request::is('wisata/create') ? 'active' : '' }}">
              <i class="bi bi-ui-checks"></i>
              <p>
                Edit Wisata
              </p>
            </a>
          </li>
          <li class="nav-header">Seni Tari</li>
          <li class="nav-item">
            <a href="{{route('seni_tari.create')}}" class="nav-link {{ Request::is('seni_tari/create') ? 'active' : '' }}">
              <i class="bi bi-ui-checks"></i>
              <p>
                Edit Seni_Tari
              </p>
            </a>
          </li>
          <li class="nav-header">Seni Tulis</li>
          <li class="nav-item">
            <a href="{{route('seni_tulis.create')}}" class="nav-link {{ Request::is('seni_tulis/create') ? 'active' : '' }}">
              <i class="bi bi-ui-checks"></i>
              <p>
                Edit Seni_Tulis
              </p>
            </a>
          </li>
          <li class="nav-header">Berita</li>
          <li class="nav-item">
            <a href="{{route('berita.create')}}" class="nav-link {{ Request::is('berita/create') ? 'active' : '' }}">
              <i class="bi bi-ui-checks"></i>
              <p>
                Edit Berita
              </p>
            </a>
          </li>
          <li class="nav-header">Travel</li>
          <li class="nav-item">
            <a href="{{route('travel.create')}}" class="nav-link {{ Request::is('travel/create') ? 'active' : '' }}">
              <i class="bi bi-ui-checks"></i>
              <p>
                Edit Travel
              </p>
            </a>
          </li>
          <li class="nav-header">Pemimpin</li>
          <li class="nav-item">
            <a href="{{route('index.create')}}" class="nav-link {{ Request::is('index/create') ? 'active' : '' }}">
              <i class="bi bi-ui-checks"></i>
              <p>
                Edit Pemimpin
              </p>
            </a>
          </li>
          <li class="nav-header">Logout</li>
          <li class="nav-item">
            <a href="{{url('auth/logout')}}" class="nav-link">
              <i class="bi bi-box-arrow-right"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <br>
          <br>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>