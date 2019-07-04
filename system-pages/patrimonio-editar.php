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
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISA DECOM | Patrimônio</title>
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
                        <?php echo $_SESSION['id_patrimonio'];?>
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
            <li class="active"><a href="patrimonio.php"><i class="fa fa-cart-plus"></i> <span>Patrimônio</span></a></li>
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
            Patrimônio
            <small>Listagem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="patrimonio.php"><i class="fa fa-cart-plus"></i>Patrimônio</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
          <div class="row">
            <div class="col-md-12">
              <?php 
                    if($_SESSION['respostaDaRequisicao']=='vazio'){
                      $_SESSION['respostaDaRequisicao']='vazio';
                    }else if($_SESSION['respostaDaRequisicao']=='deletar-sucesso'){
                      $alerta = '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-check"></i> Removido!</h4>
                      Patrimônio foi removido com sucesso! Clique no botão &times para fechar!
                      </div>';
                      $_SESSION['respostaDaRequisicao']='vazio';
                    }else if($_SESSION['respostaDaRequisicao']=='deletar-erro'){
                      $alerta = '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Remover!</h4>
                      Patrimônio não foi removido com sucesso! Clique no botão &times para fechar!
                      </div>';
                      $_SESSION['respostaDaRequisicao']='vazio';
                    }else if($_SESSION['respostaDaRequisicao']=='criar-sucesso'){
                      $alerta = '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-check"></i> Adicionado!</h4>
                      Patrimônio foi adicionado com sucesso! Clique no botão &times para fechar!
                    </div>';
                      $_SESSION['respostaDaRequisicao']='vazio';
                    }else if($_SESSION['respostaDaRequisicao']=='criar-erro'){
                      $alerta = '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Adicionar!</h4>
                      Patrimônio não foi adicionado! Clique no botão &times para fechar!
                      </div>';
                      $_SESSION['respostaDaRequisicao']='vazio';
                    }else if($_SESSION['respostaDaRequisicao']=='editar-sucesso'){
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
                      Patrimônio não foi editado! Clique no botão &times para fechar!
                      </div>';
                      $_SESSION['respostaDaRequisicao']='vazio';
                    }else if($_SESSION['respostaDaRequisicao']=='patrimonio-ja-inserido'){
                      $alerta = "<div id='alerta-preenchimento' class='alert alert-info alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h4><i class='icon fa fa-info'></i> Atenção!</h4>
                      Patrimônio com código informado já esta inserido na base de dados!</div>";
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
              <!-- /.box -->
              <div class="box">
                <div class="box-header">
                  <button type="button" class="btn btn-block bg-olive btn-sm" data-toggle="modal" data-target="#modal-adicionar-patrimonio">Adicionar</button>
                </div>
                <!-- /.box-header -->
                <?php  
                  $id_patrimonio=$_REQUEST['id_patrimonio'];
                  $patrimonio= new Patrimonio();
                  $patrimonio=$patrimonio->buscarPatrimonioCadastradoPeloId($id_patrimonio);
                ?>
                <div class="box-body">
                    <form role="form" action="../motor/control/controleDePatrimonios.php" id="targetForm" method="Post">
                        <div class="form-group">
                            <label>Código</label>
                            <input type="text" name="id_patrimonio" id="id_patrimonio" class="form-control" value="<?php echo $patrimonio['codpatri']?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="nome_patrimonio" id="nome_patrimonio" class="form-control" placeholder="<?php echo $patrimonio['nompatri']?>" disabled>
                        </div>
                        <div class="form-group">                
                            <label>Descrição</label>
                            <textarea name="descricao_patrimonio" id="descricao_patrimonio" class="form-control" rows="3" placeholder="<?php echo $patrimonio['despatri']?>" disabled></textarea>
                        </div>
                        <div class="form-group">                
                            <label>Situação</label>
                            <select name="status_patrimonio" id="status_patrimonio" class="form-control select2" style="width: 100%;" disabled>
                                <option <?php if($patrimonio['stapatri'] == 'Ativo'){?>selected="selected"<?php } ?> value="Ativo">Ativo</option>
                                <option <?php if($patrimonio['stapatri'] == 'Baixa'){?>selected="selected"<?php } ?> value="Baixa">Baixa</option>
                                <option <?php if($patrimonio['stapatri'] == 'Conserto'){?>selected="selected"<?php } ?> value="Conserto">Conserto</option>
                                <option <?php if($patrimonio['stapatri'] == 'Danificado'){?>selected="selected"<?php } ?> value="Danificado">Danificado</option>
                            </select>
                        </div>
                        <div class="form-group">                
                            <label>Departamento</label>
                            <select name="departamento_patrimonio" id="departamento_patrimonio" class="form-control select2" style="width: 100%;" disabled>
                                <?php 
                                $departamentos= new Departamento();
                                $departamentos=$departamentos->buscarDepartamentosRetornandoComVetor();
                                foreach($departamentos as $departamentos){?>
                                    <option value="<?php echo $departamentos['coddep']?>"><?php echo $departamentos['nomdep']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="acao_formulario" id="acao_formulario" value="editar-patrimonio">
                            <a type="button" href="patrimonio.php" class="btn btn-default" id="voltar">Voltar</a>
                            <a type="button" class="btn bg-navy pull-right" id="habilita-edicao">Habilitar Edição</a>
                            <a type="button" class="btn bg-navy " id="cancela-edicao">Cancelar</a>
                            <button type="submit" class="btn bg-maroon pull-right" id="editar-patrimonio" >Editar</button>
                        </div>
                    </form>
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
    <!-- page script -->
    <script>
      $(document).ready(function(e) {
        $("#editar-patrimonio").hide();
        $("#cancela-edicao").hide();
        
        $('#habilita-edicao').click(function(e) {
          $("#habilita-edicao").hide();
          $("#voltar").hide();
          $("#editar-patrimonio").show();
          $("#cancela-edicao").show();
          $('#departamento_patrimonio').prop('disabled', false);
          $('#nome_patrimonio').prop('disabled', false);
          $('#status_patrimonio').prop('disabled', false);
          $('#descricao_patrimonio').prop('disabled', false);
        });

        $('#cancela-edicao').click(function(e) {
          $("#editar-patrimonio").hide();
          $("#cancela-edicao").hide();
          $("#voltar").show();
          $("#habilita-edicao").show();
          $('#departamento_patrimonio').prop('disabled', true);
          $('#nome_patrimonio').prop('disabled', true);
          $('#status_patrimonio').prop('disabled', true);
          $('#descricao_patrimonio').prop('disabled', true);
        });

        $('#editar-patrimonio').click(function(e) {
          e.preventDefault();
          var id_patrimonio = $('#id_patrimonio').val();
          var departamento_patrimonio = $('#departamento_patrimonio').val(); 
          var nome_patrimonio = $('#nome_patrimonio').val();
          var descricao_patrimonio = $('#descricao_patrimonio').val();
          var status_patrimonio = $('#status_patrimonio').val();
          var acao_formulario = $('#acao_formulario').val();

          if(nome_patrimonio == "" || descricao_patrimonio == ""){
            return alert("Todos os campos devem ser preenchidos!");
          }else{
            $("#targetForm" ).submit();
          }    
        });

      });
    </script>
  </body>
</html>