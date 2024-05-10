
<?php
//Standard Conection

$host = "localhost";
$dbname = "bdplayfibra";
$user = "devJordan";
$pass = "102030";
$port = 3306;

//Create Connection
try {
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user , $pass);
}catch(PDOException $err){
    echo "ERRO: Conexão com banco de dados não realizado. Erro gerado" . $err->getMessage();
}
?>

