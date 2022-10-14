<?php
    include "bd/insere.php";
	
	$resultado = SalvaNoBanco("areas_atuacao");
	
	if($resultado > 0){
		echo "<script type='text/javascript'> alert('A \u00e1rea de atua\u00e7\u00e3o foi cadastrada com sucesso!'); window.location.href='../?pagina=areasAtuacao'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar a \u00e1rea de atua\u00e7\u00e3o. Tente novamente mais tarde...'); window.location.href='../?pagina=areasAtuacao'; </script>";
	}
	

?>
