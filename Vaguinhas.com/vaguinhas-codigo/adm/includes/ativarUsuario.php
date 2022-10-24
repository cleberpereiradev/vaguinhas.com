<?php
    include "bd/edita.php";
	
	$id = $_POST['id'];
	
	$resultado = EditaNoBanco("usuarios", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('O usu\u00e1rio foi alterado com sucesso!'); window.location.href='../?pagina=usuariosCadastrados'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao alterar o usu\u00e1rio. Tente novamente mais tarde...'); window.location.href='../?pagina=usuariosCadastrados'; </script>";
	}
	

?>
