<?php
    include "servidor.php";
	
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);

    $sql = "INSERT INTO tipo_imovel (nome) VALUES ('$nome')";
    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<script type='text/javascript'> alert('A categoria de im\u00f3vel foi cadastrada com sucesso!'); window.location.href='../?pagina=cadastroTipoImoveis'; </script>";
    }else{
        echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar a categoria de im\u00f3vel. Tente novamente mais tarde...'); window.location.href='../?pagina=cadastroTipoImoveis'; </script>";
    }


?>
