<?php
    include "servidor.php";
	
	$id = mysqli_real_escape_string($conexao, $_POST['id']);

    $sql = "DELETE FROM leads WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<script type='text/javascript'> alert('O lead foi removido com sucesso!'); window.location.href='../?pagina=leads'; </script>";
    }else{
        echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover o lead. Tente novamente mais tarde...'); window.location.href='../?pagina=leads'; </script>";
    }


?>
