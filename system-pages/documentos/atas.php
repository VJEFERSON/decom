<?php
  $showerros = true;
  if($showerros) {
    ini_set("display_errors", $showerros);
    error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
  }
  session_start();
  if(empty($_SESSION)){?>
    <script>
      document.location.href = '../authentication/login.php';
    </script>
  <?php }
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISA DECOM | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Requerimentos para PHP funcionar na Página -->
    <?php  require "../motor/requested.php" ?>
  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="../dashboard.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SDM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SISA</b>DECOM</span>
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
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nome'];?>
                  <small><?php echo $_SESSION['funcao'];?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                <a href="../../motor/control/encerrarSessao.php" class="btn btn-default btn-flat">Sign out</a>
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

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li ><a href="../dashboard.html"><i class="fa  fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="../agendamento.html"><i class="fa  fa-clock-o"></i> <span>Agendamentos</span></a></li>
        <li class="active treeview">
          <a href="#"><i class="fa fa-files-o"></i> <span>Documentos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="atas.html">Atas</a></li>
            <li><a href="declaracoes.html">Declarações</a></li>
            <li><a href="memorandos.html">Memorandos</a></li>
            <li><a href="oficios.html">Oficios</a></li>
          </ul>
        </li>
        <li><a href="../ferias.html"><i class="fa  fa-calendar"></i> <span>Férias</span></a></li>
        <li><a href="../horarios.html"><i class="fa  fa-hourglass-start"></i> <span>Horários</span></a></li>
        <li><a href="../objetos.html"><i class="fa  fa-object-ungroup"></i> <span>Objetos</span></a></li>
        <li><a href="../patrimonio.html"><i class="fa fa-cart-plus"></i> <span>Patrimônio</span></a></li>
        <li ><a href="../usuarios.html"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Documentos
        <small>Listagem de Atas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Documentos</a></li>
        <li class="active">Atas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-block bg-olive btn-sm" data-toggle="modal" data-target="#modal-adicionar-ata">Adicionar</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Numero</th>
                    <th>Ano</th>
                    <th>Data de Emissão</th>
                    <th>Sobre</th>
                    <th>Assunto</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>01</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Pedagogica</td>
                  <td>Teste de Hoje</td>
                  <td>
                    <button type="button" class="btn btn-primary btn-xs">
                      <i class="glyphicon glyphicon-eye-open"></i> View
                    </button>
                    <button type="button" class="btn btn-warning btn-xs">
                      <i class="fa fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-xs">
                      <i class="fa fa-remove"></i> Remove
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>03</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Pedagogica</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>02</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Pedagogica</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>04</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Assembleia</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>06</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Colegiado</td>
                  <td>Teste de Estagio</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>05</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Pedagogica</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>07</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Colegiado</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>08</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Pedagogica</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>09</td>
                  <td>2019</td>
                  <td>20/03/2019</td>
                  <td>Pedagogica</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>2019</td>
                  <td>20/03/2019</td>
                  <td>NDE</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>2019</td>
                  <td>20/03/2019</td>
                  <td>NDE</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>2018</td>
                  <td>20/03/2018</td>
                  <td>Pedagogica</td>
                  <td>Teste de Hoje</td>
                  <td>x</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>Numero</th>
                    <th>Ano</th>
                    <th>Data de Emissão</th>
                    <th>Sobre</th>
                    <th>Assunto</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
  <div class="modal fade" id="modal-adicionar-ata">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Adicionar Ata</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label>Numero</label>
              <input type="number" class="form-control" value="1" disabled>
            </div>
            <div class="form-group">
              <label>Data de Emissão:</label>
              <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div>
            <div class="form-group">                
              <label>Sobre</label>
              <select class="form-control select2" style="width: 100%;">
                <option selected="selected">Assembleia</option>
                <option>Colegiado</option>
                <option>DECOM</option>
                <option>NDE</option>
                <option>Pedagógica</option>
              </select>
            </div>
            <div class="form-group">
              <label>Assunto</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Documento</label>
              <input type="file" id="exampleInputFile">
              <p class="help-block">Insira o Arquivo (PDF) referente a Ata.</p>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success pull-right">Adicionar</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      DECOM
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; SISA 2019 <a href="http://decom.ufvjm.edu.br/">Departamento de Computação - DECOM</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- page script -->
<script>
  $(function () {
    //Tables filters
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    //Money Euro
    $('[data-mask]').inputmask()
  })
  
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>