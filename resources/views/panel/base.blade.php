<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel de Controle</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Faveicon -->
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/dist/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- summernote -->
   <link rel="stylesheet" href="{{ asset('assets/dist/plugins/summernote/summernote-bs4.css') }} ">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
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
      @guest
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
          <li class="nav-item"><a href=" {{ route('login') }} " class="nav-link">Entrar</a></li>
          <li class="nav-item"><a href=" {{ route('register') }} " class="nav-link">Cadastrar</a></li>
        </ul>
      @else
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
          <li class="nav-item"><a href="#" class="nav-link">{{ Auth::user()->name }}</a></li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Sair') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
          
        </ul>
      @endguest
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src=" {{ url('assets/img/favicon.ico') }} "
           alt="EO"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Erga Omnes</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can('isAdmin')
          <!-- Acessar Site -->
          <li class="nav-item has-treeview">
            <a href=" {{ route('atual') }} " class="nav-link" target="_blank">
              <i class="nav-icon fas fa-pager"></i>
              <p>
                Acessar Site
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <!-- Revistas -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Revista
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('create-revista') }} " class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Cadastrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{ route('list-revista') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Todas</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Artigos -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                Artigos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('create-artigo') }} " class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Cadastrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('list-artigo') }}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Todas</p>
                </a>
              </li>
            </ul>
          </li> 
          <!-- Usuários -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuários
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('index-usuario') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Todos</p>
                </a>
              </li>
            </ul>
          </li>         
          <!-- Submissões -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-import"></i>
              <p>
                Submissões
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('list-submissao') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Pendentes</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('aprovado-submissao') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Aprovadas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('reprovado-submissao') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Reprovadas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('correcao-submissao') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Para correções</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('isEditor')
          <!-- Submissões -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-import"></i>
              <p>
                Submissões
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('list-submissao') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Pendentes</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('aprovado-submissao') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Aprovadas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('reprovado-submissao') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Reprovadas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('correcao-submissao') }} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Para correções</p>
                </a>
              </li>
            </ul>
          </li>  
          @endcan
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; Ítalo Marcos</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/dist/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset ('assets/dist/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('assets/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset ('assets/dist/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset ('assets/dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset ('assets/dist/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    $("#table").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
