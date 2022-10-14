<?php
	// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
	if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
		header("Location: ../?pagina=principal"); exit;
	}

	include "servidor.php";

	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$pagina = $_POST['pagina'];
	
	$sqlEmailAluno = "SELECT * FROM alunos WHERE email='". $email ."' LIMIT 1";
	$resultadoEmailAluno = mysqli_query($conexao, $sqlEmailAluno);
	$nlEmailAluno = mysqli_num_rows($resultadoEmailAluno);
	
	if($nlEmailAluno > 0){
		$emailRetornado = mysqli_fetch_array($resultadoEmailAluno);
		$completaSql = "alunos_id";
	}else{
		
		$sqlEmailEmpresa = "SELECT * FROM empresas WHERE email='". $email ."' LIMIT 1";
		$resultadoEmailEmpresa = mysqli_query($conexao, $sqlEmailEmpresa);
		$nlEmailEmpresa = mysqli_num_rows($resultadoEmailEmpresa);
		
		if($nlEmailEmpresa > 0){
			$emailRetornado = mysqli_fetch_array($resultadoEmailEmpresa);
			$completaSql = "empresas_id";
		}else{
			echo "<script type='text/javascript' charset='utf-8'> alert('Voc\u00ea digitou um email inexistente!'); window.location.href='../?pagina=$pagina'; </script>";
			exit;
		}
	}
	
	$sqlBuscaLogin = "SELECT * FROM usuarios WHERE ". $completaSql ."='". $emailRetornado['id'] ."'";
	$resultadoBuscaLogin = mysqli_query($conexao, $sqlBuscaLogin);
	$BuscaLogin = mysqli_fetch_array($resultadoBuscaLogin);
	$login = $BuscaLogin['login'];
	
	//CRIA UM HASH DE SEGURANÇA COM A SENHA DO USUARIO
	$hash = md5($login . $senha);
	//CRIA UM LOOP COM 666 ENCRIPTAÇÕES DA SENHA DO USUARIO
	for ($i = 0; $i < 666; $i++){
		$hash = md5($hash);
	}

	// Validação do usuário/senha digitados
	$sql = "SELECT * FROM usuarios WHERE login='$login' AND senha='$hash' AND ativo='1' LIMIT 1";
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
			$_SESSION['UsuarioEmpresasID'] = $user['empresas_id'];
			$_SESSION['UsuarioAlunosID'] = $user['alunos_id'];
			$_SESSION['UsuarioTipo'] = $user['tipo'];

			// Redireciona o visitante
			if($_SESSION['UsuarioTipo'] == "fatec"){
				header("Location: ../?pagina=loginFatec");
			}elseif($_SESSION['UsuarioTipo'] == "empresa"){
				header("Location: ../?pagina=vagasEmpresa");
			}else{
				header("Location: ../?pagina=vagas");
			}
			
		}else{
			header("Location: ../?pagina=principal");
			exit;
		}
	}else{
		echo "<script type='text/javascript' charset='utf-8'> alert('Voc\u00ea digitou um email ou senha inv\u00e1lido, ou seu usu\u00e1rio n\u00e3o est\u00e1 ativo!'); window.location.href='../?pagina=$pagina'; </script>";
	}
?>
