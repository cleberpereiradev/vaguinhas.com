<?php
	
	include "bd/insere.php";
	
	$pagina = $_POST['pagina'];
	unset($_POST['pagina']);
	$tab = $_POST['tab'];
	unset($_POST['tab']);
	
	$resultado = SalvaNoBanco("informacoes_alunos");
	
	if($resultado > 0){
		echo "<script type='text/javascript'> alert('A informa\u00e7\u00e3o adicional foi cadastrada com sucesso!'); window.location.href='../?pagina=$pagina&tab=$tab'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar a informa\u00e7\u00e3o adicional. Tente novamente mais tarde...'); window.location.href='../?pagina=$pagina&tab=$tab'; </script>";
	}
	
	
	
	
	
	
	
	

?>