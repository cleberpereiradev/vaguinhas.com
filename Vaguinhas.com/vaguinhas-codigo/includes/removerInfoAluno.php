<?php
    include "bd/excluir.php";
	
	$id = $_POST['id'];
	$pagina = $_POST['pagina'];
	unset($_POST['pagina']);
	$tab = $_POST['tab'];
	unset($_POST['tab']);
	
	$resultado = ExcluirNoBanco("informacoes_alunos", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('A informa\u00e7\u00e3o adicional foi removida com sucesso!'); window.location.href='../?pagina=$pagina&tab=$tab'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover a informa\u00e7\u00e3o adicional. Tente novamente mais tarde...'); window.location.href='../?pagina=$pagina&tab=$tab'; </script>";
	}
	

?>
