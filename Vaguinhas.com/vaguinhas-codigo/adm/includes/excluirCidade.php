<?php
    include "bd/excluir.php";
	
	$id = $_POST['id'];
	
	$resultado = ExcluirNoBanco("cidades", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('A cidade foi removida com sucesso!'); window.location.href='../?pagina=cidadesVagas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover a cidade. Tente novamente mais tarde...'); window.location.href='../?pagina=cidadesVagas'; </script>";
	}
	

?>
