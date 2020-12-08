<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sena Web Php|2020</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="senasoft/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="senasoft/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="senasoft/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="senasoft/dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="senasoft/dist/css/skins/skin-blue.min.css">

  <!--Icons-->
  <link rel="icon" type="image/png" href="senasoft/img/LogoSena.png">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Tu Menú</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="senasoft/dist/img/avatar.png" class="img-circle" alt="User Image">
                      </div>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
            </ul>
          </li>
          <!-- /.messages-menu -->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="senasoft/dist/img/avatar.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"> {{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="senasoft/dist/img/avatar.png" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ route('logout') }}"class="btn btn-danger btn-flat"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                   </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="senasoft/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

     <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navegación Principal</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Gestión</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
            @if (Auth::user()->tieneRole('Admin'))
                        <li><a href="{{ route('role.index') }}"><i class="fa fa-circle-o"></i>Gestion de Roles</a></li>
                        <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>Gestion de Usuarios</a></li>
                        <li><a href="{{ route('productos.index') }}"><i class="fa fa-circle-o"></i>Gestion de Productos</a></li>
                        <li><a href="{{ route('pedidos.index') }}"><i class="fa fa-circle-o"></i>Gestion de Pedidos</a></li>
                        <li><a href="{{ route('mesas.index') }}"><i class="fa fa-circle-o"></i>Gestion de Mesas</a></li>
                        <li><a href="{{ route('factura.index') }}"><i class="fa fa-circle-o"></i>Gestion de Facturas</a></li>
                    @endif
                    @if (Auth::user()->tieneRole('User'))
                        <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>Lista de Usuarios</a></li>
                        <li><a href="{{ route('productos.index') }}"><i class="fa fa-circle-o"></i>Lista de Productos</a></li>
                    @endif 

          </ul>
        </li>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

<<<<<<< Updated upstream
<div id="caja" style="background-color:yellow "></div>
=======
<div id="caja" style="background-color:yellow; "></div>
>>>>>>> Stashed changes

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <div align="center">
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">Senasoft Web Php</a>.</strong> CIDM/Floridablanca/Santander.
  </footer>
</div>
  <!-- /.control-sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="senasoft/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="senasoft/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="senasoft/dist/js/adminlte.min.js"></script>

<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('js/codigo.js')}}"></script>

</body>
</html>