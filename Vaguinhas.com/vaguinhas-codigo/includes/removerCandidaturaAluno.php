<?php
    include "bd/excluir.php";
	
	$id = $_POST['id'];
	
	$resultado = ExcluirNoBanco("candidatos_vagas", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('A sua candidatura foi removida com sucesso!'); window.location.href='../?pagina=vagas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover a candidatura. Tente novamente mais tarde...'); window.location.href='../?pagina=vagas'; </script>";
	}
	

?>
