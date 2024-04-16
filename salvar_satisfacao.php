<?php
// Conexão com o banco de dados
include('conn.php');

// Verifica se o valor de satisfação foi recebido
if (isset($_POST['satisfacao'])) {
   // Obtém o valor de satisfação
   $satisfacao = $_POST['satisfacao'];

   // Insere o valor de satisfação na tabela tbemoji
   $sql = "INSERT INTO tbemoji (satisfacao) VALUES (?)";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$satisfacao]);

   // Verifica se a inserção foi bem-sucedida
   if ($stmt->rowCount() > 0) {
      echo "success";
   } else {
      echo "error";
   }
} else {
   echo "error";
}
?>
