<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? "Admin" }} | SMK Gamelab</title>
  <link rel="icon" href="{{ asset('assets/dist/img/Smk_Gamelab.png') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  @yield('addCss')
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  @yield('addCss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <!-- Left navbar links and Search Form -->
    <ul class="navbar-nav w-100">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-flex align-items-center flex-grow-1">
            <div class="input-group">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="flex-grow: 1;">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- Fullscreen Button -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- User Menu -->
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('assets/dist/img/Admin.png') }}" class="rounded-circle" width="31" alt="Admin">
          Admin
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header d-flex align-items-center">
            <img src="{{ asset('assets/dist/img/Admin.png') }}" class="img-circle elevation-2" width="45" alt="Admin">
            <div class="ml-3">
              <h6 class="mb-0">Admin</h6>
              <small class="text-muted">Admin</small>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user-circle mr-2"></i> My Profile
          </a>
          <a href="#" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/Smk_Gamelab.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $title ?? "SMK Gamelab" }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item has-treeview mb-12">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 2</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Komunikasi -->
          <li class="nav-item has-treeview mb-12">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Komunikasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 2</p>
                </a>
              </li>
            </ul>
          </li>
         <!-- Manajemen Siswa -->
        <li class="nav-item has-treeview {{ Request::is('students*') || Request::is('attendances*') || Request::is('grades*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('students*') || Request::is('attendances*') || Request::is('grades*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                  Manajemen Siswa
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('listStudents') }}" class="nav-link {{ Request::is('students') ? 'active' : '' }}">
                      <p>Kelola Profil Siswa</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('listAttendances') }}" class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
                      <p>Kelola Kehadiran Siswa</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('listGrades') }}" class="nav-link {{ Request::is('grades*') ? 'active' : '' }}">
                      <p>Kelola Nilai Siswa</p>
                  </a>
              </li>
          </ul>
        </li>
          <!-- Manajemen Guru -->
          <li class="nav-item has-treeview {{ Request::is('teachers*') || Request::is('teaching_schedules*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('teachers*') || Request::is('teaching_schedules*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Manajemen Guru
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('listTeachers') }}" class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}">
                        <p>Kelola Profil Guru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('listTeachingschedules') }}" class="nav-link {{ Request::is('teaching_schedules*') ? 'active' : '' }}">
                        <p>Kelola Jadwal Guru</p>
                    </a>
                </li>
            </ul>
          </li>
          <!-- Manajemen Keuangan -->
          <li class="nav-item has-treeview mb-12">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Manajemen Keuangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 2</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Laporan -->
          <li class="nav-item has-treeview mb-12">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 2</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Pengaturan Sistem -->
          <li class="nav-item has-treeview mb-12">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan Sistem
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Contoh 2</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <!-- REQUIRED SCRIPTS -->
  @include('sweetalert::alert')
  <!-- jQuery -->
  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
  @yield('addJavascript')

</body>
</html>
