<?php
    include "servidor.php";
    $id = $_POST['id'];
	$imovel_id = $_POST['imovel_id'];
	
	$sqlFt = "SELECT * FROM fotos_imovel WHERE id='". $id ."'";
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
		
		$sqlDeletaFt = "DELETE FROM fotos_imovel WHERE id='". $id ."'";
		$resultadoDeletaFt = mysqli_query($conexao, $sqlDeletaFt);
		
		if($resultadoDeletaFt){
			echo "<script type='text/javascript'> alert('A imagem foi exclu\u00edda com sucesso...'); window.location.href='../?pagina=fotosImovel&id=$imovel_id'; </script>";
		}else{
			echo "<script type='text/javascript'> alert('Ocorreu um erro ao excluir a imagem. Tente novamente mais tarde...'); window.location.href='../?pagina=fotosImovel&id=$imovel_id'; </script>";
		}
	}
	
?>
