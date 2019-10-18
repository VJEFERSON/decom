<?php
  $showerros = true;
  if($showerros) {
    ini_set("display_errors", $showerros);
    error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
  }
  session_start();
  if(empty($_SESSION) || $_SESSION['status_usuario'] == 0){?>
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
    <title>SISA DECOM | Agendamentos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  
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
      <a href="dashboard.html" class="logo">
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
                <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $_SESSION['nome'];?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['nome'];?>
                    <small><?php echo $_SESSION['funcao'];?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a class="btn btn-default btn-flat" data-toggle="modal" data-target="#signin-modal">Sign out</a>
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
            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nome'];?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <!-- Optionally, you can add icons to the links -->
          <li><a href="dashboard.php"><i class="fa  fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li class="active"><a href="agendamento.php"><i class="fa  fa-clock-o"></i> <span>Agendamentos</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-files-o"></i> <span>Documentos</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="documentos/atas.php">Atas</a></li>
              <li><a href="documentos/declaracoes.php">Declarações</a></li>
              <li><a href="documentos/memorandos.php">Memorandos</a></li>
              <li><a href="documentos/oficios.php">Oficios</a></li>
            </ul>
          </li>
          <li><a href="ferias.php"><i class="fa  fa-calendar"></i> <span>Férias</span></a></li>
          <li><a href="horarios.php"><i class="fa  fa-hourglass-start"></i> <span>Horários</span></a></li>
          <li><a href="objetos-agendamentos.php"><i class="fa  fa-object-ungroup"></i> <span>Objetos e Departamento</span></a></li>
          <li><a href="patrimonio.php"><i class="fa fa-cart-plus"></i> <span>Patrimônio</span></a></li>
          <li><a href="usuarios.php"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
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
          Agendamentos
          <small>Listagem</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="agendamento.php"><i class="fa fa-clock-o"></i>Agendamentos</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
        <div class="row">
        <div class="col-md-12">
              <?php 
                if($_SESSION['respostaDaRequisicao']=='vazio'){
                  $_SESSION['respostaDaRequisicao']='vazio';
                }
                else if($_SESSION['respostaDaRequisicao']=='deletar-sucesso'){
                  $alerta = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Removido!</h4>
                  Usuário foi removido com sucesso! Clique no botão &times para fechar!
                  </div>';
                  $_SESSION['respostaDaRequisicao']='vazio';
                }else if($_SESSION['respostaDaRequisicao']=='deletar-erro'){
                  $alerta = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Remover!</h4>
                  Usuário não foi editado! Clique no botão &times para fechar!
                  </div>';
                  $_SESSION['respostaDaRequisicao']='vazio';
                }
                else if($_SESSION['respostaDaRequisicao']=='criar-sucesso'){
                  $alerta = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Adicionado!</h4>
                  Agendamento efetuado com sucesso! Clique no botão &times para fechar!
                </div>';
                  $_SESSION['respostaDaRequisicao']='vazio';
                }else if($_SESSION['respostaDaRequisicao']=='criar-erro'){
                  $alerta = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Adicionar!</h4>
                  O agendamento não pode ser efetuado! Clique no botão &times para fechar!
                  </div>';
                  $_SESSION['respostaDaRequisicao']='vazio';
                }
                else if($_SESSION['respostaDaRequisicao']=='editar-sucesso'){
                  $alerta = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Editado!</h4>
                  Usuário foi editado com sucesso! Clique no botão &times para fechar!
                  </div>';
                  $_SESSION['respostaDaRequisicao']='vazio';
                }else if($_SESSION['respostaDaRequisicao']=='editar-erro'){
                  $alerta = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Editar!</h4>
                  Usuário não foi editado! Clique no botão &times para fechar!
                  </div>';
                  $_SESSION['respostaDaRequisicao']='vazio';
                }
                else if($_SESSION['respostaDaRequisicao']=='usuario-ja-inserido'){
                  $alerta = "<div id='alerta-preenchimento' class='alert alert-info alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-info'></i> Atenção!</h4>
                  Usuário não adicionado porque Email informado já esta inserido na base de dados, escolha outro Email!</div>";
                  $_SESSION['respostaDaRequisicao']='vazio';
                }
                else if($_SESSION['respostaDaRequisicao']=='editar-erro-desativacao'){
                  $alerta = "<div id='alerta-preenchimento' class='alert alert-info alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-info'></i> Atenção!</h4>
                  Usuário não doi editado, você não pode desativar seu próprio Usuário por está opção. Para desativar vá em Profile>Desativar Usuário!</div>";
                  $_SESSION['respostaDaRequisicao']='vazio';
                }
                else{
                  $alerta = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                  Erro ao conectar com a base de dados, tente novamente mais tarde! Clique no botão &times para fechar!
                  </div>';
                  $_SESSION['respostaDaRequisicao']='vazio';
                }
                echo $alerta;
              ?>
            </div>
          <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
              <div class="box-header">
                <a type="button" href="agendamento-agendar-parte1.php" class="btn btn-block bg-olive btn-sm">Agendar</a>
              </div>
              <!-- /.box-header -->
              <?php  
                $agendamentos= new Agendamento();
                $yearSearch = '2020';//date('Y');
                $agendamentos=$agendamentos->buscarAgendamentosRetornandoComVetor($yearSearch);
                if(empty($agendamentos)) {
              ?>
                <h4 class="well"> Nenhum dado encontrado. </h4>
              <?php
                } else {
              ?>
              <div class="box-body">
                <table id="agendamentosTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nome Usuário</th>
                      <th>Nome Objeto</th>
                      <th>Descrição</th>
                      <th>Horário</th>
                      <th>Data Agendamento</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($agendamentos as $agendamentos){
                    ?>
                    <tr>
                      <td><?php echo $agendamentos['nomusu'];?></td>
                      <td><?php echo $agendamentos['nomobj'];?></td>
                      <td><?php echo $agendamentos['desage'];?></td>                      
                      <td>
                        <button type="button" class="btn btn-info btn-xs" disabled><?php echo $agendamentos['nomhor'];?></button>
                      </td>
                      <td><?php echo $agendamentos['datage'];?></td>
                      <td>
                        <button type="button" class="btn btn-warning btn-xs">
                          <i class="fa fa-edit"></i> Editar
                        </button>
                        <button type="button" class="btn btn-danger btn-xs">
                          <i class="fa fa-remove"></i> Remover
                        </button>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                    <!-- /.end-foreach -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nome Usuário</th>
                      <th>Nome Objeto</th>
                      <th>Descrição</th>
                      <th>Horário</th>
                      <th>Data Agendamento</th>
                      <th>Ações</th>
                    </tr>
                  </tfoot>
                </table>
                <?php
                  }
                ?>
                <!-- /.end-else -->
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
    <!-- Sign Out Modal-->
    <div class="modal fade" id="signin-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sair</h4>
          </div>
          <div class="modal-body">
            <div class="modal-body">Realmente deseja sair?</div>
            <div class="modal-footer" id="sair">
              <button  class="btn btn-secondary" type="button"  data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="../motor/control/encerrarSessao.php">Sair</a>
            </div>
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
      <strong>SISA 2019 <a href="http://decom.ufvjm.edu.br/">Departamento de Computação - DECOM</a>.</strong>
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
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- InputMask -->
    <script src="../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- Page script -->
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
      //Tables filters
      $('#agendamentosTable').DataTable()
      //Money Euro
      $('[data-mask]').inputmask()
    })  
  </script>
  <!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. -->
  </body>
</html>
