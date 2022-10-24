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

    //Salvar o arquivo no servidor
	
	$Fotos = $_FILES["arquivo"];
	$cont = 0;
	for($i = 0; $i < sizeof($Fotos['name']); $i++){
		$Nome = rand(1000, 9999)."-".$Fotos["name"][$i];
        $Nome = str_replace(' ', '', $Nome);
		$Tamanho = $Fotos["size"][$i];
		$Tipo = $Fotos["type"][$i];
		$Tmpname = $Fotos["tmp_name"][$i];
		if($Tamanho > 0 && strlen($Nome) > 1){
			$Caminho = $Destino . $Nome;
			if(move_uploaded_file($Tmpname, $Caminho)){
				echo "Arquivo: $Nome Enviado...<br>";
				$cont++;

				$sql = "UPDATE alunos SET link_foto='". $Nome ."' WHERE id='". $alunos_id ."'";                
                $resultado = mysqli_query($conexao, $sql);

			}else{
				echo "Erro ao salvar a imagem";
				$Nome = "";
			}
		}else{
			$Nome = "";
		}
	}

    if($resultado){
        echo "<script type='text/javascript'>alert('Imagem alterada com sucesso!');window.location.href='../?pagina=vagas';</script>";
    }else{
        echo "<script type='text/javascript'>alert('Ocorreu um problema ao tentar cadastrar a imagem, tente novamente mais tarde!');window.location.href='../?pagina=vagas';</script>";
    }
?>
