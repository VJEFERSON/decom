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
    //$codigo_objeto=$_REQUEST['objeto_editar'];
    //$data=$_REQUEST['data_editar'];
   // $horario=$_REQUEST['horario_editar'];
    $codobj=$_REQUEST['idobj'];
    $codhor=$_REQUEST['idhor'];
    $datage=$_REQUEST['iddatage'];
    $id_usuario=$_REQUEST['id_usuario'];
    $descricao = $_REQUEST['descricao'];
    $id_objeto=$_REQUEST['id_objeto'];
    $datas_agendamento=$_REQUEST['datas_agendamento'];
    $id_horarios=$_REQUEST['id_horarios'];
    $acao_formulario = $_REQUEST['acao_formulario'];
    $action = $_REQUEST['action'];
    $_SESSION['respostaDaRequisicao']='erro';
	$agendamento = new Agendamento();
    
    if($acao_formulario == 'deletar-agendamento'){
        $resposta = $agendamento->deletarAgendamento($codobj, $codhor, $datage);
        
        if ($resposta === NULL) {
            $_SESSION['respostaDaRequisicao']='deletar-sucesso';	
        } else {
         $_SESSION['respostaDaRequisicao']='deletar-erro';	
        }
        header("location: ../../system-pages/agendamento.php");
        } else {
        switch($acao_formulario) {
            case 'criar-agendamento':
                
                $agendamento->setarValoresDaInstancia($id_objeto, $id_usuario, $id_horarios,$datas_agendamento,$descricao,'0');
                $resposta = $agendamento->inserirAgendamentoNoBanco();
                if($resposta === NULL){
                    $_SESSION['respostaDaRequisicao']='criar-erro';
                }
                else{
                    $_SESSION['respostaDaRequisicao']='criar-sucesso';
                }
                header("location: ../../system-pages/agendamento.php");
                break;	
    
            case 'editar-agendamento':
                $agendamento->setarValoresDaInstancia($id_objeto, $id_usuario, $id_horarios, $datas_agendamento, $descricao, '0');
                $resposta = $agendamento->atualizarValoresDoAgendamento($codobj, $datage, $codhor);
                if($resposta === NULL){
                    $_SESSION['respostaDaRequisicao']='editar-sucesso';
                }   
                else{
                    $_SESSION['respostaDaRequisicao']='editar-erro';
                }
                header("location: ../../system-pages/agendamento.php");
                break;	

        }
        }
    //header("location: ../../system-pages/agendamento.php");
?>
