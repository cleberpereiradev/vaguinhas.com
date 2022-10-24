<?php
    include "servidor.php";
	
    $id = $_POST['id'];
    $tipo_imovel_id = mysqli_real_escape_string($conexao, $_POST['tipo_imovel_id']);
	$localizacao_imovel_id = mysqli_real_escape_string($conexao, $_POST['localizacao_imovel_id']);
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
	$compra = mysqli_real_escape_string($conexao, $_POST['compra']);
	$pronto = mysqli_real_escape_string($conexao, $_POST['pronto']);
	$endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
	$apartir = mysqli_real_escape_string($conexao, $_POST['apartir']);
	$valor = mysqli_real_escape_string($conexao, $_POST['valor']);
	$qtd_quartos = mysqli_real_escape_string($conexao, $_POST['qtd_quartos']);
	$metragem = mysqli_real_escape_string($conexao, $_POST['metragem']);
	$personalizavel = mysqli_real_escape_string($conexao, $_POST['personalizavel']);

    $sql = "
		UPDATE imovel SET 
			tipo_imovel_id='$tipo_imovel_id',
			localizacao_imovel_id='$localizacao_imovel_id',
			nome='$nome',
			descricao='$descricao',
			compra='$compra', 
			pronto='$pronto',
			endereco='$endereco',
			apartir='$apartir',
			valor='$valor',
			qtd_quartos='$qtd_quartos',
			metragem='$metragem',
			personalizavel='$personalizavel'
		WHERE id='$id'	
	";
    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<script type='text/javascript'> alert('O im\u00f3vel foi editado com sucesso!'); window.location.href='../?pagina=cadastroImoveis'; </script>";
    }else{
        echo "<script type='text/javascript'> alert('Ocorreu um erro ao editar o im\u00f3vel. Tente novamente mais tarde...'); window.location.href='../?pagina=cadastroImoveis'; </script>";
    }
?>
