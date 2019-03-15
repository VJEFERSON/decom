<?php

    require_once "../requested.php";
    
    $showerros = true;
    if($showerros) {
        ini_set("display_errors", $showerros);
        error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
    }
    session_start();
    if(empty($_SESSION)){
        header("location: ../system-pages/usuarios.php");
    }

    $id_usuario=$_REQUEST['id_usuario'];
    $codigo_departamento=$_REQUEST['codigo_departamento'];
    $codigo_departamento=intval($codigo_departamento);
    $nome=$_REQUEST['nome'];
	$email=$_REQUEST['email'];
    $senha=$_REQUEST['senha'];
	$funcao=$_REQUEST['funcao'];
    $tipo_usuario=$_REQUEST['tipo_usuario'];
    $tipo_usuario=intval($tipo_usuario);
    $status_usuario=$_REQUEST['status_usuario'];
    $status_usuario=intval($status_usuario);	
	$acao_formulario = $_POST['acao_formulario'];
	
	$User = new Usuario();
    
    if($acao_formulario == 'deletar-usuario'){
        $res = $User->deletarUsuario($id_usuario);
        if ($res === NULL) {
            $res= 'true';	
        } else {
            $res = 'false';	
        }
        //echo $res;
    } else {
        $User->setarValoresDaInstancia($codigo_departamento,$nome,$email,$senha,$funcao,$tipo_usuario,$status_usuario);
        switch($acao_formulario) {
            case 'criar-usuario':
                $res = $User->inserirUsuarioNoBanco();
                if ($res === NULL) {
                    $res = 'true';
                }
                else {
                    $res = 'false';	
                }
                //echo $res;			
                header("location: ../../system-pages/usuarios.php");
                break;	
    
            case 'atualizar-usuario':
                $res = $User->alterarInformacoesDoUsuario($id_usuario);
                if ($res === NULL) {
                    $res= 'true';	
                }
                else {
                    $res = 'false';	
                }
                //echo $res;
                header("location: ../../system-pages/usuarios.php");
                break;			
        }
    }
?>
