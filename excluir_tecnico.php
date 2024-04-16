<?php
include('conn.php');

// Verifica se o ID do técnico foi enviado via POST
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id_tecnico = $_POST['id'];
}

try {
    // Prepara a instrução SQL para excluir o técnico da tabela tbl_avaliacao
    $stmt_del_avaliacao = $conn->prepare('DELETE FROM tbl_avaliacao WHERE id_tecnico = :id_tecnico');

    // Vincula o parâmetro ID do técnico à instrução preparada
    $stmt_del_avaliacao->bindParam(':id_tecnico', $id_tecnico, PDO::PARAM_INT);

    // Executa a instrução preparada para excluir os dados da tabela tbl_avaliacao
    $stmt_del_avaliacao->execute();

    // Prepara a instrução SQL para excluir o técnico da tabela tbl_tecnicos
    $stmt_del_tecnico = $conn->prepare('DELETE FROM tbl_tecnicos WHERE id = :id_tecnico');

    // Vincula o parâmetro ID do técnico à instrução preparada
    $stmt_del_tecnico->bindParam(':id_tecnico', $id_tecnico, PDO::PARAM_INT);

    // Executa a instrução preparada para excluir os dados da tabela tbl_tecnicos
    $stmt_del_tecnico->execute();

    // Verifica se a exclusão foi bem-sucedida
    if ($stmt_del_avaliacao->rowCount() > 0 && $stmt_del_tecnico->rowCount() > 0) {
        echo "1"; // Envie "1" de volta para o JavaScript para indicar sucesso
    } else {
        echo "0"; // Envie "0" de volta para o JavaScript para indicar falha
    }
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem de erro
    echo "Erro ao excluir o técnico: " . $e->getMessage();
}
?>
