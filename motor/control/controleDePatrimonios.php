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

    $id_patrimonio=$_REQUEST['id_patrimonio'];
    $id_patrimonio=intval($id_patrimonio);
    $codigo_departamento=$_REQUEST['departamento_patrimonio'];
    $codigo_departamento=intval($codigo_departamento);
    $nome_patrimonio=$_REQUEST['nome_patrimonio'];
    $descricao_patrimonio=$_REQUEST['descricao_patrimonio'];	
    $status_patrimonio=$_REQUEST['status_patrimonio'];
    $acao_formulario = $_REQUEST['acao_formulario'];

    $_SESSION['respostaDaRequisicao']='erro';
	$patrimonio = new Patrimonio();
    
    if($acao_formulario == 'deletar-patrimonio'){
        $res = $patrimonio->deletarPatrimonio($id_patrimonio);
        if ($res === NULL) {
            $_SESSION['respostaDaRequisicao']='deletar-sucesso';	
        } else {
            $_SESSION['respostaDaRequisicao']='deletar-erro';
        }
        header("location: ../../system-pages/patrimonio.php");
    } else {
        switch($acao_formulario) {
            case 'criar-patrimonio':
                $verificaExistenciaDoPatrimonio=$patrimonio->buscarPatrimonioCadastradoPeloId($id_patrimonio);
                if($verificaExistenciaDoPatrimonio === NULL){
                    $patrimonio->setarValoresDaInstancia($id_patrimonio,$codigo_departamento,$nome_patrimonio,$descricao_patrimonio,$status_patrimonio);
                    $res = $patrimonio->inserirPatrimonioNoBanco();
                    if ($res === NULL) {
                        $_SESSION['respostaDaRequisicao']='criar-erro';	
                    }
                    else {
                        $_SESSION['respostaDaRequisicao']='criar-sucesso';	
                    }
                }else{
                    $_SESSION['respostaDaRequisicao'] = 'patrimonio-ja-inserido';  
                }	
                header("location: ../../system-pages/patrimonio.php");	
                break;	
    
            case 'editar-patrimonio':
                $patrimonio->setarValoresDaInstanciaParaEdicao($codigo_departamento,$nome_patrimonio,$descricao_patrimonio,$status_patrimonio);
                $res = $patrimonio->alterarInformacoesDoPatrimonio($id_patrimonio);
                if ($res === NULL) {
                    $_SESSION['respostaDaRequisicao']='editar-sucesso';	
                }
                else {
                    $_SESSION['respostaDaRequisicao']='editar-erro';	
                }
                header("location: ../../system-pages/patrimonio.php");
                break;			
        }
    }
    header("location: ../../system-pages/patrimonio.php");
?>
