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
		$verificaIgualdadeDasSenhas = strcmp($senha,$User['senusu']);
		//$verificaIgualdadeDasSenhas = password_verify($senha,$User['senha']);
		if ($verificaIgualdadeDasSenhas == 0) {
			$_SESSION['id_usuario'] = $User['codusu'];
			$_SESSION['nome'] = $User['nomusu'];
			$_SESSION['funcao'] = $User['funusu'];
			$_SESSION['tipo_usuario'] = $User['nivusu'];
			$res['res']= 'true';
		} else {
			$res['res']= 'wrong_password';
			session_destroy();
		}
	}
	echo json_encode($res);
?>