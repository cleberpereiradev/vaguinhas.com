<?php
    include "servidor.php";
	
	$id = mysqli_real_escape_string($conexao, $_POST['id']);

    $sql = "DELETE FROM rss WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<script type='text/javascript'> alert('O contato foi removido com sucesso!'); window.location.href='../?pagina=rss'; </script>";
    }else{
        echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover o contato. Tente novamente mais tarde...'); window.location.href='../?pagina=rss'; </script>";
    }


?>
