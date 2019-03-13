<?php
session_start();

require_once "../requested.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$res;

$User = new User();
$User = $Usuario->buscarUsuarioCadastradoPeloUsuario($usuario);

if ($User === NULL) {
	$res['res']= 'no_user_found';
	session_destroy();
}else {
	$verificaIgualdadeDosUsuarios = strcmp($usuario,$User['usuario']);

	if ($verificaIgualdadeDosUsuarios == 0) {
		$verificaIgualdadeDasSenhas = password_verify($senha,$User['senha']);

		if ($verificaIgualdadeDasSenhas) {
			$_SESSION['id_usuario'] = $User['id_usuario'];
			$_SESSION['nome'] = $User['nome'];
			$_SESSION['funcao'] = $User['funcao'];
			$_SESSION['tipo'] = $User['tipo'];
			
			if ($User['tipo']==1){
				$res['tipo']='administrador';
			}else {
				$res['tipo']='comum';
			}
			$res['res'] = 'true';

		} else {
			$res['res']= 'wrong_password';
			session_destroy();
		}
	} else {
		$res['res']= 'wrong_user_found';
		session_destroy();
	}
}
echo json_encode($res);
?>