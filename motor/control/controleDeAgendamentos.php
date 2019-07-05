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
    $descricao = $_REQUEST['descricao'];
    $id_objeto=$_REQUEST['id_objeto'];
    $datas_agendamento=$_REQUEST['datas_agendamento'];
    $id_horarios=$_REQUEST['id_horarios'];
    $acao_formulario = $_REQUEST['acao_formulario'];
    $_SESSION['respostaDaRequisicao']='erro';
	$agendamento = new Agendamento();
    
    if($acao_formulario == 'deletar-agendamento'){
        var_dump($id_agendamento);
    } else {
        switch($acao_formulario) {
            case 'criar-agendamento':
                
                break;	
    
            case 'editar-agendamento':
                
                break;			
        }
    }
    //header("location: ../../system-pages/agendamento.php");
?>
