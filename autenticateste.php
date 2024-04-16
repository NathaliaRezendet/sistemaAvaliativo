<?php 
include("conn.php");

if(isset($_POST['id_tecnico']) && isset($_POST['item']) && isset($_POST['nota'])){
    $id_tecnico = $_POST['id_tecnico'];
    $item = $_POST['item'];
    $nota = $_POST['nota'];

    # Prevenir SQL injection
    $id_tecnico = $conn->quote($id_tecnico);
    $item = $conn->quote($item);
    $nota = $conn->quote($nota);

    # Inserir os dados no banco
    $query = "INSERT INTO tbl_avaliacao (id_tecnico, item, nota) 
              VALUES ($id_tecnico, $item, $nota)";
    
    try {
        $conn->exec($query);
    } catch (PDOException $err) {
        echo "Erro ao salvar avaliação: " . $err->getMessage();
        exit;
    }

    $conn = null; // Fechar a conexão

    header('location:avaliacao.php');
    exit;
} else {
    echo 'Forma de acesso inválida pelo administrador';
    header("location:index.php?msg=erro_dados");
}
?>
