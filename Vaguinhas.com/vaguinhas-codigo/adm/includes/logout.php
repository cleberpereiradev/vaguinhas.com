<?php
	session_start(); // Inicia a sessão
	session_destroy(); // Destrói a sessão limpando todos os valores salvos
	
	echo "<script type='text/javascript' charset='utf-8'> alert('Obrigado por utilizar nosso sistema!'); window.location.href='../index.php'; </script>";
?>