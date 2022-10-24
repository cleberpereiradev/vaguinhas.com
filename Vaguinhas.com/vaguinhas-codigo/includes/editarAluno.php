<?php
	
	include "bd/edita.php";
	
	$id = $_POST['id'];
	
	if(isset($_POST['pagina'])){
		$pagina = $_POST['pagina'];
		unset($_POST['pagina']);
	}else{
		$pagina = "vagas";
	}
	
	$resultado = EditaNoBanco("alunos", $id);
	if($resultado){
		echo "<script type='text/javascript' charset='utf-8'> alert('O registro foi alterado com sucesso!'); window.location.href='../?pagina=$pagina'; </script>";
	}else{
		echo "<script type='text/javascript' charset='utf-8'> alert('Ocorreu um problema ao tentar alterar o registro, tente novamente mais tarde!'); window.location.href='../?pagina=$pagina'; </script>";
	}
	

?>