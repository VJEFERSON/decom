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

    $id_objeto=$_REQUEST['id_usuario'];
    $codigo_departamento=$_REQUEST['codigo_departamento'];
    $codigo_departamento=intval($codigo_departamento);
    $nome=$_REQUEST['nome'];
    $descricao=$_REQUEST['descricao'];
    $status_objeto=$_REQUEST['status_objeto'];
    $status_objeto=intval($status_objeto);	
	$acao_formulario = $_REQUEST['acao_formulario'];

	$Obj = new Objeto();
    
    if($acao_formulario == 'deletar-objeto'){
        $res = $Obj->deletarObjeto($id_objeto);
        if ($res === NULL) {
            $res= 'true';	
        } else {
            $res = 'false';	
        }
        header("location: ../../system-pages/objetos-departamentos.php");
    } else {
        $Obj->setarValoresDaInstancia($codigo_departamento,$nome,$email,$senha,$funcao,$tipo_usuario,$status_usuario);
        switch($acao_formulario) {
            case 'criar-objeto':
                $res = $Obj->inserirObjetoNoBanco();
                if ($res === NULL) {
                    $res = 'true';
                }
                else {
                    $res = 'false';	
                }			
                header("location: ../../system-pages/objetos-departamentos.php");
                break;	
    
            case 'editar-objeto':
                $res = $Obj->alterarInformacoesDoObjeto($id_objeto);
                if ($res === NULL) {
                    $res= 'true';	
                }
                else {
                    $res = 'false';	
                }
                header("location: ../../system-pages/objetos-departamentos.php");
                break;			
        }
    }
?>
