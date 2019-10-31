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
    //recebe os dados do form
    $data_documento=$_REQUEST['datadoc'];
    $cod_tipodocumento=$_REQUEST['cod_tipodoc'];
    $cod_sobredocumento=$_REQUEST['cod_sobredoc'];
    $assuntodocumento=$_REQUEST['assuntodoc'];
    //cria o caminho do documento
    $caminhodocumento=$_REQUEST['caminhodoc'];
    $endereco_arquivo = $caminhodocumento.basename($_FILES["filedoc"]["name"]);
    //verifica a extensão de arquivo (.pdf, .txt)
    $docFileType = strtolower(pathinfo($endereco_arquivo,PATHINFO_EXTENSION));
    //armazena o nome do doc
    $nome_documento = basename($_FILES["filedoc"]["name"]);



    
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
            $var = $data_documento;
            $date = str_replace('/', '-', $var);

                
                $documento->setarValoresDaInstancia($assuntodocumento,$endereco_arquivo,$cod_sobredocumento, $cod_tipodocumento,date('Y-m-d', strtotime($date)), $nome_documento);
                $resposta = $documento->inserirDocumentoNoBanco();
                if($resposta === NULL){
                    $_SESSION['respostaDaRequisicao']='criar-erro';
                }
                else{
                    move_uploaded_file($_FILES["filedoc"]["tmp_name"], $endereco_arquivo);
                    $_SESSION['respostaDaRequisicao']='adicionar-sucesso';
                   
                }
                header("location: ../../system-pages/documentos/atas.php");
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
