<?php
    include "bd/insere.php";
	
	$resultado = SalvaNoBanco("tipos_vagas");
	
	if($resultado > 0){
		echo "<script type='text/javascript'> alert('O tipo de vaga foi cadastrado com sucesso!'); window.location.href='../?pagina=tiposVagas'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao cadastrar o tipo de vaga. Tente novamente mais tarde...'); window.location.href='../?pagina=tiposVagas'; </script>";
	}
	

?>
