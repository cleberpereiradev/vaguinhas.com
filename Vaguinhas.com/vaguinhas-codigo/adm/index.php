<?php
	if (!isset($_SESSION)) session_start();
	include "includes/servidor.php";
	if(isset($_SESSION['UsuarioID'])){
		if($_SESSION['UsuarioNivel'] != 2){
			echo "<script type='text/javascript' charset='utf-8'>window.location.href='includes/logout.php'; </script>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include "html/head/head.html"; ?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<header class="main-header">
<?php
				if(isset($_SESSION['UsuarioID'])){
					include "html/menu/logotipo.html";
					include "html/menu/top.html";

				}else{

				}
?>
		</header>
<?php
		if(isset($_SESSION['UsuarioID'])){
?>
		<div class="wrapper">
<?php
			include "html/menu/esquerdo.html";
			if(isset($_GET['pagina'])){
				if(file_exists("html/conteudo/".$_GET['pagina'].".html")){
					include "html/conteudo/".$_GET['pagina'].".html";
				}else{
					include "html/conteudo/erro404.html";
				}
			}else{
				include "html/conteudo/principal.html";
			}
		}else{

			if(isset($_GET['pagina'])){
				//Codigo para pegar paramentros da url
				$i = 0;
				$array = "";
				foreach($_GET as $query_string_variable => $value) {
   					$nome[$i] = $query_string_variable;
					$valor[$i] = $value;
					//echo $i."<br>";
					$i++;
				}
				$url = "";
				for ($i=0; $i < count($nome); $i++) {
					$url .= "&". $nome[$i]."=".$valor[$i];
				}
			}
			include "html/conteudo/login.html";
		}
		if(isset($_SESSION['UsuarioID'])){
			include "html/menu/footer.html";
		}
?>
		</div>
	</body>
</html>
