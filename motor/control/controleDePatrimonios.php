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

    $id_patrimonio=$_POST['id_patrimonio'];
    $id_patrimonio=intval($id_patrimonio);
    $codigo_departamento=$_POST['departamento_patrimonio'];
    $codigo_departamento=intval($codigo_departamento);
    $nome_patrimonio=$_POST['nome_patrimonio'];
    $descricao_patrimonio=$_POST['descricao_patrimonio'];	
    $status_patrimonio=$_POST['status_patrimonio'];
    $acao_formulario = $_POST['acao_formulario'];
    $res;

	$patrimonio = new Patrimonio();
    
    if($acao_formulario == 'deletar-patrimonio'){
        $res = $patrimonio->deletarPatrimonio($id_patrimonio);
        if ($res === NULL) {
            $res['res']= 'deletar_sucesso';	
        } else {
            $res['res'] = 'deletar_erro';
        }
    } else {
        $patrimonio->setarValoresDaInstancia($id_patrimonio,$codigo_departamento,$nome_patrimonio,$descricao_patrimonio,$status_patrimonio);
        switch($acao_formulario) {
            case 'criar-patrimonio':
                $verificaExistenciaDoPatrimonio=$patrimonio->buscarPatrimonioCadastradoPeloId($id_patrimonio);
                if($verificaExistenciaDoPatrimonio === NULL){
                    $res = $patrimonio->inserirPatrimonioNoBanco();
                    if ($res === NULL) {
                        $res['res'] = 'inserir_erro';
                    }
                    else {
                        $res['res'] = 'inserir_sucesso';	
                    }
                }else{
                    $res['res'] = 'patrimonio_ja_inserido';
                }		
                break;	
    
            case 'editar-patrimonio':
                $res = $patrimonio->alterarInformacoesDoPatrimonio($id_patrimonio);
                if ($res === NULL) {
                    $res['res'] = 'editar_erro';	
                }
                else {
                    $res['res'] = 'editar_sucesso';	
                }
                break;			
        }
    }
    
    echo json_encode($res);
?>
