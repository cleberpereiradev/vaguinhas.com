<?php
    include "bd/excluir.php";

	$id = $_POST['id'];
	
	$resultado = ExcluirNoBanco("usuarios", $id);
	
	if($resultado){
		echo "<script type='text/javascript'> alert('O usu\u00e1rio foi removido com sucesso!'); window.location.href='../?pagina=usuariosCadastrados'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('Ocorreu um erro ao remover o usu\u00e1rio. Tente novamente mais tarde...'); window.location.href='../?pagina=usuariosCadastrados'; </script>";
	}
	

?>
