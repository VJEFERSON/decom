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
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
            Agendamentos
            <small>Editar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="usuarios.php"><i class="fa fa-users"></i>Agendamentos</a></li><li><a href="agendamento-editar.php">Editar</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
          <div class="col-xs-12">
              <!-- /.box -->
              <div class="box">
                <div class="box-header">
                  <p>Informações</p>
                </div>
                <!-- /.box-header -->
                <?php  
                  $codobj=$_REQUEST['idobj'];
                  $codhor=$_REQUEST['idhor'];
                  $datage=$_REQUEST['iddatage'];
                  $agendamento= new Agendamento();
                  $agendamento=$agendamento->buscarAgendamento($codobj, $codhor, $datage);
                  if(empty($agendamento)) {
                 ?>
                      <h4 class="well"> Falha no momento da edição. Tente novamente mais tarde.
                      </h4>
                  <?php
                      } else {
                        ?>
                      </h4>
                      <?php
                    ?>
            
                <div class="box-body">
                  <form class="form-horizontal" action="../motor/control/controleDeAgendamentos.php" id="targetForm" method="Post">  
                   <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $agendamento['codusu_tusu']?>">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nome Objeto</label>
                        <div class="col-sm-10">
                          
                          <select type="text" class="form-control select2" id="id_objeto" name="id_objeto" disabled>
                          <?php 
                            $objetos= new Objeto();
                            $objetos=$objetos->buscarObjetosRetornandoComVetor();
                            foreach($objetos as $objetos){
                              if($objetos['codobj']==$agendamento['codobj']){ ?>
                                <option value="<?php echo $objetos['codobj']?>" selected><?php echo $objetos['nomobj']?></option>  
                             <?php }else{?>
                              <option value="<?php echo $objetos['codobj']?>"><?php echo $objetos['nomobj']?></option>
                          <?php }} ?>
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Descrição</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="descricao" name="descricao" value= "<?php echo $agendamento['desage']?>" placeholder="<?php echo $agendamento['desage']?>" disabled>
                        </div>
                      </div>
                      <div class="form-group">                
                        <label for="inputName" class="col-sm-2 control-label">Horario</label>
                        <div class="col-sm-10">
                        <select id= "id_horarios" name="id_horarios" class="form-control select2" style="width: 100%;" disabled>
                            <?php 
                            $horarios= new Horario();
                            $horarios=$horarios->buscarHorariosRetornandoComVetor($date_picker,$id_objeto);
                            foreach($horarios as $horarios){
                              if($agendamento['codhor_thor']==$horarios['codhor']){
                                ?>
                                <option value="<?php echo $horarios['codhor']?>" selected ><?php echo $horarios['nomhor']?></option>
                            <?php }else{?>
                              <option value="<?php echo $horarios['codhor']?>"><?php echo $horarios['nomhor']?></option>
                              <?php }}?>
                        </select>
                        </div>
                      </div>
                      <div class="form-group">                
                        <label for="inputName" class="col-sm-2 control-label">Data</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                          </div>
                        <input type="text" class="form-control pull-right" id="datas_agendamento" name="datas_agendamento" placeholder=<?php echo $agendamento['datage']?> disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="hidden" name="acao_formulario" value="editar-agendamento">
                        
                          <input type="hidden" name="iddatage" value="<?php echo $datage?>">
                          <input type="hidden" name="idhor" value="<?php echo $codhor?>">
                          <input type="hidden" name="idobj" value="<?php echo $codobj?>">
                          <a type="button" href="agendamento.php" class="btn btn-default" id="voltar-agendamento">Voltar</a>
                          <a type="button" class="btn bg-navy" id="habilita-edicao-agendamento">Habilitar Edição</a>
                          <a type="button" class="btn bg-navy " id="cancela-edicao-agendamento">Cancelar</a>
                          <button type="button" class="btn bg-maroon" id="edita-agendamento">Editar</button>
                        </div>
                      </div>
                  </form>
                </div>
                 <?php
				            }
                  ?>
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
    <!-- date-range-picker -->
  <script src="../bower_components/moment/min/moment.min.js"></script>
  <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- page script -->
    <script>
      $(document).ready(function(e) {








        $("#edita-agendamento").hide();
        $("#cancela-edicao-agendamento").hide();


        $(function () {
          //Money Euro
          $('[data-mask]').inputmask()
        });

        $('#habilita-edicao-agendamento').click(function(e) {
          $("#habilita-edicao-agendamento").hide();
          $("#voltar-agendamento").hide();
          $("#edita-agendamento").show();
          $("#cancela-edicao-agendamento").show();
          $('#id_objeto').prop('disabled', false);
          $('#descricao').prop('disabled', false);
          $('#id_horarios').prop('disabled', false);
          $('#datas_agendamento').prop('disabled', false);
          $('#tipo_usuario').prop('disabled', false);
          $('#status_usuario').prop('disabled', false);
        });

        $('#cancela-edicao-agendamento').click(function(e) {
          $("#edita-agendamento").hide();
          $("#cancela-edicao-agendamento").hide();
          $("#voltar-agendamento").show();
          $("#habilita-edicao-agendamento").show();
          $('#id_objeto').prop('disabled', true);
          $('#descricao').prop('disabled', true);
          $('#id_horarios').prop('disabled', true);
          $('#datas_agendamento').prop('disabled', true);
          $('#tipo_usuario').prop('disabled', true);
          $('#status_usuario').prop('disabled', true);
        });

        $('#edita-agendamento').click(function(e) {
          e.preventDefault();
          var id_objeto = $('#id_objeto').val();
          var id_hoarios = $('#idhorarios').val();
          var datage = $('#datage').val();
          if(id_objeto == ""){
            return alert("Todos os campos devem ser preenchidos!");
          }else {
            $("#targetForm" ).submit();
          }   
        });
        //Date range picker
        var dateToday = new Date();
        dataAge = "<?php echo $agendamento['datage'] ?>";
        dataAge_parts = dataAge.split("-");
        var dataAgd = new Date(dataAge_parts[0],dataAge_parts[1] - 1, dataAge_parts[2]);
        //var dataAgd = new Date('2020','01','01');

        $('#datas_agendamento').daterangepicker({
            minDate: dateToday,
            startDate: dataAgd,
            singleDatePicker: true,
            "locale": {
                "format": "YYYY/MM/DD",
                "daysOfWeek": [
                    "Dom",
                    "Seg",
                    "Ter",
                    "Qua",
                    "Qui",
                    "Sex",
                    "Sáb"
                ],
                "monthNames": [
                    "Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro"
                ],
            },
            isInvalidDate: function(date) {
                return (date.day() == 0);
            },
            "dateLimit": {
                "month": 1
            }
        });
      });
      
      

    </script>

  </body>

</html>