<?php
$host = "localhost"; //Servidor do mysql
$user = "root"; //Usuario do banco de dados
$senha = ""; //senha do banco de dados
$db = "vaguinhas_site"; //banco de dados


$host = "srv184.prodns.com.br"; //Servidor do mysql
$user = "vaguinha_site"; //Usuario do banco de dados
$senha = "vaguinhas@123"; //senha do banco de dados
$db = "vaguinha_site"; //banco de dados

$conexao = mysqli_connect($host, $user, $senha, $db);
mysqli_set_charset($conexao, "utf8");
?>
