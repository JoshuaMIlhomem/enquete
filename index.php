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
    <form method="post" action="conexao.php">
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enquete365";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, temas FROM temas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ID"]. " - Temas: " . $row["temas"]. " <br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>    
</body>

</html>