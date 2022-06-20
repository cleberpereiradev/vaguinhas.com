<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include "html/head/head.html"; ?>
	</head>
	<body>
<?php
		include "html/menu/menu-top.html";
		if(isset($_GET['pagina'])){
			if(file_exists("html/conteudo/".$_GET['pagina'].".html")){
				include "html/conteudo/".$_GET['pagina'].".html";
			}else{
				include "html/conteudo/erro404.html";
			}
		}else{
			include "html/conteudo/principal.html";
		}
		include "html/footer/footer.html";
?>				
	</body>
</html>