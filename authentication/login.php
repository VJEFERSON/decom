<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISA DECOM | UFVJM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="login.php"><b>SISA</b>DECOM</a>
    </div>
    <div>
      <h4 class="login-box-msg">Sistema de Agendamento do Departamento de Computação</h4>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"> 	
          Identifique-se por favor para ter acesso aos serviços de agendamento do Departamento de Computação!
      </p>
      <form >
        <div class="form-group has-feedback">
          <input type="email" id="email" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="senha" class="form-control" placeholder="Senha">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Lembrar Senha
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" id="logar" class="btn btn-primary btn-block btn-flat" value="Login">Entar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="login-box-msg"><a href="#">Recuperar Senha</a><br></p>
    </div>
    <!-- /.login-box-body -->
    <br/>
    <p class="login-box-msg">
      <strong>SISA 2019 <a href="http://decom.ufvjm.edu.br/">Departamento de Computação - DECOM</a>.</strong> Todos os direitos reservados.
    </p>
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../plugins/iCheck/icheck.min.js"></script>
  <!-- Sweet Alert 2-->
  <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

  <!-- Page Scripts --->
  <script>
    $(document).ready(function(e) {
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
      $('#logar').click(function(e) {
        var email = $('#email').val();
        var senha = $('#senha').val();

        if( !email || !senha ) {
          Swal.fire({
            type: 'info',
            title: 'Atenção',
            text: 'Todos os campos devem ser preenchidos!',
            timer: 10000
          });
          
        } else {
          $.ajax({
            url: '../motor/control/autenticacaoDeUsuarios.php',
            data: {
              email : email,
              senha : senha
            },
            success: function(data) {
              obj = JSON.parse(data);
              console.log(obj.res);

              if(obj.res == 'true') {
                document.location.href = '../system-pages/dashboard.php';
              } else if(obj.res == 'no_user_found') {
                alert("Usuário com o Email informado não foi encontrado!");
              } else if(obj.res == 'wrong_password') {
                alert("Senha incorreta!");
              }else {
                alert("Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!");
              }
            },
            type: 'POST'
          });     
        }
      });
    });
  </script>
  <!-- /. Page Scripts --->
  </body>
</html>
