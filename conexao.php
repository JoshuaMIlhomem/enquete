<?php
include "conecta.php";
$temas = $_POST["temas"];

$sql = "INSERT INTO temas (temas) VALUES ('$temas')";


if ($conexao->query($sql) === TRUE) {
    
    echo "Voto Computado!";
    header("location: index.php");
   
  // $sql = "INSERT INTO 'temas' ('temas') VALUES ('temas')";
} else {
    echo "Deu error: " . $sql . "<br>" . $conexao->error;
}
$conexao->close();


?>