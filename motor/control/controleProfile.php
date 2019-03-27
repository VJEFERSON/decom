<?php

    require_once "../requested.php";
    
    $showerros = true;
    if($showerros) {
        ini_set("display_errors", $showerros);
        error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
    }
    session_start();
    if(empty($_SESSION) || $_SESSION['status_usuario'] == 0){
        header("location: ../../authentication/login.php");
    }

    $id_usuario=$_REQUEST['id_usuario'];
    $id_usuario=intval($id_usuario);
    $codigo_departamento=$_REQUEST['codigo_departamento'];
    $codigo_departamento=intval($codigo_departamento);
    $nome=$_REQUEST['nome'];
    $email=$_REQUEST['email'];
    $senha_atual=$_REQUEST['senha_atual'];
    $senha_nova=$_REQUEST['senha_nova'];
	$funcao=$_REQUEST['funcao'];	
	$acao_formulario = $_REQUEST['acao_formulario'];
    
    $_SESSION['respostaDaRequisicao']='erro';
    $User = new Usuario();

    if($acao_formulario == 'desativar-usuario'){
        $resposta = $User->desativarUsuario($id_usuario);
        if ($resposta === NULL){
            session_destroy();
            $_SESSION['respostaDaRequisicao']='vazio';
            header( "Location: ../../authentication/login.php");	
        } else {
            $_SESSION['respostaDaRequisicao']='desativar-erro';	
        }
    } else {
        switch($acao_formulario) {
            case 'alterar-senha':
                $User=$User->buscarUsuarioCadastradoPeloId($id_usuario);
                $verificaIgualdadeDasSenhas = strcmp($senha_atual,$User['senusu']);
                if($verificaIgualdadeDasSenhas == 0){
                    $User = new Usuario();
                    $resposta = $User->alterarSenhaDoUsuario($id_usuario,$senha_nova);
                    if ($resposta === NULL) {
                        $_SESSION['respostaDaRequisicao']='alterar-sucesso';	
                    }
                    else {
                        $_SESSION['respostaDaRequisicao']='alterar-erro';
                    }
                }else{
                    $_SESSION['respostaDaRequisicao'] = 'senha-atual-errada';  
                }                		
                break;	
            case 'editar-profile':
                $verificaExistenciaDoUsuarioComEmailInformado=$User->buscarUsuarioCadastradoPeloEmail($email);
                if($verificaExistenciaDoUsuarioComEmailInformado === NULL){
                    $User->setarValoresProfile($codigo_departamento,$nome,$email,$funcao);
                    $resposta = $User->alterarInformaçõesProfileDoUsuario($id_usuario);
                    if ($resposta === NULL) {
                        $_SESSION['respostaDaRequisicao']='editar-sucesso';
                    }
                    else {
                        $_SESSION['respostaDaRequisicao']='editar-erro';
                    }
                }else{
                    $_SESSION['respostaDaRequisicao'] = 'email-ja-cadastrado';  
                }
                break;			
        }
    }
    header("location: ../../system-pages/profile.php");
?>
