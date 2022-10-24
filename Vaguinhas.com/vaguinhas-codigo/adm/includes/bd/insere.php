<?php

	//ESTA FUNÇÃO FOI CRIADA PARA SALVAR DADOS NOVOS NUM BANCO DE DADOS ARMAZENADO NO ARQUIVO "servidor.php".
	//ELA VARRE TODOS OS $_POST'S ENVIADO PELO FORMULARIO HTML, CRIA UMA STRING DE CONEXAO E INSERE NO BD
	//RETORNANDO O ID DO REGISTRO INSERIDO.


	//REQUISITOS PARA UTILIZAR:
	//1- NO ARQUIVO DE CADASTRO, DEVERÁ CHAMAR ESTA FUNÇÃO PELO INCLUDE: include "bd/insere.php";
	//2- NO FORMULÁRIO EM HTML TODOS OS INPUTS DEVEM OBRIGATÓRIAMENTE TER O "NAME" IGUAL AO BANCO DE DADOS;
	//3- ESTA FUNÇÃO É DE USO EXCLUSIVO DA ISIS TECNOLOGIA LTDA, QUALQUER REPRODUÇÃO OU CÓPIA SERÁ CONSIDERADA FRAUDE;

	if (!isset($_SESSION)) session_start();
	function SalvaNoBanco($table){
		include "servidor.php";
		$campos = array();
		$valores = array();
		$contador = 0;

		foreach($_POST as $nome_campo => $valor){
			if($nome_campo != "id" && $nome_campo != "tab"){
				$campos[$contador] = $nome_campo;
				$valores[$contador] = mysqli_real_escape_string($conexao, $valor);
				$contador++;
			}
		}
		$sql = "INSERT INTO ".$table." (";
		for($i = 0; $i < count($campos); $i++){
			if($i == 0){
				$sql .= $campos[$i];
			}else{
				$sql .= ", ".$campos[$i];
			}
		}
		$sql .= ") VALUES (";
		for($i = 0; $i < count($valores); $i++){
			if($i == 0){
				$sql .= "'".$valores[$i]."'";
			}else{
				$sql .= ", '".$valores[$i]."'";
			}
		}
		$sql .= ")";
		$resultado = mysqli_query($conexao, $sql);
		$contador = 0;
		$idInserido = mysqli_insert_id($conexao);

		/*
			Código para salvar um log no banco de dados
		$log = "Cadastrou o registro numero $idInserido na tabela $table do banco de dados";
		$dataLog = date("Y-m-d");
		$ipLog = $_SERVER['REMOTE_ADDR'];
		$horario = date("H:i:s");
		$sqlLog = "INSERT INTO log (log, horario, ip, data, usuario_id) VALUES ('$log', '$horario', '$ipLog', '$dataLog', '".$_SESSION['UsuarioID']."')";
		$resultadoLog = mysqli_query($conexao, $sqlLog);

		 if($resultadoLog){
			 echo "LOG CRIADO";
		 }else{
			 echo "DEU RUIM";
		 }*/


		return $idInserido;
	}

?>
