<?php
    include "servidor.php";
	
	$id = mysqli_real_escape_string($conexao, $_POST['id']);

    $sql = "DELETE FROM tipo_imovel WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<script type='text/javascript'> alert('A categoria de im\u00f3vel foi removida com sucesso!'); window.location.href='../?pagina=cadastroTipoImoveis'; </script>";
    }else{
        echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover a categoria de im\u00f3vel. Tente novamente mais tarde...'); window.location.href='../?pagina=cadastroTipoImoveis'; </script>";
    }


?>
