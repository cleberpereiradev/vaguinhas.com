<?php
    include "bd/excluir.php";
	
	$id = $_POST['id'];
	
	$resultado = ExcluirNoBanco("vagas", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('A vaga foi removida com sucesso!'); window.location.href='../?pagina=vagasEmpresa'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover a vaga. Tente novamente mais tarde...'); window.location.href='../?pagina=vagasEmpresa'; </script>";
	}
	

?>
