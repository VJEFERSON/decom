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

    $id_departamento=$_REQUEST['id_departamento'];
    $nome_departamento=$_REQUEST['nome_departamento'];
    $descricao_departamento=$_REQUEST['descricao_departamento'];
    $campus=$_REQUEST['campus'];
    $cidade=$_REQUEST['cidade'];	
	$acao_formulario = $_REQUEST['acao_formulario'];

	$departamento = new Departamento();
    
    if($acao_formulario == 'deletar-departamento'){
        $res = $departamento->deletarDepartamento($id_departamento);
        if ($res === NULL) {
            $res= 'true';	
        } else {
            $res = 'false';	
        }
        header("location: ../../system-pages/objetos-departamentos.php");
    } else {
        $departamento->setarValoresDaInstancia($nome_departamento,$descricao_departamento,$campus,$cidade);
        switch($acao_formulario) {
            case 'criar-departamento':
                $res = $departamento->inserirDepartamentoNoBanco();
                if ($res === NULL) {
                    $res = 'true';
                }
                else {
                    $res = 'false';	
                }			
                header("location: ../../system-pages/objetos-departamentos.php");
                break;	
    
            case 'editar-departamento':
                $res = $departamento->alterarInformacoesDoDepartamento($id_departamento);
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
