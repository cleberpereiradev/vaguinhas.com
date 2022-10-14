<?php

$cep = $_POST['cep'];

$reg = simplexml_load_file("https://viacep.com.br/ws/". $cep ."/xml/");

$dados['sucesso'] = 1;
$dados['rua']     = (string) $reg->logradouro;
$dados['bairro']  = (string) $reg->bairro;
$dados['cidade']  = (string) $reg->localidade;
$dados['estado']  = (string) $reg->uf;

echo json_encode($dados);

?>
