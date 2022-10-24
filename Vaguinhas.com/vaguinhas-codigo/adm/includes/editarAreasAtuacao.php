<?php
    include "bd/edita.php";
	
	$id = $_POST['id'];
	
	$resultado = EditaNoBanco("areas_atuacao", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('A \u00e1rea de atua\u00e7\u00e3o foi editada com sucesso!'); window.location.href='../?pagina=areasAtuacao'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao editar a \u00e1rea de atua\u00e7\u00e3o. Tente novamente mais tarde...'); window.location.href='../?pagina=areasAtuacao'; </script>";
	}
	

?>
