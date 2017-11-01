<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Escuela Cristiana "Palabra en Accion"</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini" background="C:/Users/Daniel/Downloads/923202_635663256528146_6344912972542694736_n.jpg">
    <div class="wrapper">

      <header class="main-header">

        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>sisColegio</b></span>
          </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>

          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">{!!Auth::user()->name!!} - <?php echo date('l jS \of F Y h:i:s A');?></span>
                </a>

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
            <li class="header"></li>

            @if(Auth::user()->rol == "admin")
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-child"></i>
                  <span>Estudiantes</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('estudiantes/alumnos')}}"><i class="fa fa-circle-o"></i> Estudiantes</a></li>
                  <li><a href="{{url('estudiantes/becados')}}"><i class="fa fa-circle-o"></i> Becados</a></li>
                </ul>
              </li>
            @endif

            @if(Auth::user()->rol == "admin")
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i>
                  <span>Padres y Encargados</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('responsables/padres')}}"><i class="fa fa-circle-o"></i> Padres</a></li>
                  <li><a href="{{url('responsables/encargado')}}"><i class="fa fa-circle-o"></i> Encargado</a></li>
                </ul>
              </li>
            @endif

            @if(Auth::user()->rol == "admin")
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-file-text"></i>
                  <span>Contratos</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('colegio/contratos')}}"><i class="fa fa-circle-o"></i> Contratos</a></li>
                  <li><a href="{{url('ventas/cliente')}}"><i class="fa fa-circle-o"></i> Capturar Firmas</a></li>
                </ul>
              </li>
            @endif

            @if(Auth::user()->rol == "admin")
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-user"></i>
                  <span>Docentes</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('personal/docentes')}}"><i class="fa fa-circle-o"></i> Docentes</a></li>
                  <li><a href="{{url('personal/registro_escalafonario')}}"><i class="fa fa-circle-o"></i> Registro Escalafonario</a></li>
                </ul>
              </li>
            @endif

            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Grados y Cursos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('colegio/grados')}}"><i class="fa fa-circle-o"></i> Grados</a></li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-circle-o"></i>
                    <span>Cursos</span>
                     <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{url('colegio/cursos')}}"><i class="fa fa-circle-o"></i> Areas</a></li>
                    <li><a href="{{url('colegio/subareas')}}"><i class="fa fa-circle-o"></i> Sub-Areas</a></li>
                    <li class="treeview">
                      <a href="#">
                        <i class="fa fa-circle-o"></i>
                        <span>Horarios</span>
                         <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{{url('colegio/horarios')}}"><i class="fa fa-circle-o"></i> Crear</a></li>
                        <li><a href="{{url('colegio/horariosver')}}"><i class="fa fa-circle-o"></i> Imprimir</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Notas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('colegio/notas')}}"><i class="fa fa-circle-o"></i> Ingresar Notas</a></li>
                <li><a href="{{url('colegio/notasver')}}"><i class="fa fa-circle-o"></i> Ver Boletas</a></li>
              </ul>
            </li>



            <li class="treeview">
              <a href="#">
                <i class="fa fa-phone-square"></i>
                <span>Telefonos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('telefonos/num_telefonos')}}"><i class="fa fa-circle-o"></i> Telefonos</a></li>
                <li><a href="{{url('telefonos/telefonos_encargados')}}"><i class="fa fa-circle-o"></i> Telefonos Encargados</a></li>
                <li><a href="{{url('telefonos/telefonos_docentes')}}"><i class="fa fa-circle-o"></i> Telefonos Docentes</a></li>
              </ul>
            </li>

            @if(Auth::user()->rol == "admin")
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-cog"></i> <span>Acceso</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('seguridad/usuarios')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>

                </ul>
              </li>
            @endif
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <!--<small class="label pull-right bg-yellow">IT</small>-->
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-sign-out"></i> <span>Salir</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-circle-o"></i>
                    Cerrar Sesion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

                </li>

              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!--<div class="tile-stats tile-red">
                   <div class="icon"><i class="fa fa-group"></i></div>
                   <div class="num" data-start="0" data-end=""
                       data-postfix="" data-duration="1500" data-delay="0">0</div>

                   <h3></h3>
                  <p>Total students</p>
               </div>-->
        <!-- Main content -->

        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Control Escuela Cristiana "Palabra en Accion"</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')

		                          <!--Fin Contenido-->
                           </div>
                        </div>
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->


      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2017 Desarrollado Por: Universidad Mariano Galvez de Guatemala
        </strong>
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')<!--extiende scripsts con blade-->
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>

  </body>
</html>
