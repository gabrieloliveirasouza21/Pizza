<?php 



// onde o banco está ?
// qual o nome do banco ?
// qual o usuário do banco ?
// qual a senha do banco ?

$host = 'localhost';
$bd = 'crud';
$user = 'root';
$senha = '';

$mysqli = new mysqli($host,$user,$senha,$bd);

if ($mysqli->connect_errno){
    die("Falha na conexão com o banco de dados !!!");
}
