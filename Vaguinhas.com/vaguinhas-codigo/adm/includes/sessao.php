<?php
	// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
	if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))) {
		header("Location: ../index.php"); exit;
	}

	include "servidor.php";

	$login = $_POST['login'];
	$senha = $_POST['senha'];


	//CRIA UM HASH DE SEGURANÇA COM A SENHA DO USUARIO
	$hash = md5($login . $senha);
	//CRIA UM LOOP COM 666 ENCRIPTAÇÕES DA SENHA DO USUARIO
	for ($i = 0; $i < 666; $i++){
		$hash = md5($hash);
	}

	// Validação do usuário/senha digitados
	$sql = "SELECT * FROM usuarios WHERE login='$login' AND senha='$hash' AND ativo='1' AND nivel='2' LIMIT 1";
	$resultado = mysqli_query($conexao, $sql);
	$nl = mysqli_num_rows($resultado);

	if($nl > 0){
		$user = mysqli_fetch_array($resultado);
		// Se a sessão não existir, inicia uma
		if (!isset($_SESSION)){
			session_start();

			// Salva os dados encontrados na sessão
			$_SESSION['UsuarioID'] = $user['id'];
			$_SESSION['UsuarioLogin'] = $user['login'];
			$_SESSION['UsuarioNivel'] = $user['nivel'];

			// Redireciona o visitante
			header("Location: ../?pagina=principal");
		}else{
			exit;
		}
	}else{
		echo "<script type='text/javascript' charset='utf-8'> alert('Voc\u00ea digitou um usu\u00e1rio ou senha inv\u00e1lido, ou seu usu\u00e1rio esta desativo!'); window.location.href='../index.php'; </script>";
	}
?>
