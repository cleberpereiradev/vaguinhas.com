<?php
	
	include "bd/insere.php";
	include "servidor.php";
	
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$repeteSenha = mysqli_real_escape_string($conexao, $_POST['repete_senha']);
	$login = mysqli_real_escape_string($conexao, $_POST['login']);
	$email = mysqli_real_escape_string($conexao, $_POST['email']);
	$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
	
	$sqlVerificaLogin = "SELECT * FROM usuarios WHERE login='". $login ."'";
	$resultadoVerificaLogin = mysqli_query($conexao, $sqlVerificaLogin);
	$nlVerificaLogin = mysqli_num_rows($resultadoVerificaLogin);
	
	if($nlVerificaLogin > 0){
		echo "<script type='text/javascript' charset='utf-8'> alert('O login digitado j\u00e1 est\u00e1 em uso...'); window.location.href='../?pagina=cadastroAluno'; </script>";
		exit;
	}
	
	$sqlVerificaEmail = "SELECT * FROM alunos WHERE email='". $email ."'";
	$resultadoVerificaEmail = mysqli_query($conexao, $sqlVerificaEmail);
	$nlVerificaEmail = mysqli_num_rows($resultadoVerificaEmail);
	
	if($nlVerificaEmail > 0){
		echo "<script type='text/javascript' charset='utf-8'> alert('O email digitado j\u00e1 est\u00e1 em uso...'); window.location.href='../?pagina=cadastroAluno'; </script>";
		exit;
	}else{
		$sqlVerificaEmailEmpresa = "SELECT * FROM empresas WHERE email='". $email ."'";
		$resultadoVerificaEmailEmpresa = mysqli_query($conexao, $sqlVerificaEmailEmpresa);
		$nlVerificaEmailEmpresa = mysqli_num_rows($resultadoVerificaEmailEmpresa);
		
		if($nlVerificaEmailEmpresa > 0){
			echo "<script type='text/javascript' charset='utf-8'> alert('O email digitado j\u00e1 est\u00e1 em uso...'); window.location.href='../?pagina=cadastroAluno'; </script>";
			exit;
		}
	}
	
	$sqlVerificaCpf = "SELECT * FROM alunos WHERE cpf='". $cpf ."'";
	$resultadoVerificaCpf = mysqli_query($conexao, $sqlVerificaCpf);
	$nlVerificaCpf = mysqli_num_rows($resultadoVerificaCpf);
	
	if($nlVerificaCpf > 0){
		echo "<script type='text/javascript' charset='utf-8'> alert('O cpf digitado j\u00e1 est\u00e1 em uso...'); window.location.href='../?pagina=cadastroAluno'; </script>";
		exit;
	}

	if($senha != $repeteSenha){
		echo "<script type='text/javascript' charset='utf-8'> alert('As senhas digitadas nu00e3o conferem...'); window.location.href='../?pagina=cadastroAluno'; </script>";
		exit;
	}else{
		unset($_POST['senha']);
		unset($_POST['repete_senha']);
		unset($_POST['login']);
		
		$resultado = SalvaNoBanco("alunos");
		
		if($resultado > 0){
			
			//echo "O aluno: ". $_POST['nome'] . " foi incluido no banco de dados...<br>";
			
			//CRIA UM HASH DE SEGURANÇA COM A SENHA DO USUARIO
			$hash = md5($login . $senha);
			//CRIA UM LOOP COM 666 ENCRIPTAÇÕES DA SENHA DO USUARIO
			for ($i = 0; $i < 666; $i++){
				$hash = md5($hash);
			}
			$sqlCriaUsuario = "INSERT INTO usuarios (login, senha, tipo, empresas_id, alunos_id, nivel, ativo) VALUES ('". $login ."', '". $hash ."', 'aluno', '0', '". $resultado ."', '1', '0')";
			$resultadoCriaUsuario = mysqli_query($conexao, $sqlCriaUsuario);
			
			if($resultadoCriaUsuario){
				echo "<script type='text/javascript' charset='utf-8'> alert('Seu cadastro foi criado com sucesso, em breve a fatec ir\u00e1 aprovar o seu cadastro e voc\u00ea ser\u00e1 notificado por email!'); window.location.href='../?pagina=loginAluno&ok'; </script>";
			}else{
				echo "<script type='text/javascript' charset='utf-8'> alert('Ocorreu um problema ao tentar cadastrar o usu\u00e1rio, tente novamente mais tarde ou avise o administrador do sistema!'); window.location.href='../?pagina=cadastroAluno'; </script>";
			}

		}else{
			echo "<script type='text/javascript' charset='utf-8'> alert('Ocorreu um problema ao tentar salvar os dados do aluno, tente novamente mais tarde ou avise o administrador do sistema!'); window.location.href='../?pagina=cadastroAluno'; </script>";
		}
		
		
		
	}
	
	
	
	
	
	
	
	

?>