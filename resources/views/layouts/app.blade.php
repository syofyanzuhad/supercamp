<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    @yield('title_page') Supercamp
  </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datepicker/datepicker3.css') }}">
  <link rel="shortcut icon" href=" {{asset('images/icon.ico')}} " type="image/x-icon">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <!-- Header -->
  <header class="main-header">

    <a href="#" class="logo">
      <span class="logo-mini"><b>Sp</b></span>
     <span class="logo-lg"><b>Super</b>Camp</span>
    </a>


    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{-- <img src="{{ asset('images/'.Auth::user()->foto) }}" class="user-image" alt="User Image"> --}}
                {{-- <span class="hidden-xs">{{ Auth::user()->name }}</span> --}}
                {{-- <img src="{{ asset('images/'.Auth::user()->foto) }}" class="user-image" alt="User Image"> --}}
                <i class="fa fa-user-circle fa-lg"></i> <span class="hidden-xs">Admin</span>
              </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    {{-- <img src="{{ asset('images/'.Auth::user()->foto) }}" class="img-circle" alt="User Image"> --}}

                    <p>
                      {{-- {{ Auth::user()->name }} --}}
                    </p>
                </li>
                <li class="user-footer">
                    <div class="pull-left">
                        {{-- <a class="btn btn-default btn-flat" href="{{ route('user.profil') }}">Edit Profil</a> --}}
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        
                    </div>
                </li>

            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- End Header -->


  <!-- Sidebar -->
  <aside class="main-sidebar">

    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MENU NAVIGASI</li>

        <li><a href="home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

      @if( Auth::check())
        <li><a href="{{route('pendaftar')}}"><i class="fa fa-id-card"></i> <span>Pendaftar</span></a></li>
        <li><a href="{{route('konfirmasi')}}"><i class="fa fa-id-badge"></i> <span>Konfirmasi</span></a></li>
        <li><a href="{{route('peserta')}}"><i class="fa fa-users"></i> <span>Peserta</span></a></li>
        <li><a href="{{route('mentor')}}"><i class="fa fa-user"></i> <span>Mentor</span></a></li>
        <li><a href="{{route('kelas')}}"><i class="fa fa-pencil"></i> <span>Kelas</span></a></li>
        <li><a href="{{route('administrasi')}}"><i class="fa fa-money"></i> <span>Administrasi</span></a></li>
        <li><a href="{{route('laporan')}}"><i class="fa fa-file-pdf-o"></i> <span>Laporan</span></a></li>
        <li><a href="{{route('user')}}""><i class="fa fa-user-circle"></i> <span>User</span></a></li>       
        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i><span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href=" {{route('pelajaran')}} "><i class="fa fa-book"></i>Pelajaran</a></li>
            <li><a href="{{route('status')}}"><i class="fa fa-podcast"></i>Status</a></li>
            <li><a href="{{route('sampah')}}"><i class="fa fa-minus-circle"></i>Draft<span class="badge badge-info pull-right"> {{count($draft)}} </span></a></li>
          </ul>
        </li>
    @endif
      </ul>
    </section>
  </aside>
  <!-- End Sidebar -->

  <!-- Content  -->
  <div class="content-wrapper">
   <section class="content-header">
      <h1>
        @yield('title')
      </h1>
      <ol class="breadcrumb">
        @section('breadcrumb')
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        @show
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>{{count($mentor)}}</h3>
                       <p>Mentor</p>
                    </div>
                   <div class="icon">
                      <i class="fa fa-user"></i>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                  <div class="inner">
                    <h3> {{count($kelas)}} </h3>
                     <p>Kelas</p>
                  </div>
                 <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
              </div>
          </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>{{count($peserta)}}</h3>
                       <p>Peserta</p>
                    </div>
                   <div class="icon">
                      <i class="fa fa-users"></i>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                      <h3>{{count($pendaftar)}}</h3>
                       <p>Pendaftar</p>
                    </div>
                   <div class="icon">
                      <i class="fa fa-id-card"></i>
                  </div>
                </div>
            </div>
            
        </div>        
        @yield('content')
    </section>
  </div>
  <!-- End Content -->

  <!-- Footer -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Built by : <a href="http://github.com/syofyanzuhad">syofyan_zuhad</a>
    </div>
    <strong>Copyright &copy; 2019 <a href="https://supercampprogrammer.com">Company</a>.</strong> All rights reserved.
  </footer>
  <!-- End Footer -->

<script src="{{ asset('adminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminLTE/dist/js/app.min.js') }}"></script>

<script src="{{ asset('adminLTE/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/validator.min.js') }}"></script>

@yield('script')

</body>
</html>