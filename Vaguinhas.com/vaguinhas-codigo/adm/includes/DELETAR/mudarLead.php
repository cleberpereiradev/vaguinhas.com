<?php
    include "servidor.php";
	
	$id = $_GET['id'];
	$respondido = $_GET['respondido'];

    $sql = "UPDATE leads SET respondido='$respondido' WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<script type='text/javascript'> alert('O lead foi atualizado com sucesso!'); window.location.href='../?pagina=leads'; </script>";
    }else{
        echo "<script type='text/javascript'> alert('Ocorreu um erro ao atualizar o lead. Tente novamente mais tarde...'); window.location.href='../?pagina=leads'; </script>";
    }


?>
