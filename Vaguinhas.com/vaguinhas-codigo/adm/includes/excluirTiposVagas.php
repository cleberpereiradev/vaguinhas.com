<?php
    include "bd/excluir.php";
	
	$id = $_POST['id'];
	
	$resultado = ExcluirNoBanco("tipos_vagas", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('O tipo de vaga foi removido com sucesso!'); window.location.href='../?pagina=tiposVagas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover o tipo de vaga. Tente novamente mais tarde...'); window.location.href='../?pagina=tiposVagas'; </script>";
	}
	

?>
