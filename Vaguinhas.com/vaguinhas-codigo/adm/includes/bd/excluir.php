<?php	
	
	//ESTA FUNÇÃO FOI CRIADA PARA REMOVER DADOS NUM BANCO DE DADOS ARMAZENADO NO ARQUIVO "servidor.php".
	//ELA VARRE TODOS OS $_POST'S ENVIADO PELO FORMULARIO HTML, CRIA UMA STRING DE CONEXAO E INSERE NO BD
	
	
	//REQUISITOS PARA UTILIZAR:
	//1- NO ARQUIVO DE CADASTRO, DEVERÁ CHAMAR ESTA FUNÇÃO PELO INCLUDE: include "bd/excluir.php";
	//2- NO FORMULÁRIO EM HTML TODOS OS INPUTS DEVEM OBRIGATÓRIAMENTE TER O "NAME" IGUAL AO BANCO DE DADOS;
	//3- ESTA FUNÇÃO É DE USO EXCLUSIVO DA ISIS TECNOLOGIA LTDA, QUALQUER REPRODUÇÃO OU CÓPIA SERÁ CONSIDERADA FRAUDE;
	if (!isset($_SESSION)) session_start();
	
	function ExcluirNoBanco($table, $id){
		include "servidor.php";
		
		$sql = "DELETE FROM ".$table." WHERE id='".$id."'";
		$resultado = mysqli_query($conexao, $sql);
		
		$log = "Removeu o registro numero $id na tabela $table do banco de dados";
		$dataLog = date("Y-m-d");
		$ipLog = $_SERVER['REMOTE_ADDR'];
		$horario = date("H:i:s");
		$sqlLog = "INSERT INTO log (log, horario, ip, data, usuario_id) VALUES ('$log', '$horario', '$ipLog', '$dataLog', '".$_SESSION['UsuarioID']."')";
		$resultadoLog = mysqli_query($conexao, $sqlLog);
		
		return $resultado;
	}
	
?>