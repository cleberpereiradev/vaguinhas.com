<?php
	
	include "bd/insere.php";
	
	$resultado = SalvaNoBanco("candidatos_vagas");
	
	if($resultado > 0){
		echo "<script type='text/javascript'> alert('Sua candidatura foi enviada com sucesso!'); window.location.href='../?pagina=vagas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar a sua candidatura. Tente novamente mais tarde...'); window.location.href='../?pagina=vagas'; </script>";
	}

?>