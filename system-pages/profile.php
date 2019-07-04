<?php
  $showerros = true;
  if($showerros) {
    ini_set("display_errors", $showerros);
    error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
  }
  session_start();
  if(empty($_SESSION) || $_SESSION['status_usuario'] == 0){
    $_SESSION['respostaDaRequisicao']='vazio';?>
    <script>
      document.location.href = '../authentication/login.php';
    </script>
  <?php }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISA DECOM | Profile</title>
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
            Profile
            <small>Informações Pessoais</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
          <div class="row">
            <div class="col-md-12">
                <?php 
                  if($_SESSION['respostaDaRequisicao']=='vazio'){
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='desativar-erro'){
                    $alerta = '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Desativar!</h4>
                    Usuário não foi desativado! Clique no botão &times para fechar!
                    </div>';
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='alterar-senha-sucesso'){
                    $alerta = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alterado!</h4>
                    Senha foi alterada com sucesso! Clique no botão &times para fechar!
                  </div>';
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='alterar-senha-erro'){
                    $alerta = '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alterar!</h4>
                    Senha não foi alterada! Clique no botão &times para fechar!
                    </div>';
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='senha-atual-errada'){
                    $alerta = "<div id='alerta-preenchimento' class='alert alert-info alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-info'></i> Atenção!</h4>
                    Senha não foi alterada porque Senha Atual informada estava errada!</div>";
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }
                  else if($_SESSION['respostaDaRequisicao']=='alterar-email-sucesso'){
                    $alerta = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alterado!</h4>
                    Email foi alterado com sucesso! Clique no botão &times para fechar!
                  </div>';
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='alterar-email-erro'){
                    $alerta = '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alterar!</h4>
                    Email não foi alterado! Clique no botão &times para fechar!
                    </div>';
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='email-atual-errado'){
                    $alerta = "<div id='alerta-preenchimento' class='alert alert-info alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-info'></i> Atenção!</h4>
                    Email não foi alterado porque Email Atual informado estava errado!</div>";
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='editar-sucesso'){
                    $alerta = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Editado!</h4>
                    Profile foi editado com sucesso! Clique no botão &times para fechar!
                    </div>';
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='editar-erro'){
                    $alerta = '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Editar!</h4>
                    Profile não foi editado! Clique no botão &times para fechar!
                    </div>';
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else if($_SESSION['respostaDaRequisicao']=='email-ja-cadastrado'){
                    $alerta = "<div id='alerta-preenchimento' class='alert alert-info alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-info'></i> Atenção!</h4>
                    Profile não foi alterado porque Email informado já existe na Base de Dados!</div>";
                    $_SESSION['respostaDaRequisicao']='vazio';
                  }else{
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
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#informacoes" data-toggle="tab">Informações</a></li>
                  <li><a href="#configuracoes" data-toggle="tab">Configurações</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="informacoes">
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
                                if($user['nivusu']==1)
                                  echo "ADMINISTRADOR"; 
                                else if($user['nivusu']==2)
                                  echo "SECRETARIA";
                                else echo "COMUM";
                              }
                            ?></a>
                          </li>
                        </ul>
                        <div class="row">
                          <div class="col-md-4 col-sm-4">
                            <button type="button" class="btn bg-navy btn-block" data-toggle="modal" data-target="#modal-alterar-senha">
                              <i class="fa fa-user-secret"></i>    <b>Alterar Senha</b>  
                            </button>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <button type="button" class="btn bg-orange btn-block" data-toggle="modal" data-target="#modal-alterar-email">
                              <i class="fa fa-envelope-o"></i>    <b>Alterar Email</b>  
                            </button>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <a type="button" href="../motor/control/controleProfile.php?id_usuario=<?php  echo $user["codusu"];?>&acao_formulario=desativar-usuario" class="btn bg-maroon btn-block" data-confirm-desativar-usuario="Realmente deseja <b>Desativar</b> o Usuário?">
                              <i class="fa fa-heartbeat"></i>    Desativar Usuário   
                            </a>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="configuracoes">
                    <form class="form-horizontal" action="../motor/control/controleProfile.php" id="targetForm" method="Post">
                      <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id_usuario']?>">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nome" name="nome" placeholder="<?php echo $user['nomusu'];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Função</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" id="funcao" name="funcao" style="width: 100%;" disabled>
                            <option <?php if($user['funusu'] == 'Docente'){?>selected="selected"<?php } ?> value="Docente">Docente</option>
                            <option <?php if($user['funusu'] == 'Técnico'){?>selected="selected"<?php } ?> value="Técnico">Técnico</option>
                            <option <?php if($user['funusu'] == 'Estagiário'){?>selected="selected"<?php } ?> value="Estagiário">Estagiário</option>
                            <option <?php if($user['funusu'] == 'Outro'){?>selected="selected"<?php } ?> value="Outro">Outro</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">                
                        <label for="inputName" class="col-sm-2 control-label">Departamento</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" style="width: 100%;" id="codigo_departamento" name="codigo_departamento" disabled>
                            <?php 
                              $departamentos= new Departamento();
                              $departamentos=$departamentos->buscarDepartamentosRetornandoComVetor();
                              foreach($departamentos as $departamentos){?>
                                <option <?php if($user['coddep_tdep'] == $departamentos['coddep']){?>selected="selected"<?php } ?> value="<?php echo $departamentos['coddep'];?>"><?php echo $departamentos['nomdep'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="hidden" name="acao_formulario" value="editar-profile">
                          <a type="button" class="btn bg-navy" id="habilita-edicao-profile">Habilitar Edição</a>
                          <a type="button" class="btn bg-navy " id="cancela-edicao-profile">Cancelar</a>
                          <button type="button" class="btn bg-maroon" id="configuracoes-profile">Editar</button>
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
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- Alterar Senha Modal -->
      <div class="modal fade" id="modal-alterar-senha">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Alterar Senha</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../motor/control/controleProfile.php" id="targetFormSenha" method="Post">
                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id_usuario']?>">
                <div class="form-group">
                  <label for="exampleInputPassword1">Senha Antiga</label>
                  <input type="password" class="form-control" id="senha_atual" name="senha_atual" placeholder="Senha">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nova Senha</label>
                  <input type="password" class="form-control" id="senha_nova" name="senha_nova" placeholder="Senha">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirmar Nova Senha</label>
                  <input type="password" class="form-control" id="confirmacao_senha_nova" name="confirma_senha_nova" placeholder="Senha">
                </div>
                <div class="form-group">
                  <input type="hidden" name="acao_formulario" value="alterar-senha">
                  <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger pull-right" id="alterar-senha-usuario">Alterar</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Alterar Email Modal -->
      <div class="modal fade" id="modal-alterar-email">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Alterar Email</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../motor/control/controleProfile.php" id="targetFormEmail" method="Post">
                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id_usuario']?>">
                <div class="form-group">
                  <label for="exampleInputPassword1">Email Atual</label>
                  <input type="email" class="form-control" id="email_atual" name="email_atual" placeholder="exemple@exemple.com">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email Novo</label>
                  <input type="email" class="form-control" id="email_novo" name="email_novo" placeholder="exemple@exemple.com">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirmar Novo Email</label>
                  <input type="email" class="form-control" id="confirmacao_email_novo" name="confirmacao_email_novo" placeholder="exemple@exemple.com">
                </div>
                <div class="form-group">
                  <input type="hidden" name="acao_formulario" value="alterar-email">
                  <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger pull-right" id="alterar-email-usuario">Alterar</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
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
    <!-- page script -->
    <script>
      $(document).ready(function(e) {
        $("#configuracoes-profile").hide();
        $("#cancela-edicao-profile").hide();

        $(function () {
          //Tables filters
          $('#example1').DataTable();
          //Money Euro
          $('[data-mask]').inputmask();
        });

        $('#alterar-senha-usuario').click(function(e) {
          e.preventDefault();
          var senha_atual = $('#senha_atual').val();
          var senha_nova = $('#senha_nova').val();
          var confirmacao_senha_nova = $('#confirmacao_senha_nova').val();

          if(senha_atual == "" || senha_nova == "" || confirmacao_senha_nova == ""){
            return alert("Todos os campos devem ser preenchidos!");
          }else {
              if(senha_nova != confirmacao_senha_nova){
                return alert("As novas senhas informadas são diferentes!");
              }else{
                $("#targetFormSenha" ).submit();
              } 
          }   
        });

        $('#alterar-email-usuario').click(function(e) {
          e.preventDefault();
          var email_atual = $('#email_atual').val();
          var email_novo = $('#email_novo').val();
          var confirmacao_email_novo = $('#confirmacao_email_novo').val();

          if(email_atual == "" || email_novo == "" || confirmacao_email_novo == ""){
            return alert("Todos os campos devem ser preenchidos!");
          }else {
              if(email_novo != confirmacao_email_novo){
                return alert("OS novos emails informados são diferentes!");
              }else{
                $("#targetFormEmail" ).submit();
              } 
          }   
        });

        $('a[data-confirm-desativar-usuario]').click(function(e) {
          var href= $(this).attr('href');
          if(!$('#desativar-usuario-modal').length){
            $('body').append('<div class="modal fade" id="desativar-usuario-modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Desativar Usuário</h4></div><div class="modal-body"><div class="modal-body">Realmente deseja <b>Desativar</b> seu Usuário? Caso <b>Desative</b> seu Usuário você será automaticamente deslogado do Sistema e não terá mais acesso ao mesmo!</div><div class="modal-footer" id="sair"><button  class="btn btn-secondary" type="button"  data-dismiss="modal">Cancel</button><a id="data-confirma-acao" type="button" class="btn btn-danger">Desativar</a></div></div></div></div></div>');
          }
          $('#data-confirma-acao').attr('href',href)
          $('#desativar-usuario-modal').modal({show:true});
          return false;
        });

        $('#habilita-edicao-profile').click(function(e) {
          $("#habilita-edicao-profile").hide();
          $("#configuracoes-profile").show();
          $("#cancela-edicao-profile").show();
          $('#nome').prop('disabled', false);
          $('#email').prop('disabled', false);
          $('#funcao').prop('disabled', false);
          $('#codigo_departamento').prop('disabled', false);
        });

        $('#cancela-edicao-profile').click(function(e) {
          $("#configuracoes-profile").hide();
          $("#cancela-edicao-profile").hide();
          $("#habilita-edicao-profile").show();
          $('#nome').prop('disabled', true);
          $('#email').prop('disabled', true);
          $('#funcao').prop('disabled', true);
          $('#codigo_departamento').prop('disabled', true);
        });

        $('#configuracoes-profile').click(function(e) {
          e.preventDefault();
          var nome = $('#nome').val();
          if(nome == ""){
            return alert("Todos os campos devem ser preenchidos!");
          }else {
            $("#targetForm" ).submit();
          }   
        });

      });
    </script>
  </body>
</html>