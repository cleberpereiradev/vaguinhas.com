<?php
    include "servidor.php";
    $imoveis_id = $_POST['imoveis_id'];

    //Salvar o arquivo no servidor
	$Destino = "../../lib/images/fotos_imoveis/";
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

                $sql = "INSERT INTO fotos_imovel (imovel_id, link) VALUES ('$imoveis_id', '$Nome')";
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
        echo "<script type='text/javascript'>alert('Imagens cadastradas com sucesso!');window.location.href='../?pagina=fotosImovel&id=$imoveis_id';</script>";
    }else{
        echo "<script type='text/javascript'>alert('Ocorreu um problema ao tentar cadastrar as imagens, tente novamente mais tarde!');window.location.href='../?pagina=fotosImovel&id=$imoveis_id';</script>";
    }
?>
