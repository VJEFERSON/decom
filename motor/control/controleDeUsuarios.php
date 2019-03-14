<?php
    require_once "../requested.php";
   
    $id_usuario=$_REQUEST['id_usuario'];
    $nome=$_REQUEST['nome'];
	$email=$_REQUEST['email'];
    $senha=$_REQUEST['senha'];
	$funcao=$_REQUEST['funcao'];
	$tipo_usuario=$_REQUEST['tipo_usuario'];	
	$acao_formulario = $_POST['acao_formulario'];
	
	$User = new Usuario();
    
    if($acao_formulario != 'deletar-usuario'){
        $User->setarValoresDaInstancia($nome,$email,$senha,$funcao,$tipo_usuario);
        switch($acao_formulario) {
            case 'criar-usuario':
                $res = $User->inserirUsuarioNoBanco();
                if ($res === NULL) {
                    $res = "true";
                }
                else {
                    $res = "false";	
                }			
                header("location: ../system-pages/usuarios.php");
                break;	
    
            case 'atualizar-usuario':
                $res = $User->alterarInformacoesDoUsuario($id_usuario);
                if ($res === NULL) {
                    $res= 'true';	
                }
                else {
                    $res = 'false';	
                }
                // echo $res;
                header("location: ../system-pages/usuarios.php");
                break;			
        }
    }else{
        $res = $User->deletarUsuario($id_usuario);
        if ($res === NULL) {
            $res= 'true';	
        } else {
            $res = 'false';	
        }
        // echo $res;
    }
?>
