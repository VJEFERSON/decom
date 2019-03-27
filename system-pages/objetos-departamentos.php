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
    <title>SISA DECOM | Objetos e Departamentos</title>
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
            <li  class="active"><a href="objetos-departamentos.html"><i class="fa fa-object-ungroup"></i> <span>Objetos e Departamentos</span></a></li>
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
          <h1>Objetos</h1>
          <ol class="breadcrumb">
            <li><a href="objetos-departamentos.php"><i class="fa fa-object-ungroup"></i>Objetos e Departamentos</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
          <div class="row">
            <div class="col-md-12">
              <?php 
                        if($_SESSION['respostaDaRequisicao']=='vazio'){
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='deletar-objeto-sucesso'){
                          $alerta = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Removido!</h4>
                          Objeto foi removido com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='deletar-objeto-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Remover!</h4>
                          Objeto não foi removido com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='criar-objeto-sucesso'){
                          $alerta = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Adicionado!</h4>
                          Objeto foi adicionado com sucesso! Clique no botão &times para fechar!
                        </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='criar-objeto-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Adicionar!</h4>
                          Objeto não foi adicionado! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='editar-objeto-sucesso'){
                          $alerta = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Editado!</h4>
                          Objeto foi editado com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='editar-objeto-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Editar!</h4>
                          Objeto não foi editado! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='deletar-departamento-sucesso'){
                          $alerta = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Removido!</h4>
                          Departamento foi removido com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='deletar-departamento-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Remover!</h4>
                          Departamento não foi removido com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='criar-departamento-sucesso'){
                          $alerta = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Adicionado!</h4>
                          Departamento foi adicionado com sucesso! Clique no botão &times para fechar!
                        </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='criar-departamento-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Adicionar!</h4>
                          Departamento não foi adicionado! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='editar-departamento-sucesso'){
                          $alerta = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Editado!</h4>
                          Departamento foi editado com sucesso! Clique no botão &times para fechar!
                          </div>';
                          $_SESSION['respostaDaRequisicao']='vazio';
                        }else if($_SESSION['respostaDaRequisicao']=='editar-departamento-erro'){
                          $alerta = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Editar!</h4>
                          Departamento não foi editado! Clique no botão &times para fechar!
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
                  <h3 class="box-title">Objetos Cadastrados</h3>
                </div>
                <div class="box-header">
                  <button type="button" class="btn btn-block bg-olive btn-sm" data-toggle="modal" data-target="#modal-adicionar-objeto">Adicionar</button>
                </div>
                <!-- /.box-header -->
                <?php  
                    $objetos= new Objeto();
                    $objetos=$objetos->buscarObjetosRetornandoComVetor();
                    if(empty($objetos)) {
                ?>
                      <h4 class="well"> Nenhum dado encontrado. </h4>
                <?php
                    } else {
                ?>
                <div class="box-body">
                  <table id="table-objeto" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Nome do Objeto</th>
                        <th>Departamento</th>
                        <th>Campus</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($objetos as $objetos){
                      ?>
                      <tr>
                        <td><?php echo $objetos['codobj'];?></td>
                        <td><?php echo $objetos['nomobj'];?></td>
                        <td><?php echo $objetos['nomdep'];?></td>
                        <td><?php echo $objetos['camobj'];?></td>
                        <td>
                          <a type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editar-objeto-modal" data-whatever-id-objeto="<?php echo $objetos['codobj'];?>" data-whatever-departamento-objeto="<?php  echo $objetos["coddep_tdep"]?>" 
                            data-whatever-nome-objeto="<?php  echo $objetos["nomobj"]?>" data-whatever-descricao-objeto="<?php  echo $objetos["desobj"]?>"
                            data-whatever-campus="<?php  echo $objetos["camobj"]?>">
                            <i class="fa fa-edit"></i> Edit
                          </a>
                          <a type="button" href="../motor/control/controleDeObjetos.php?id_objeto=<?php  echo $objetos["codobj"]?>&acao_formulario=deletar-objeto" class="btn btn-danger btn-xs" data-confirm-objeto="Realmente deseja <b>Remover</b> o Objeto?">
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
                        <th>Nome do Objeto</th>
                        <th>Departamento</th>
                        <th>Campus</th>
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Departamentos
          </h1>
          <ol class="breadcrumb">
            <li><a href="objetos-departamentos.php"><i class="fa fa-object-ungroup"></i>Objetos e Departamentos</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->
              <div class="box">
                <div class="box-header">
                  <div class="box-header">
                    <h3 class="box-title">Departamentos Cadastrados</h3>
                  </div>
                  <button type="button" class="btn btn-block bg-olive btn-sm" data-toggle="modal" data-target="#modal-adicionar-departamento">Adicionar</button>
                </div>
                <?php  
                  $departamentos= new Departamento();
                  $departamentos=$departamentos->buscarDepartamentosRetornandoComVetor();
                  if(empty($departamentos)) {
                ?>
                  <h4 class="well"> Nenhum dado encontrado. </h4>
                <?php
                  } else {
                ?>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="table-departamento" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Nome do Departamento</th>
                        <th>Descrição</th>
                        <th>Campus</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($departamentos as $departamentos){
                      ?>
                      <tr>
                        <td><?php echo $departamentos['coddep'];?></td>
                        <td><?php echo $departamentos['nomdep'];?></td>
                        <td><?php echo $departamentos['desdep'];?></td>
                        <td><?php echo $departamentos['locdep'];?></td>
                        <td><?php echo $departamentos['ciddep'];?></td>
                        <td>
                          <a type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editar-departamento-modal" data-whatever-id-departamento="<?php  echo $departamentos["coddep"]?>" data-whatever-nome-departamento="<?php  echo $departamentos["nomdep"]?>" 
                            data-whatever-descricao-departamento="<?php  echo $departamentos["desdep"]?>" data-whatever-campus="<?php  echo $departamentos["locdep"]?>"
                            data-whatever-cidade="<?php  echo $departamentos["ciddep"]?>">
                            <i class="fa fa-edit"></i> Edit
                          </a>
                          <a type="button" href="../motor/control/controleDeDepartamentos.php?id_departamento=<?php  echo $departamentos["coddep"]?>&acao_formulario=deletar-departamento" class="btn btn-danger btn-xs" data-confirm-departamento="Realmente deseja <b>Remover</b> o Departamento?">
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
                        <th>Nome do Objeto</th>
                        <th>Departamento</th>
                        <th>Campus</th>
                        <th>Cidade</th>
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
      <!-- Modal Adicionar Objeto-->
      <div class="modal fade" id="modal-adicionar-objeto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Adicionar Objeto</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../motor/control/controleDeObjetos.php" id="targetFormObjeto" method="Post">
                <div class="form-group">
                  <label>Nome</label>
                  <input name="nome_objeto" id="nome_objeto" type="text" class="form-control" placeholder="Nome do Objeto ...">
                </div>
                <div class="form-group">                
                  <label>Descrição</label>
                  <textarea name="descricao_objeto" id="descricao_objeto" class="form-control" rows="3" placeholder="Descrição do Objeto ..."></textarea>
                </div>
                <div class="form-group">                
                  <label>Departamento</label>
                  <select name="departamento_objeto" id="departamento_objeto" class="form-control select2" style="width: 100%;">
                    <?php 
                      $departamentos= new Departamento();
                      $departamentos=$departamentos->buscarDepartamentosRetornandoComVetor();
                      foreach($departamentos as $departamentos){?>
                        <option value="<?php echo $departamentos['coddep']?>"><?php echo $departamentos['nomdep']?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">                
                  <label>Campus</label>
                  <select name="campus" id="campus" class="form-control select2" style="width: 100%;">
                    <option value="Diamantina Campus JK" selected="selected">Diamantina Campus JK</option>
                    <option value="Diamantina Campus 1">Diamantina Campus 1</option>
                    <option value="Teófilo Otoni">Teófilo Otoni</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="hidden" name="acao_formulario" value="criar-objeto">
                  <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                  <button type="submit" id="adicionar-e-editar-objeto" class="btn btn-success pull-right">Adicionar</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Editar Objeto Modal-->
      <div class="modal fade" id="editar-objeto-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Sair</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../motor/control/controleDeObjetos.php" id="targetFormObjeto" method="Post">
                <input type="hidden" id="id_objeto"  name="id_objeto">
                <div class="form-group">
                  <label>Nome</label>
                  <input name="nome_objeto" id="nome_objeto" type="text" class="form-control" >
                </div>
                <div class="form-group">                
                  <label>Descrição</label>
                  <textarea name="descricao_objeto" id="descricao_objeto" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">                
                  <label>Departamento</label>
                  <select name="departamento_objeto" id="departamento_objeto" class="form-control select2" style="width: 100%;">
                    <?php 
                      $departamentos= new Departamento();
                      $departamentos=$departamentos->buscarDepartamentosRetornandoComVetor();
                      foreach($departamentos as $departamentos){?>
                        <option value="<?php echo $departamentos['coddep']?>"><?php echo $departamentos['nomdep']?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">                
                  <label>Campus</label>
                  <select name="campus" id="campus" class="form-control select2" style="width: 100%;">
                    <option value="Diamantina Campus JK">Diamantina Campus JK</option>
                    <option value="Diamantina Campus 1">Diamantina Campus 1</option>
                    <option value="Teófilo Otoni">Teófilo Otoni</option>
                  </select>
                </div> 
                <div class="form-group">
                  <input type="hidden" name="acao_formulario" value="editar-objeto">
                  <button type="button" class="btn btn-default " data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-danger pull-right" id="adicionar-e-editar-objeto">Editar</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Modal Adicionar Departamento-->
      <div class="modal fade" id="modal-adicionar-departamento">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Adicionar Departamento</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../motor/control/controleDeDepartamentos.php" id="targetFormDepartamento" method="Post">
                <div class="form-group">
                  <label>Nome</label>
                  <input name="nome_departamento" id="nome_departamento"type="text" class="form-control" placeholder="Nome do Departamento ...">
                </div>
                <div class="form-group">                
                  <label>Descrição</label>
                  <textarea name="descricao_departamento" id="descricao_departamento" class="form-control" rows="3" placeholder="Descrição do Departamento ..."></textarea>
                </div>
                <div class="form-group">                
                  <label>Campus</label>
                  <select class="form-control select2" style="width: 100%;" name="campus" id="campus">
                    <option selected="selected" value="Campus JK">Campus JK</option>
                    <option value="Campus 1">Campus 1</option>
                    <option value="Outro">Outro</option>
                  </select>
                </div>
                <div class="form-group">                
                  <label>Cidade</label>
                  <select class="form-control select2" style="width: 100%;" name="cidade" id="cidade">
                    <option value="Diamantina" selected="selected">Diamantina</option>
                    <option value="Teófilo Otoni">Teófilo Otoni</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="hidden" name="acao_formulario" value="criar-departamento">
                  <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                  <button type="submit" id="adicionar-e-editar-departamento" class="btn btn-success pull-right">Adicionar</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Editar Departamento Modal-->
      <div class="modal fade" id="editar-departamento-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Sair</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../motor/control/controleDeDepartamentos.php" id="targetFormDepartamento" method="Post">
                <input type="hidden" id="id_departamento"  name="id_departamento">
                <div class="form-group">
                  <label>Nome</label>
                  <input name="nome_departamento" id="nome_departamento"type="text" class="form-control" placeholder="Nome do Departamento ...">
                </div>
                <div class="form-group">                
                  <label>Descrição</label>
                  <textarea name="descricao_departamento" id="descricao_departamento" class="form-control" rows="3" placeholder="Descrição do Departamento ..."></textarea>
                </div>
                <div class="form-group">                
                  <label>Campus</label>
                  <select class="form-control select2" style="width: 100%;" name="campus" id="campus">
                    <option value="Campus JK">Campus JK</option>
                    <option value="Campus 1">Campus 1</option>
                    <option value="Outro">Outro</option>
                  </select>
                </div>
                <div class="form-group">                
                  <label>Cidade</label>
                  <select class="form-control select2" style="width: 100%;" name="cidade" id="cidade">
                    <option value="Diamantina">Diamantina</option>
                    <option value="Teófilo Otoni">Teófilo Otoni</option>
                  </select>
                </div>    
                <div class="form-group">
                  <input type="hidden" name="acao_formulario" value="editar-departamento">
                  <button type="button" class="btn btn-default " data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-danger pull-right" id="adicionar-e-editar-departamento">Editar</button>
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
          $('#table-objeto').DataTable()
          $('#table-departamento').DataTable()
          
          //Money Euro
          $('[data-mask]').inputmask()
        });

        $('#adicionar-e-editar-objeto').click(function(e) {
          e.preventDefault();
          var nome_objeto= $('#nome_objeto').val();
          var descricao_objeto= $('#descricao_objeto').val();

          if(nome_objeto == "" || descricao_objeto == ""){
            return alert("Todos os campos devem ser preenchidos!");
          }else {
            $("#targetFormObjeto" ).submit();
          }    
        });

        $('a[data-confirm-objeto]').click(function(e) {
          var href= $(this).attr('href');
          if(!$('#remover-objeto-modal').length){
            $('body').append('<div class="modal fade" id="remover-objeto-modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Remover Objeto</h4></div><div class="modal-body"><div class="modal-body">Realmente deseja <b>Remover</b> o Objeto?</b></div><div class="modal-footer" id="sair"><button  class="btn btn-secondary" type="button"  data-dismiss="modal">Cancel</button><a id="data-confirma-acao" type="button" class="btn btn-danger">Remover</a></div></div></div></div></div>');
          }
          $('#data-confirma-acao').attr('href',href)
          $('#remover-objeto-modal').modal({show:true});
          return false;
        });

        $('#editar-objeto-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var recipient_id_objeto = button.data('whatever-id-objeto')  
          var recipient_nome_objeto = button.data('whatever-nome-objeto') 
          var recipient_descricao_objeto = button.data('whatever-descricao-objeto')
          var recipient_departamento_objeto = button.data('whatever-departamento-objeto')
          var recipient_campus = button.data('whatever-campus')
              
          var modal = $(this)
          modal.find('.modal-title').text('Editar Objeto')
          modal.find('#id_objeto').val(recipient_id_objeto)
          modal.find('#nome_objeto').val(recipient_nome_objeto)
          modal.find('#descricao_objeto').val(recipient_descricao_objeto)
          modal.find('#departamento_objeto').val(recipient_departamento_objeto)
          modal.find('#campus').val(recipient_campus)
        });

        $('#adicionar-e-editar-departamento').click(function(e) {
          e.preventDefault();
          var nome_departamento = $('#nome_departamento').val();
          var descricao_departamento = $('#descricao_departamento').val();

          if(nome_departamento == "" || descricao_departamento == ""){
            return alert("Todos os campos devem ser preenchidos!");
          }else {
            $("#targetFormDepartamento" ).submit();
          }    
        });    

        $('a[data-confirm-departamento]').click(function(e) {
          var href= $(this).attr('href');
          if(!$('#remover-departamento-modal').length){
            $('body').append('<div class="modal fade" id="remover-departamento-modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Remover Departamento</h4></div><div class="modal-body"><div class="modal-body">Realmente deseja <b>Remover</b> o Departamento?</b></div><div class="modal-footer" id="sair"><button  class="btn btn-secondary" type="button"  data-dismiss="modal">Cancel</button><a id="data-confirma-acao" type="button" class="btn btn-danger">Remover</a></div></div></div></div></div>');
          }
          $('#data-confirma-acao').attr('href',href)
          $('#remover-departamento-modal').modal({show:true});
          return false;
        });

        $('#editar-departamento-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var recipient_id_departamento = button.data('whatever-id-departamento')  
          var recipient_nome_departamento = button.data('whatever-nome-departamento') 
          var recipient_descricao_departamento = button.data('whatever-descricao-departamento')
          var recipient_campus = button.data('whatever-campus')
          var recipient_cidade = button.data('whatever-cidade')
              
          var modal = $(this)
          modal.find('.modal-title').text('Editar Departamento')
          modal.find('#id_departamento').val(recipient_id_departamento)
          modal.find('#nome_departamento').val(recipient_nome_departamento)
          modal.find('#descricao_departamento').val(recipient_descricao_departamento)
          modal.find('#campus').val(recipient_campus)
          modal.find('#cidade').val(recipient_cidade)
        });

      });
    </script>
  </body>
</html>