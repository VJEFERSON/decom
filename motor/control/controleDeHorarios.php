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

    $id_horario=$_REQUEST['id_horario'];
    $nome_horario=$_REQUEST['nome_horario'];
    $descricao_horario=$_REQUEST['descricao_horario'];	
	$acao_formulario = $_REQUEST['acao_formulario'];

    $_SESSION['respostaDaRequisicao']='erro';
	$horario = new Horario();
    
    if($acao_formulario == 'deletar-horario'){
        $res = $horario->deletarHorario($id_horario);
        if ($res === NULL) {
            $_SESSION['respostaDaRequisicao']='deletar-sucesso';	
        } else {
            $_SESSION['respostaDaRequisicao']='deletar-erro';
        }
        header("location: ../../system-pages/horarios.php");
    } else {
        $horario->setarValoresDaInstancia($nome_horario,$descricao_horario);
        switch($acao_formulario) {
            case 'criar-horario':
                $res = $horario->inserirHorarioNoBanco();
                if ($res === NULL) {
                    $_SESSION['respostaDaRequisicao']='criar-erro';	
                }
                else {
                    $_SESSION['respostaDaRequisicao']='criar-sucesso';	
                }			
                header("location: ../../system-pages/horarios.php");
                break;	
    
            case 'editar-horario':
                $res = $horario->alterarInformacoesDoHorario($id_horario);
                if ($res === NULL) {
                    $_SESSION['respostaDaRequisicao']='editar-sucesso';	
                }
                else {
                    $_SESSION['respostaDaRequisicao']='editar-erro';	
                }
                header("location: ../../system-pages/horarios.php");
                break;			
        }
    }
    header("location: ../../system-pages/horarios.php");
?>
