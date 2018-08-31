<html>
<head>
<title></title>

</head>  
<body>

    <center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h1> Tema para a festa de fim de ano.</h1>
    <br>
    <form method="post" action="send.php">
        <td>
            <input type="radio" name="temas" value="1">Circo 
            <input type="radio" name="temas"value="2">Cinema 
            <input type="radio" name="temas" value="3">Medieval<br>
            <br>
            <input type="submit" value="Enviar" name="enviar">
        </td>
    </form>
    </center>

<?php
include "conecta.php";

$sql = "SELECT ID, temas FROM temas";
$result = $conexao->query($sql);

$circo = 0;
$cinema = 0;
$medieval = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        switch ($row["temas"]) {
            case 1:
                $circo++;
                break;
            case 2:
                $cinema++;
                break;
            case 3:
                $medieval++;
                break;
            default:
                break;
        }
    }
    echo "Votos: <br> Circo: $circo <br> Cinema: $cinema <br> Medieval: $medieval";
} else {
    echo "0 results";
}
$conexao->close();
?>    
</body>

</html>