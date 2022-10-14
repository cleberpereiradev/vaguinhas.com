<?php
    include "bd/insere.php";
	
	$resultado = SalvaNoBanco("cidades");
	
	if($resultado > 0){
		echo "<script type='text/javascript'> alert('A cidade foi cadastrada com sucesso!'); window.location.href='../?pagina=cidadesVagas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar a cidade. Tente novamente mais tarde...'); window.location.href='../?pagina=cidadesVagas'; </script>";
	}
	

?>
