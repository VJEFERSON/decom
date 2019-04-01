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

    $id_agendamento=$_REQUEST['id_agendamento'];
    	
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
