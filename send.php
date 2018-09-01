<?php
include "conecta.php";
$temas = $_POST["temas"];

if (isset($temas) && $temas <= 3 && $temas != 0) {

	$sql = "INSERT INTO temas (temas) VALUES ('$temas')";

	if ($conexao->query($sql)) {
    
    	header("location: /");
   
   	} else {
	   	echo "Deu error: " . $sql . "<br>" . $conexao->error;
	}
	
	$conexao->close();

} else {

	header("location: /");
}

?>