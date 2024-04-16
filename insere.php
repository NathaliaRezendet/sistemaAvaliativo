<?php
include("conn.php");
session_start();

try {
    $id_supervisor = $_SESSION['id_supervisor'];

    if (isset($_POST['notas'])) {
        $notas = $_POST['notas'];
        $id_tecnico = $_POST['id_tecnico'];
        $id_avaliacao = uniqid();

        $count = count($notas);

        for ($i = 0; $i < $count; $i++) {
            $id_tecnico = $id_tecnico[$i];
            $nota = $notas[$i];

            if ($nota !== "") {
                $stmt_check = $conn->prepare("SELECT id, nota_total FROM tbl_avaliacao WHERE id_tecnico=:id_tecnico AND id_supervisor=:id_supervisor");
                $stmt_check->bindParam(':id_tecnico', $id_tecnico);
                $stmt_check->bindParam(':id_supervisor', $id_supervisor);
                $stmt_check->execute();

                if ($stmt_check->rowCount() > 0) {
                    // Se já existe uma nota para determinado técnico, ATUALIZA!
                    $result = $stmt_check->fetch(PDO::FETCH_ASSOC);
                    $nota_total = $result['nota_total'] + $nota;

                    $query_update = "UPDATE tbl_avaliacao SET ";
                    for ($j = 1; $j <= 25; $j++) {
                        $query_update .= "nota$j = :nota$j, ";
                    }
                    $query_update .= "nota_total = :nota_total WHERE id_tecnico = :id_tecnico AND id_supervisor = :id_supervisor";
                    $stmt_update = $conn->prepare($query_update);
                    for ($j = 1; $j <= 25; $j++) {
                        $param = ":nota$j";
                        $stmt_update->bindParam($param, $notas[$j - 1]); // Ajustar o índice para corresponder aos índices das notas
                    }
                    $stmt_update->bindParam(':nota_total', $nota_total);
                    $stmt_update->bindParam(':id_tecnico', $id_tecnico);
                    $stmt_update->bindParam(':id_supervisor', $id_supervisor);
                    $stmt_update->execute();
                } else {
                    $nota_total = array_sum($notas); 
                    $query_insert = "INSERT INTO tbl_avaliacao (id_tecnico, id_supervisor, ";
                    for ($j = 1; $j <= 25; $j++) {
                        $query_insert .= "nota$j, ";
                    }
                    $query_insert .= "nota_total) VALUES (:id_tecnico, :id_supervisor, ";
                    for ($j = 1; $j <= 25; $j++) {
                        $query_insert .= ":nota$j, ";
                    }
                    $query_insert .= ":nota_total)";
                    $stmt_insert = $conn->prepare($query_insert);
                    for ($j = 1; $j <= 25; $j++) {
                        $param = ":nota$j";
                        $stmt_insert->bindParam($param, $notas[$j - 1]); 
                    }
                    $stmt_insert->bindParam(':id_tecnico', $id_tecnico);
                    $stmt_insert->bindParam(':id_supervisor', $id_supervisor);
                    $stmt_insert->bindParam(':nota_total', $nota_total);
                    $stmt_insert->execute();
                }

                echo "Avaliação inserida com sucesso para o técnico de ID: $id_tecnico <br>";
                $_SESSION['avaliacao_salva'] =  true;
                header('location:lista_tecnico.php');
            }
        }
    }
} catch (PDOException $e) {
    echo "Erro ao inserir avaliação: " . $e->getMessage();
}

?>
