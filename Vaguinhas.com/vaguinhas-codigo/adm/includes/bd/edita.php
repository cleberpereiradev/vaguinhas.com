<?php

	//ESTA FUNÇÃO FOI CRIADA PARA EDITAR DADOS DE UM BANCO DE DADOS ARMAZENADO NO ARQUIVO "servidor.php".
	//ELA VARRE TODOS OS $_POST'S ENVIADO PELO FORMULARIO HTML, CRIA UMA STRING DE CONEXAO E FAZ O UPDATE NO BD
	//RETORNANDO TRUE OU FALSE.

	//REQUISITOS PARA UTILIZAR:
	//1- NO ARQUIVO DE UPDATE, DEVERÁ CHAMAR ESTA FUNÇÃO PELO INCLUDE: include "bd/edita.php";
	//2- NO FORMULÁRIO EM HTML TODOS OS INPUTS DEVEM OBRIGATÓRIAMENTE TER O "NAME" IGUAL AO BANCO DE DADOS;
	//3- ENVIAR O NOME DA TABELA E ID;
	//4- ESTA FUNÇÃO É DE USO EXCLUSIVO DA ISIS TECNOLOGIA LTDA, QUALQUER REPRODUÇÃO OU CÓPIA SERÁ CONSIDERADA FRAUDE;

	if (!isset($_SESSION)) session_start();
	function EditaNoBanco($table, $id){
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

		$sql = "UPDATE ".$table." SET ";
		for($i = 0; $i < count($campos); $i++){
			if($i == 0){
				$sql .= $campos[$i] ."='".$valores[$i]."'";
			}else{
				$sql .= ", ".$campos[$i] ."='".$valores[$i]."'";
			}
		}
		$sql .= " WHERE id='".$id."'";
		$resultado = mysqli_query($conexao, $sql);
		$contador = 0;
		/*
		$log = "Editou o registro numero $id na tabela $table do banco de dados";
		$dataLog = date("Y-m-d");
		$ipLog = $_SERVER['REMOTE_ADDR'];
		$horario = date("H:i:s");
		$sqlLog = "INSERT INTO log (log, horario, ip, data, usuario_id) VALUES ('$log', '$horario', '$ipLog', '$dataLog', '".$_SESSION['UsuarioID']."')";
		$resultadoLog = mysqli_query($conexao, $sqlLog);
		*/

		return $resultado;
	}

?>
