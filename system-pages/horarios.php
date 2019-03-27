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
    <title>SISA DECOM | Horários</title>
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
            <li  class="active"><a href="horarios.php"><i class="fa  fa-hourglass-start"></i> <span>Horários</span></a></li>
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
            Horários
            <small>Listagem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="horarios.php"><i class="fa fa-hourglass-start"></i>Horários</a></li>
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
                          Horário foi removido com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='deletar-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Remover!</h4>
                          Horário não foi removido com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='criar-sucesso'){
                          $alerta = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Adicionado!</h4>
                          Horário foi adicionado com sucesso! Clique no botão &times para fechar!
                        </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='criar-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Adicionar!</h4>
                          Horário não foi adicionado! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='editar-sucesso'){
                          $alerta = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Editado!</h4>
                          Horário foi editado com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='editar-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Editar!</h4>
                          Horário não foi editado! Clique no botão &times para fechar!
                          </div>';
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
                  <button type="button" class="btn btn-block bg-olive btn-sm" data-toggle="modal" data-target="#modal-adicionar-horario">Adicionar</button>
                </div>
                <!-- /.box-header -->
                <?php  
                    $horarios= new Horario();
                    $horarios=$horarios->buscarHorariosRetornandoComVetor();
                    if(empty($horarios)) {
                ?>
                      <h4 class="well"> Nenhum dado encontrado. </h4>
                <?php
                    } else {
                ?>
                <div class="box-body">
                  <table id="tableHorarios" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Horário</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($horarios as $horario){
                      ?>
                      <tr>
                        <td><?php echo $horario['codhor'];?></td>
                        <td><?php echo $horario['nomhor'];?></td>
                        <td><?php echo $horario['deshor'];?></td>
                        <td>
                          <a type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editar-horario-modal" data-whatever-id-horario="<?php echo $horario['codhor'];?>"
                            data-whatever-nome-horario="<?php  echo $horario["nomhor"]?>" data-whatever-descricao-horario="<?php  echo $horario["deshor"]?>">
                            <i class="fa fa-edit"></i> Edit
                          </a>
                          <a type="button" href="../motor/control/controleDeHorarios.php?id_horario=<?php  echo $horario["codhor"]?>&acao_formulario=deletar-horario" class="btn btn-danger btn-xs" data-confirm="Realmente deseja <b>Remover</b> o Horario?">
                            <i class="fa fa-remove"></i> Remove
                          </a>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                      <!-- /.end-foreach -->
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Código</th>
                        <th>Horário</th>
                        <th>Descrição</th>
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
      <!-- Adicionar Horario Modal -->
      <div class="modal fade" id="modal-adicionar-horario">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Adicionar Horário</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../motor/control/controleDeHorarios.php" id="targetFormHorario" method="Post">
                <div class="form-group">
                  <label>Nome Horário</label>
                  <input name="nome_horario" id="nome_horario" type="text" class="form-control" placeholder="Ex: 15:00 ás 16:00 ...">
                </div>
                <div class="form-group">
                  <label>Descrição</label>
                  <input name="descricao_horario" id="descricao_horario" type="text" class="form-control" placeholder="Ex: Horário das 15 horas ...">
                </div>
                <div class="form-group">
                  <input type="hidden" name="acao_formulario" value="criar-horario">
                  <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                  <button type="submit" id="adicionar-e-editar-horario" class="btn btn-success pull-right" >Adicionar</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Editar Horario Modal-->
      <div class="modal fade" id="editar-horario-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Sair</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../motor/control/controleDeHorarios.php" id="targetFormHorario" method="Post">
                <input type="hidden" id="id_horario"  name="id_horario">
                <div class="form-group">
                  <label>Nome Horário</label>
                  <input name="nome_horario" id="nome_horario" type="text" class="form-control" placeholder="Ex: 15:00 ás 16:00 ...">
                </div>
                <div class="form-group">
                  <label>Descrição</label>
                  <input name="descricao_horario" id="descricao_horario" type="text" class="form-control" placeholder="Ex: Horário das 15 horas ...">
                </div>
                <div class="form-group">
                  <input type="hidden" name="acao_formulario" value="editar-horario">
                  <button type="button" class="btn btn-default " data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-danger pull-right" id="adicionar-e-editar-horario">Editar</button>
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
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
        $(function () {
          //Tables filters
          $('#tableHorarios').DataTable()
          //Money Euro
          $('[data-mask]').inputmask()
        });

        $('#adicionar-e-editar-horario').click(function(e) {
          e.preventDefault();
          var nome_horario= $('#nome_horario').val();
          var descricao_horario= $('#descricao_horario').val();

          if(nome_horario == "" || descricao_horario == ""){
            return alert("Todos os campos devem ser preenchidos!");
          }else {
            $("#targetFormHorario" ).submit();
          }    
        });

        $('a[data-confirm]').click(function(e) {
          var href= $(this).attr('href');
          if(!$('#remover-horario-modal').length){
            $('body').append('<div class="modal fade" id="remover-horario-modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Remover Horario</h4></div><div class="modal-body"><div class="modal-body">Realmente deseja <b>Remover</b> o Horario?</b></div><div class="modal-footer" id="sair"><button  class="btn btn-secondary" type="button"  data-dismiss="modal">Cancel</button><a id="data-confirma-acao" type="button" class="btn btn-danger">Remover</a></div></div></div></div></div>');
          }
          $('#data-confirma-acao').attr('href',href)
          $('#remover-horario-modal').modal({show:true});
          return false;
        });

        $('#editar-horario-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var recipient_id_horario = button.data('whatever-id-horario')  
          var recipient_nome_horario = button.data('whatever-nome-horario') 
          var recipient_descricao_horario = button.data('whatever-descricao-horario')
              
          var modal = $(this)
          modal.find('.modal-title').text('Editar Horario')
          modal.find('#id_horario').val(recipient_id_horario)
          modal.find('#nome_horario').val(recipient_nome_horario)
          modal.find('#descricao_horario').val(recipient_descricao_horario)
        });

      });
    </script>
  </body>
</html>