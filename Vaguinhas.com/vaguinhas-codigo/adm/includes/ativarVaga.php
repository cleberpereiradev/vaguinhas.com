<?php
    include "bd/edita.php";
	
	$id = $_POST['id'];
	
	$resultado = EditaNoBanco("vagas", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('A vaga foi alterada com sucesso!'); window.location.href='../?pagina=vagasCadastradas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao alterar a vaga. Tente novamente mais tarde...'); window.location.href='../?pagina=vagasCadastradas'; </script>";
	}
	

?>
