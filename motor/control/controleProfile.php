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
    $email_atual=$_REQUEST['email_atual'];
    $email_novo=$_REQUEST['email_novo'];
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
                $verificaIgualdadeDosEmails = strcmp($senha_atual,$User['senusu']);
                if($verificaIgualdadeDosEmails == 0){
                    $User = new Usuario();
                    $resposta = $User->alterarSenhaDoUsuario($id_usuario,$senha_nova);
                    if ($resposta === NULL) {
                        $_SESSION['respostaDaRequisicao']='alterar-senha-sucesso';
                        header("location: ../../system-pages/profile.php");	
                    }
                    else {
                        $_SESSION['respostaDaRequisicao']='alterar-senha-erro';
                    }
                }else{
                    $_SESSION['respostaDaRequisicao'] = 'senha-atual-errada';  
                }                		
                break;

            case 'alterar-email':
                $User = $User->buscarUsuarioCadastradoPeloEmail($email_novo);
                if ($User === NULL){
                    $User = new Usuario();   
                    $User=$User->buscarUsuarioCadastradoPeloId($id_usuario);
                    $verificaIgualdadeDosEmails = strcmp($email_atual,$User['logusu']);
                    if($verificaIgualdadeDosEmails == 0){
                        $User = new Usuario();
                        $resposta = $User->alterarEmailDoUsuario($id_usuario,$email_novo);
                        if ($resposta === NULL) {
                            $_SESSION['respostaDaRequisicao']='alterar-email-sucesso';
                            header("location: ../../system-pages/profile.php");	
                        }
                        else {
                            $_SESSION['respostaDaRequisicao']='alterar-email-erro';
                        }
                    }else{
                        $_SESSION['respostaDaRequisicao'] = 'email-atual-errado';  
                    }
                }else{
                    $_SESSION['respostaDaRequisicao'] = 'email-ja-cadastrado';  
                }          		
                break;

            case 'editar-profile':
                $verificaExistenciaDoUsuarioComEmailInformado=$User->buscarUsuarioCadastradoPeloEmail($email);
                $User = new Usuario();
                $User->setarValoresProfile($codigo_departamento,$nome,$funcao);
                $resposta = $User->alterarInformacoesProfileDoUsuario($id_usuario);
                if ($resposta === NULL) {
                    $User=$User->buscarUsuarioCadastradoPeloId($id_usuario);
                    $_SESSION['nome'] = $User['nomusu'];
                    $_SESSION['funcao'] = $User['funusu'];
                    $_SESSION['respostaDaRequisicao']='editar-sucesso';
                }
                else {
                    $_SESSION['respostaDaRequisicao']='editar-erro';
                }
                break;			
        }
    }
    header("location: ../../system-pages/profile.php");
?>
