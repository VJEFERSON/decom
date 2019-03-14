<?php
	session_start();

	require_once "../requested.php";

	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$res;

	$User = new Usuario();
	$User = $User->buscarUsuarioCadastradoPeloEmail($email);

	if ($User === NULL) {
		$res['res']= 'no_user_found';
		session_destroy();
	} else {
		$verificaIgualdadeDasSenhas = strcmp($senha,$User['senha']);
		//$verificaIgualdadeDasSenhas = password_verify($senha,$User['senha']);
		if ($verificaIgualdadeDasSenhas == 0) {
			$_SESSION['id_usuario'] = $User['id_usuario'];
			$_SESSION['nome'] = $User['nome'];
			$_SESSION['funcao'] = $User['funcao'];
			$_SESSION['tipo_usuario'] = $User['tipo_usuario'];
			$res['res']= 'true';
		} else {
			$res['res']= 'wrong_password';
			session_destroy();
		}
	}
	echo json_encode($res);
?>