<?php
    include "servidor.php";
    $id = $_POST['id'];
	
	$sqlFt = "SELECT * FROM fotos_imovel WHERE imovel_id='". $id ."'";
	$resultadoFt = mysqli_query($conexao, $sqlFt);
	$nlFt = mysqli_num_rows($resultadoFt);
	$contador = 0;
	
	if($nlFt > 0){
		while($Ft = mysqli_fetch_array($resultadoFt)){
			
			$apagaImagem = unlink("../../lib/images/fotos_imoveis/". $Ft['link']);
			
			if($apagaImagem){
				echo "A Imagem: ../../lib/images/fotos_imoveis/". $Ft['link'] . " foi removida com sucesso!<br>";
				$contador++;
			}else{
				echo "<b>ATENÇÃO!!!</b> A Imagem: ../../lib/images/fotos_imoveis/". $Ft['link'] . " <b>NÃO</b> foi removida!<br>";
			}
		}
		
		echo "#############<br>";
		
		$sqlDeletaFt = "DELETE FROM fotos_imovel WHERE imovel_id='". $id ."'";
		$resultadoDeletaFt = mysqli_query($conexao, $sqlDeletaFt);
		
		if($resultadoDeletaFt){
			echo $contador. " imagens foram removidas do diretorio e do servidor...<br>";
		}else{
			echo $contador. " imagens foram removidas apenas do diretorio...<br>";
		}
	}
	
	$sql = "DELETE FROM imovel WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<script type='text/javascript'> alert('Im\u00f3vel exclu\u00eddo com sucesso...'); window.location.href='../?pagina=cadastroImoveis'; </script>";
    }else{
        echo "<script type='text/javascript'> alert('Ocorreu um erro ao excluir o im\u00f3vel. Tente novamente mais tarde...'); window.location.href='../?pagina=cadastroImoveis'; </script>";
    }
	
?>
