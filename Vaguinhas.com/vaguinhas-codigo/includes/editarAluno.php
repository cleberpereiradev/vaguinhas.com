<?php
	
	include "bd/edita.php";
	
	$id = $_POST['id'];
	
	$resultado = EditaNoBanco("alunos", $id);
	if($resultado){
		echo "<script type='text/javascript' charset='utf-8'> alert('O registro foi alterado com sucesso!'); window.location.href='../?pagina=vagas'; </script>";
	}else{
		echo "<script type='text/javascript' charset='utf-8'> alert('Ocorreu um problema ao tentar alterar o registro, tente novamente mais tarde!'); window.location.href='../?pagina=vagas'; </script>";
	}
	

?>