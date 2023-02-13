<?php
$host = "localhost"; //Servidor do mysql
$user = "root"; //Usuario do banco de dados
$senha = ""; //senha do banco de dados
$db = "vaguinhas_site"; //banco de dados


$host = ""; //Servidor do mysql
$user = ""; //Usuario do banco de dados
$senha = ""; //senha do banco de dados
$db = ""; //banco de dados

$conexao = mysqli_connect($host, $user, $senha, $db);
mysqli_set_charset($conexao, "utf8");
?>
