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

	$horario = new Horario();
    
    if($acao_formulario == 'deletar-horario'){
        $res = $horario->deletarHorario($id_horario);
        if ($res === NULL) {
            $res= 'true';	
        } else {
            $res = 'false';	
        }
        header("location: ../../system-pages/horarios.php");
    } else {
        $horario->setarValoresDaInstancia($nome_horario,$descricao_horario);
        switch($acao_formulario) {
            case 'criar-horario':
                $res = $horario->inserirHorarioNoBanco();
                if ($res === NULL) {
                    $res = 'true';
                }
                else {
                    $res = 'false';	
                }			
                header("location: ../../system-pages/horarios.php");
                break;	
    
            case 'editar-horario':
                $res = $horario->alterarInformacoesDoHorario($id_horario);
                if ($res === NULL) {
                    $res= 'true';	
                }
                else {
                    $res = 'false';	
                }
                header("location: ../../system-pages/horarios.php");
                break;			
        }
    }
?>
