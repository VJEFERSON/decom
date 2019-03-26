<?php

    require_once "../requested.php";
    
    $showerros = true;
    if($showerros) {
        ini_set("display_errors", $showerros);
        error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
    }
    session_start();
    if(empty($_SESSION)){
        header("location: ../../authentication/login.php");
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
	$acao_formulario = $_REQUEST['acao_formulario'];
    
    $_SESSION['respostaDaRequisicao']='erro';
    $User = new Usuario();
    
    if($acao_formulario == 'deletar-usuario'){
        $resposta = $User->deletarUsuario($id_usuario);
        if ($resposta === NULL) {
            $_SESSION['respostaDaRequisicao']='deletar-sucesso';	
        } else {
            $_SESSION['respostaDaRequisicao']='deletar-erro';	
        }
        header("location: ../../system-pages/usuarios.php");
    } else {
        switch($acao_formulario) {
            case 'criar-usuario':
                $verificaExistenciaDoUsuarioComEmailInformado=$User->buscarUsuarioCadastradoPeloEmail($email);
                if($verificaExistenciaDoUsuarioComEmailInformado === NULL){
                    $User->setarValoresDaInstancia($codigo_departamento,$nome,$email,$senha,$funcao,$tipo_usuario,$status_usuario);
                    $resposta = $User->inserirUsuarioNoBanco();
                    if ($resposta === NULL) {
                        $_SESSION['respostaDaRequisicao']='criar-erro';	
                    }
                    else {
                        $_SESSION['respostaDaRequisicao']='criar-sucesso';
                    }
                }else{
                    $_SESSION['respostaDaRequisicao'] = 'usuario-ja-inserido';  
                }		
                header("location: ../../system-pages/usuarios.php");
                break;	
    
            case 'editar-usuario':
            $User->setarValoresDaInstancia($codigo_departamento,$nome,$email,$senha,$funcao,$tipo_usuario,$status_usuario);
                $resposta = $User->alterarInformacoesDoUsuario($id_usuario);
                if ($resposta === NULL) {
                    $_SESSION['respostaDaRequisicao']='editar-sucesso';
                }
                else {
                    $_SESSION['respostaDaRequisicao']='editar-erro';
                }
                header("location: ../../system-pages/usuarios.php");
                break;			
        }
    }
    header("location: ../../system-pages/usuarios.php");
?>
