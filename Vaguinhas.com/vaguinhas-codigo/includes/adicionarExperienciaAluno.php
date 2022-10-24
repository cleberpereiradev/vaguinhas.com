<?php
	
	include "bd/insere.php";
	
	$pagina = $_POST['pagina'];
	unset($_POST['pagina']);
	$tab = $_POST['tab'];
	unset($_POST['tab']);
	
	$resultado = SalvaNoBanco("experiencia_alunos");
	
	if($resultado > 0){
		echo "<script type='text/javascript'> alert('A experi\u00eancia foi cadastrada com sucesso!'); window.location.href='../?pagina=$pagina&tab=$tab'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar a experi\u00eancia. Tente novamente mais tarde...'); window.location.href='../?pagina=$pagina&tab=$tab'; </script>";
	}
	
	
	
	
	
	
	
	

?>