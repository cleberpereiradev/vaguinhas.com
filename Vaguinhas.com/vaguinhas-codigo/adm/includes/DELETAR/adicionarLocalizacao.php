<?php
    include "servidor.php";
	
	$bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
	$cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
	$estado = mysqli_real_escape_string($conexao, $_POST['estado']);
	$pais = mysqli_real_escape_string($conexao, $_POST['pais']);
	
    $sql = "INSERT INTO localizacao_imovel (bairro, cidade, estado, pais) VALUES ('$bairro', '$cidade', '$estado', '$pais')";
    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<script type='text/javascript'> alert('A localiza\u00e7\u00e3o de im\u00f3vel foi cadastrada com sucesso!'); window.location.href='../?pagina=cadastroLocalizacaoImoveis'; </script>";
    }else{
        echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar a localiza\u00e7\u00e3o de im\u00f3vel. Tente novamente mais tarde...'); window.location.href='../?pagina=cadastroLocalizacaoImoveis'; </script>";
    }


?>
