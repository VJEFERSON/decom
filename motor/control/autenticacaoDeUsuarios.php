<?php
	session_start();

	require_once "../requested.php";

	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$_SESSION['respostaDaRequisicao']='erro';

	if(empty($email) || empty($senha)){
		$_SESSION['respostaDaRequisicao']='campos_nao_preenchidos';
		header("location: ../../authentication/login.php");
	}else{
		$User = new Usuario();
		$User = $User->buscarUsuarioCadastradoPeloEmail($email);
		if ($User === NULL) {
			$_SESSION['respostaDaRequisicao']='no_user_found';
			header("location: ../../authentication/login.php");
		}else{
			$verificaStatusUsuario = $User['stausu'];
			if($verificaStatusUsuario == 0){
				$_SESSION['respostaDaRequisicao']='usuario_desativado';
				header("location: ../../authentication/login.php");
			}else{
				$verificaIgualdadeDasSenhas = strcmp($senha,$User['senusu']);
				//$verificaIgualdadeDasSenhas = password_verify($senha,$User['senha']);
				if ($verificaIgualdadeDasSenhas == 0) {
					$_SESSION['id_usuario'] = $User['codusu'];
					$_SESSION['nome'] = $User['nomusu'];
					$_SESSION['funcao'] = $User['funusu'];
					$_SESSION['tipo_usuario'] = $User['nivusu'];
					$_SESSION['status_usuario'] = $User['stausu'];
					$_SESSION['respostaDaRequisicao']='vazio';
					header("location: ../../system-pages/dashboard.php");
				}else {
					$_SESSION['respostaDaRequisicao']='wrong_password';
					header("location: ../../authentication/login.php");
				}
			}
		}	
	}
?>