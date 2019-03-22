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
        Patrimônio
        <small>Listagem</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="usuarios.html"><i class="fa fa-cart-plus"></i>Patrimônio</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-block bg-olive btn-sm" data-toggle="modal" data-target="#modal-adicionar-patrimonio">Adicionar</button>
            </div>
            <!-- /.box-header -->
            <?php  
                $patrimonios= new Patrimonio();
                $patrimonios=$patrimonios->buscarPatrimoniosRetornandoComVetor();
                if(empty($patrimonios)) {
            ?>
                  <h4 class="well"> Nenhum dado encontrado. </h4>
            <?php
                } else {
            ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Patrimônio</th>
                    <th>Nome</th>
                    <th>Departamento</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                  <?php
										foreach($patrimonios as $patrimonio){
						      ?>
                  <tr>
                    <td><?php echo $patrimonio['codpatri'];?></td>
                    <td><?php echo $patrimonio['nompatri'];?></td>
                    <td><?php echo $patrimonio['nomdep'];?></td>
                    <td><?php echo $patrimonio['stapatri'];?></td>
                    <td>
                      <a type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editar-patrimonio-modal" data-whatever-id-patrimonio="<?php echo $patrimonio['codpatri'];?>" data-whatever-departamento-patrimonio="<?php  echo $patrimonio["coddep_tdep"]?>" 
                        data-whatever-nome-patrimonio="<?php  echo $patrimonio["nompatri"]?>" data-whatever-descricao-patrimonio="<?php  echo $patrimonio["descpatri"]?>"
                        data-whatever-status-patrimonio="<?php  echo $patrimonio["stapatri"]?>">
                        <i class="fa fa-edit"></i> Edit
                      </a>
                      <a type="button" disabled href="../motor/control/controleDePatrimonios.php?id_patrimonio=<?php  echo $patrimonio["codpatri"]?>&acao_formulario=deletar-patrimonio" class="btn btn-danger btn-xs" data-confirm-objeto="Realmente deseja <b>Remover</b> o Objeto?">
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
                    <th>Patrimônio</th>
                    <th>Nome</th>
                    <th>Departamento</th>
                    <th>Situação</th>
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
  <!-- Adicionar Patrimônio Modal -->
  <div class="modal fade" id="modal-adicionar-patrimonio">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Adicionar Patrimônio</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
            <div class="form-group">
              <label>Código Patrimônio</label>
              <input type="number" name="id_patrimonio" id="id_patrimonio" class="form-control">
            </div>
            <div class="form-group">
              <label>Nome</label>
              <input type="text" name="nome_patrimonio" id="nome_patrimonio" class="form-control" placeholder="Ex: Cadeira de Metal ...">
            </div>
            <div class="form-group">                
              <label>Descrição</label>
              <textarea name="descricao_patrimonio" id="descricao_patrimonio" class="form-control" rows="3" placeholder="Ex: Laboratório 31 ..."></textarea>
            </div>
            <div class="form-group">                
              <label>Situação</label>
              <select name="status_patrimonio" id="status_patrimonio" class="form-control select2" style="width: 100%;">
                <option value="Ativo" selected="selected">Ativo</option>
                <option value="Baixa">Baixa</option>
                <option value="Conserto">Conserto</option>
                <option value="Danificado">Danificado</option>
              </select>
            </div>
            <div class="form-group">                
              <label>Departamento</label>
              <select name="departamento_patrimonio" id="departamento_patrimonio" class="form-control select2" style="width: 100%;">
                <?php 
                  $departamentos= new Departamento();
                  $departamentos=$departamentos->buscarDepartamentosRetornandoComVetor();
                  foreach($departamentos as $departamentos){?>
                    <option value="<?php echo $departamentos['coddep']?>"><?php echo $departamentos['nomdep']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" id="acao_formulario" value="criar-patrimonio">
              <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
              <button type="submit" id="adicionar-e-editar-patrimonio" class="btn btn-success pull-right">Adicionar</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!-- Editar Modal-->
  <div class="modal fade" id="editar-patrimonio-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Sair</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
            <input type="hidden" name="id_patrimonio" id="id_patrimonio" class="form-control">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" name="nome_patrimonio" id="nome_patrimonio" class="form-control" >
            </div>
            <div class="form-group">                
              <label>Descrição</label>
              <textarea name="descricao_patrimonio" id="descricao_patrimonio" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">                
              <label>Situação</label>
              <select name="status_patrimonio" id="status_patrimonio" class="form-control select2" style="width: 100%;">
                <option value="Ativo">Ativo</option>
                <option value="Baixa">Baixa</option>
                <option value="Conserto">Conserto</option>
                <option value="Danificado">Danificado</option>
              </select>
            </div>
            <div class="form-group">                
              <label>Departamento</label>
              <select name="departamento_patrimonio" id="departamento_patrimonio" class="form-control select2" style="width: 100%;">
                <?php 
                  $departamentos= new Departamento();
                  $departamentos=$departamentos->buscarDepartamentosRetornandoComVetor();
                  foreach($departamentos as $departamentos){?>
                    <option value="<?php echo $departamentos['coddep']?>"><?php echo $departamentos['nomdep']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" name="acao_formulario" value="editar-patrimonio">
              <button type="button" class="btn btn-default " data-dismiss="modal">Fechar</button>
              <button type="submit" id="adicionar-e-editar-patrimonio" class="btn btn-danger pull-right" >Editar</button>
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
      $('#example1').DataTable()
      //Money Euro
      $('[data-mask]').inputmask()
    });

    $('#adicionar-e-editar-patrimonio').click(function(e) {
      var id_patrimonio = $('#id_patrimonio').val();
      var departamento_patrimonio = $('#departamento_patrimonio').val(); 
      var nome_patrimonio = $('#nome_patrimonio').val();
      var descricao_patrimonio = $('#descricao_patrimonio').val();
      var status_patrimonio = $('#status_patrimonio').val();
      var acao_formulario = $('#acao_formulario').val();

      if(id_patrimonio == "" || nome_patrimonio == "" || descricao_patrimonio == ""){
        return alert("Todos os campos devem ser preenchidos!");
      }else {
        $.ajax({
            url: '../motor/control/controleDePatrimonios.php',
            data: {
              id_patrimonio : id_patrimonio,
              departamento_patrimonio : departamento_patrimonio,
              nome_patrimonio : nome_patrimonio,
              descricao_patrimonio : descricao_patrimonio,
              status_patrimonio : status_patrimonio,
              acao_formulario : acao_formulario
            },
            success: function(data) {
              obj = JSON.parse(data);
              console.log(obj.res);
              
              if(obj.res == 'patrimonio_ja_inserido') {
                alert("Este Código de Patrimônio já está inserido na Base de Dados!");
              } else if(obj.res == 'inserir_sucesso') {
                alert("Patrimônio adicionado com sucesso!");
              } else if(obj.res == 'inserir_erro') {
                alert("Patrimônio não foi adicionado. Algum erro ocorreu!");
              }else if(obj.res == 'editar_sucesso') {
                alert("Patrimônio editado com sucesso!");
              }else if(obj.res == 'editar_erro') {
                alert("Patrimônio editado com sucesso!");
              }else {
                alert("Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!");
              }
            },
            type:'post'
        });
      }    
    });

    $('#editar-patrimonio-modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient_id_patrimonio = button.data('whatever-id-patrimonio')
      var recipient_nome_patrimonio = button.data('whatever-nome-patrimonio') 
      var recipient_descricao_patrimonio = button.data('whatever-descricao-patrimonio')
      var recipient_status_patrimonio = button.data('whatever-status-patrimonio')
      var recipient_departamento_patrimonio = button.data('whatever-departamento-patrimonio')
          
      var modal = $(this)
      modal.find('.modal-title').text('Editar Património')
      modal.find('#id_patrimonio').val(recipient_id_patrimonio)
      modal.find('#nome_patrimonio').val(recipient_nome_patrimonio)
      modal.find('#descricao_patrimonio').val(recipient_descricao_patrimonio)
      modal.find('#status_patrimonio').val(recipient_status_patrimonio)
      modal.find('#departamento_patrimonio').val(recipient_departamento_patrimonio)
    });


  });
  
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>