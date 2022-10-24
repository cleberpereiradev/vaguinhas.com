<?php
    include "bd/edita.php";
	
	$id = $_POST['id'];
	
	$resultado = EditaNoBanco("tipos_vagas", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('O tipo de vaga foi editado com sucesso!'); window.location.href='../?pagina=tiposVagas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao editar o tipo de vaga. Tente novamente mais tarde...'); window.location.href='../?pagina=tiposVagas'; </script>";
	}
	

?>
