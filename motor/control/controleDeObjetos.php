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

    $id_objeto=$_REQUEST['id_objeto'];
    $codigo_departamento=$_REQUEST['departamento_objeto'];
    $codigo_departamento=intval($codigo_departamento);
    $nome=$_REQUEST['nome_objeto'];
    $descricao=$_REQUEST['descricao_objeto'];
    $campus=$_REQUEST['campus'];
    $status_objeto = '0';
	$acao_formulario = $_REQUEST['acao_formulario'];

    $_SESSION['respostaDaRequisicao']='erro';
	$Obj = new Objeto();
    
    if($acao_formulario == 'deletar-objeto'){
        $res = $Obj->deletarObjeto($id_objeto);
        if ($res === NULL) {
            $_SESSION['respostaDaRequisicao']='deletar-objeto-sucesso';	
        } else {
            $_SESSION['respostaDaRequisicao']='deletar-objeto-erro';	
        }
        header("location: ../../system-pages/objetos-departamentos.php");
    } else {
        $Obj->setarValoresDaInstancia($codigo_departamento,$nome,$descricao,$campus,$status_objeto);
        switch($acao_formulario) {
            case 'criar-objeto':
                $res = $Obj->inserirObjetoNoBanco();
                if ($res === NULL) {
                    $_SESSION['respostaDaRequisicao']='criar-objeto-erro';
                }
                else {
                    $_SESSION['respostaDaRequisicao']='criar-objeto-sucesso';	
                }			
                header("location: ../../system-pages/objetos-departamentos.php");
                break;	
    
            case 'editar-objeto':
                $res = $Obj->alterarInformacoesDoObjeto($id_objeto);
                if ($res === NULL) {
                    $_SESSION['respostaDaRequisicao']='editar-objeto-sucesso';	
                }
                else {
                    $_SESSION['respostaDaRequisicao']='editar-objeto-erro';
                }
                header("location: ../../system-pages/objetos-departamentos.php");
                break;			
        }
    }
    header("location: ../../system-pages/objetos-departamentos.php");
?>
