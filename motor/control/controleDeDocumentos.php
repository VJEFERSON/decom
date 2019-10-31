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
    
    $data_documento="2019-01-01";//$_REQUEST['datadoc'];
    $cod_tipodocumento=$_REQUEST['cod_tipodoc'];
    $cod_sobredocumento=$_REQUEST['cod_sobredoc'];
    $assuntodocumento=$_REQUEST['assuntodoc'];
    $caminhodocumento="teste"; //$_REQUEST['caminhodoc'];
    
    $acao_formulario = $_REQUEST['acao_formulario'];
    $action = $_REQUEST['action'];
    $_SESSION['respostaDaRequisicao']='erro';
    $documento = new Documento();
    
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
            case 'adicionar-documento':
                echo $data_documento;
                echo $cod_tipodocumento;
                echo $cod_sobredocumento;
                echo $assuntodocumento;
                echo $caminhodocumento;

                $documento->setarValoresDaInstancia($assuntodocumento,$caminhodocumento,$cod_sobredocumento, $cod_tipodocumento,$data_documento);
                $resposta = $documento->inserirDocumentoNoBanco();
                if($resposta === NULL){
                    $_SESSION['respostaDaRequisicao']='criar-erro';
                }
                else{
                    $_SESSION['respostaDaRequisicao']='criar-sucesso';
                }
               // header("location: ../../system-pages/documentos/atas.php");
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
