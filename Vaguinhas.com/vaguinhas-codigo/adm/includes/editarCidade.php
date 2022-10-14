<?php
    include "bd/edita.php";
	
	$id = $_POST['id'];
	
	$resultado = EditaNoBanco("cidades", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('A cidade foi editada com sucesso!'); window.location.href='../?pagina=cidadesVagas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao editar a cidade. Tente novamente mais tarde...'); window.location.href='../?pagina=cidadesVagas'; </script>";
	}
	

?>
