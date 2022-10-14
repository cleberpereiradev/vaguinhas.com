<?php
	include "bd/insere.php";
	
	$resultado = SalvaNoBanco("vagas");
	
	if($resultado > 0){
		echo "<script type='text/javascript'> alert('A vaga foi cadastrada com sucesso!'); window.location.href='../?pagina=vagasEmpresa'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar a vaga. Tente novamente mais tarde...'); window.location.href='../?pagina=vagasEmpresa'; </script>";
	}

?>