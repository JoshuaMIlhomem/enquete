<?php 

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'enquete365';

#Conexão com o banco
//$connection = @mysql_connect($server, $username, $password) or die("Erro ao conectar com o Banco de Dados! Erro: ".  mysql_error());
//@mysql_select_db($database, $connection) or die("Erro ao conectar com o Banco de Dados!");

// Create connection
$conexao = new mysqli($server, $username, $password, $database);
// Check connection
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
} 
?>