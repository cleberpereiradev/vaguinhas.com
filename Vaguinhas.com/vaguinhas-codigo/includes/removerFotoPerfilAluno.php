<?php
    include "servidor.php";
    $alunos_id = $_POST['alunos_id'];
	$link_foto = $_POST['link_foto'];
	$Destino = "../lib/img/fotosPerfil/";
	
	if($link_foto != ""){
		
		$apagaFoto = unlink($Destino . $link_foto);
		if($apagaFoto){
			echo "A foto anterior foi removida do servidor...<br>";
		}else{
			echo "A foto anterior <b>NAO</b> foi removida do servidor...<br>";
		}
		
	}
	
	$sql = "UPDATE alunos SET link_foto='' WHERE id='". $alunos_id ."'";                
    $resultado = mysqli_query($conexao, $sql);
	
	if($resultado){
        echo "<script type='text/javascript'>alert('Imagem removida com sucesso!');window.location.href='../?pagina=vagas';</script>";
    }else{
        echo "<script type='text/javascript'>alert('Ocorreu um problema ao tentar remover a imagem, tente novamente mais tarde!');window.location.href='../?pagina=vagas';</script>";
    }

    
?>
