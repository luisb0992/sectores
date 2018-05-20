<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title',config('app.name'))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Icon 16x16 -->
    <link rel="icon" type="image/png" sizes="240x240" href="{{asset('img/logo.png')}}">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/glyphicons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/highcharts.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
  	<style type="text/css">
	    .perfil{
			  position: relative;
			  background: #fff;
			  border: 1px solid #f4f4f4;
			  padding: 20px;
			  margin: 10px 25px;
			}

      .flotante {
    display:scroll;
        position:fixed;
        bottom:320px;
        right:0px;
}
	  </style>
  </head>
  <!--<a class='flotante btn btn-flat btn-success' href='#' >Aquio</a>-->

  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="{{route('dashboard')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
          	<img class="img-responsive" src="{{ asset('img/logo.png') }}" alt="Logo" style="height:30px;margin:10px 0 0 10px">
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sectores</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">{{ Auth::user()->usuario }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                    <img src="{{ asset('img/LOGO_MEGA-02.png') }}" class="img-responsive">
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                  	<div class="pull-left">
                  		<a href="{{route('perfil')}}" class="btn btn-flat btn-default"><i class="fa fa-user-circle" aria-hidden="true"></i> Perfil</a>
                  	</div>
                    
                   	<div class="pull-right">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-flat btn-default" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            @if(\Auth::user()->rol == 'U')
            <li>
              <a href="{{ route('createData') }}">
                <i class="fa fa-plus-square"></i> <span>Cargar Sectores</span>
              </a>
            </li>
            <li>
              <a href="{{ route('verDataCargada') }}">
                <i class="fa fa-plus-square"></i> <span>Ver datos cargados</span>
              </a>
            </li>
            @endif

            @if(\Auth::user()->rol == 'C')
            <li>
              <a href="{{ route('statusData') }}">
                <i class="fa fa-database"></i> <span>Data por Cargar</span>
              </a>
            </li>
            <li>
              <a href="{{ route('verData') }}">
                <i class="fa fa-plus-square"></i> <span>Ver Data Cargada</span>
              </a>
            </li>
            <li>
              <a href="{{ route('eliminarData') }}">
                <i class="fa fa-plus-square"></i> <span>Eliminar Data Cargada</span>
              </a>
            </li>
            <li>
              <a href="{{route('lineas.grafico')}}">
                <i class="fa fa-plus-square"></i> <span>Comportamiento</span>
              </a>
            </li>
            @endif

            @if(\Auth::user()->rol == 'A')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="{{ route('users.index') }}"><i class="fa fa-user-plus"></i>Ver Usuario</a>
                </li>
                <li>
                  <a href="{{ route('users.create') }}"><i class="fa fa-user-plus"></i>Registrar Usuario</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="{{ route('bitacora') }}">
                <i class="fa fa-plus-square"></i> <span>Bitacora</span>
              </a>
            </li>
      
            <li>
              <a href="{{route('lineas.grafico')}}">
                <i class="fa fa-plus-square"></i> <span>Comportamiento</span>
              </a>
            </li>

             <li>
              <a href="{{route('sectores.grafico')}}">
                <i class="fa fa-plus-square"></i> <span>Graficos Sectores</span>
              </a>
            </li>

            <li>
              <a href="{{route('municipio.grafico')}}">
                <i class="fa fa-plus-square"></i> <span>Graficos Municipios</span>
              </a>
            </li>
            
            @endif       
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
          <h1>
            @yield('header')
          </h1>
          @yield('breadcrumb')
        </section>
        <!-- Main content -->
        <section class="content">
        	@yield('content')
        </section>
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <strong>Copyright &copy; 2016-{{ date('Y') }} <a href="#">Comando PSUV C.A</a>.</strong> All rights reserved.
      </footer>
    </div><!-- .wrapper -->
    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="{{asset('js/app.min.js')}}"></script>
    <!-- Data table -->
    <script type="text/javascript" src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/select2.full.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-mask.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/highcharts/highcharts.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/highcharts/exporting.js')}}"></script>
    
     <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
    <!-- <script src="https://code.highcharts.com/js/highcharts-more.js"></script> -->
    <script type="text/javascript">
      $(document).ready(function(){
      	//Eliminar alertas que no contengan la clase alert-important luego de 7seg
      	$('div.alert').not('.alert-important').delay(7000).slideUp(300);

      	//activar Datatable
        $('.data-table').DataTable({
          responsive: true,
          language: {
          	url:'{{asset("plugins/datatables/spanish.json")}}'
          }
        });
      })
    </script>

    @yield('script')
  </body>
</html>