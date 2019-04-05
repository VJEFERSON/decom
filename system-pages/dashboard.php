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
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
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
    <a href="dashboard.php" class="logo">
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
        <li class="active"><a href="dashboard.php"><i class="fa  fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="agendamento.php"><i class="fa  fa-clock-o"></i> <span>Agendamentos</span></a></li>
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
        <li><a href="objetos-departamentos.php"><i class="fa  fa-object-ungroup"></i> <span>Objetos e Departamentos</span></a></li>
        <li><a href="patrimonio.php"><i class="fa fa-cart-plus"></i> <span>Patrimônio</span></a></li>
        <li ><a href="usuarios.php"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
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
        Dashboard
        <small>Geral</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Documentos</span>
              <span class="info-box-number">90 <small>PDF's</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuários</span>
              <span class="info-box-number">31 <small>Ativos</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Online</span>
              <span class="info-box-number">4 <small>Logados</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bug"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reports</span>
              <span class="info-box-number">31 <small>Novos</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="box box-default">
        <div class="box-body">
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/user2-160x160.jpg" alt="User profile picture">
              <h3 class="profile-username text-center"> <?php echo $_SESSION['nome'];?></h3>
              <p class="text-muted text-center"><?php echo $_SESSION['funcao'];?></p>
              <?php  
                $user= new Usuario();
                $user=$user->buscarUsuarioCadastradoPeloId($_SESSION['id_usuario']);
              ?>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php
                    if(empty($user)){
                      echo "Erro ao buscar informações de Usuário";
                    }else{
                      echo $user['logusu'];
                    }
                  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Usuário</b> <a class="pull-right"><?php
                    if(empty($user)){
                      echo "Erro ao buscar informações de Usuário";
                    }else{
                      if($user['nivusu']==1){
                        echo "ADMINISTRADOR";
                      }else 
                        echo "COMUM";
                    }
                  ?></a>
                </li>
              </ul>
              <a href="profile.php" type="button" class="btn bg-navy btn-block" >
                  <b>Alterar Informações Pessoais</b>  
                </a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9 col-sm-12 col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#painel" data-toggle="tab">Painel</a></li>
              <li><a href="#reportar-sugerir" data-toggle="tab">Reportar ou Sugerir</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="painel">
                <!-- Application buttons -->
                <div class="box-body">
                  <a href="agendamento.php" class="btn btn-app">
                    <i class="fa fa-clock-o"></i> Agendamentos
                  </a>
                  <a href="objetos-departamentos.php" class="btn btn-app">
                    <i class="fa fa-object-ungroup"></i> Departamentos
                  </a>
                  <a href="documentos/atas.php" class="btn btn-app">
                    <i class="fa fa-files-o"></i> Documentos
                  </a>
                  <a href="documentacao-sistema.php" class="btn btn-app">
                    <i class="fa fa-book"></i> Doc.Sistema
                  </a>
                  <a href="ferias.php" class="btn btn-app">
                    <i class="fa fa-calendar"></i> Férias
                  </a>
                  <a href="horarios.php" class="btn btn-app">
                    <i class="fa fa-hourglass-start"></i> Horários
                  </a>
                  <a href="objetos-departamentos.php" class="btn btn-app">
                    <i class="fa fa-object-ungroup"></i> Objetos
                  </a>
                  <a href="patrimonio.php" class="btn btn-app">
                    <i class="fa fa-cart-plus"></i> Patrimônio
                  </a>
                  <a href="reports.php" class="btn btn-app">
                    <i class="fa fa-bug"></i> Reports
                  </a>
                  <a href="sugestoes.php" class="btn btn-app">
                    <i class="fa fa-commenting"></i> Sugestões
                  </a>
                  <a href="usuarios.php" class="btn btn-app">
                    <i class="fa fa-users"></i> Usuários
                  </a>
                </div>
                <!-- /.box-body -->  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="reportar-sugerir">
                <form class="form-horizontal" action="../motor/control/controleProfile.php" id="targetForm" method="Post">
                  <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id_usuario']?>">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nome Usuário</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="<?php echo $user['nomusu'];?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tipo de Comentário</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" id="report-sugestao" name="report-sugestao">
                        <option value="REPORT" selected="selected">Report</option>
                        <option value="SUGESTAO">Sugestão</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Comentário</label>
                    <div class="col-sm-10">
                    <textarea name="comentario" id="comentario" class="form-control" rows="3" placeholder="Comentário ..."></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn bg-maroon" id="reportar">Enviar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
        </div>
        <!-- /.box body-->
      <div>
      <!-- /.box -->  
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>