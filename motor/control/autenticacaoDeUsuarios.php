<?php
	session_start();

	require_once "../requested.php";

	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$_SESSION['respostaDaRequisicao']='vazio';

	$User = new Usuario();
	$User = $User->buscarUsuarioCadastradoPeloEmail($email);

	if(empty($email) && empty($senha)){
		$_SESSION['respostaDaRequisicao']='campos_nao_preenchidos';
		header("location: ../../authentication/login.php");
	}else {
		if ($User === NULL) {
			$_SESSION['respostaDaRequisicao']='no_user_found';
			header("location: ../../authentication/login.php");
		}else{
			$verificaIgualdadeDasSenhas = strcmp($senha,$User['senusu']);
			//$verificaIgualdadeDasSenhas = password_verify($senha,$User['senha']);
			if ($verificaIgualdadeDasSenhas == 0) {
				$_SESSION['id_usuario'] = $User['codusu'];
				$_SESSION['nome'] = $User['nomusu'];
				$_SESSION['funcao'] = $User['funusu'];
				$_SESSION['tipo_usuario'] = $User['nivusu'];
				$_SESSION['respostaDaRequisicao']='true';
				header("location: ../../system-pages/dashboard.php");
			} else {
				$_SESSION['respostaDaRequisicao']='wrong_password';
				header("location: ../../authentication/login.php");
			}
		}
	}
?>