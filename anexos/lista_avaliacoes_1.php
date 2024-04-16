<style>
        img#imgplayfibraNav {
            height: 35px;
        }
        /* Estilos CSS */
        .imagem-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centraliza horizontalmente */
        }

        .imagem-item {
            width: 200px;
            margin: 10px; /* Espaçamento entre as imagens */
            text-align: center; /* Centraliza a legenda */
            cursor: pointer; /* Altera o cursor para indicar que a imagem é clicável */
        }

        .imagem-item img {
            width: 100%;
            height: auto;
            max-width: 200px; /* Define o tamanho máximo da imagem */
        }

        .imagem-legenda {
            font-size: 0.8em;
            color: gray;
            margin-top: 5px;
        }

            /* Estilos para a imagem em tamanho grande */
        #imagem-ampliada {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Fundo semi-transparente */
            z-index: 9999; /* Z-index alto para aparecer acima de todo o conteúdo */
            overflow: auto; /* Permite rolar a página se necessário */
            text-align: center; /* Centraliza o conteúdo */
        }

        #imagem-ampliada img {
            width: 50%; /* Tamanho máximo da imagem ampliada */
            max-height: 80vh; /* Altura máxima da imagem ampliada */
            margin-top: 10vh; /* Margem superior para centralizar verticalmente */
        }
        
        form {
        text-align: -webkit-center;
        }

        .form-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label,
        .form-container input {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input[type="file"] {
            margin-top: 5px;
        }

        .form-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
</style>

<?php
    include ('../../sistemaAvaliativo/conn.php');
    include ('../../sistemaAvaliativo/menu.php');

// Processar o envio da imagem
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["img_pontuacao"])) {
     $nome_arquivo = $_POST['nome_img'];

    
    if(empty($nome_arquivo)) { // Se o nome do arquivo estiver vazio, use o nome original do arquivo
        $nome_arquivo = basename($_FILES["img_pontuacao"]["name"]);
    }

    // Preparar e executar a consulta SQL para inserir a imagem no banco
    $queryInsere = "INSERT INTO tbl_avaliacao (img_pontuacao, img_nome) VALUES (?, ?)";
    $stmt = $conn->prepare($queryInsere);
    $imagemConteudo = file_get_contents($_FILES["img_pontuacao"]["tmp_name"]);
    $stmt->bindParam(1, $imagemConteudo, PDO::PARAM_LOB);
    $stmt->bindParam(2, $nome_arquivo);
    
    if ($stmt->execute()) {
        echo "O arquivo foi enviado e salvo no banco de dados.";
    } else {
        echo "Desculpe, houve um erro ao salvar no banco de dados.";
    }

    // Fechar a conexão
    $conn = null;
}
?>

<!-- Formulário para envio de imagem -->
<div class="form-container">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <label for="img_pontuacao">Selecione uma imagem para enviar:</label>
        <input type="file" name="img_pontuacao" id="img_pontuacao" accept="image/*">
        <label for="nome_img">Nome do Arquivo:</label>
        <input type="text" name="nome_img" id="nome_img">
        <input type="submit" value="Enviar Imagem">
    </form>
</div>

<?php
// Inclui novamente o arquivo de conexão com o banco de dados
include ('../../sistemaAvaliativo/conn.php');

// Seleciona as imagens do banco de dados
$query = "SELECT id_avaliacao, img_pontuacao, img_nome, data_hora FROM tbl_avaliacao";
$stmt = $conn->query($query);

// Verifica se foram encontradas imagens
if ($stmt->rowCount() > 0) {
    // Inicia a div do container das imagens
    echo '<div class="imagem-container">';
    
    // Exibe as imagens
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id_avaliacao'];
        $imagemConteudo = base64_encode($row['img_pontuacao']);
        $nome_arquivo = $row['img_nome'];
        $data_hora = $row['data_hora'];
        $dateTime = new DateTime($data_hora);
        $brazilianDate = $dateTime->format('d/m/Y H:i');
        
        // Inicia a div do item da imagem
        echo '<div class="imagem-item">';
        echo '<img src="data:image/jpeg;base64,' . $imagemConteudo . '" alt="' . $nome_arquivo . '">';

        // Exibe a legenda (data e hora)
        echo '<p class="imagem-legenda">' . $brazilianDate . '</p>';
        
        // Fecha a div do item da imagem
        echo '</div>';
    }

    // Fecha a div do container
    echo '</div>';
} else {
    echo "<p>Nenhuma imagem encontrada.</p>";
}
?>


<!-- Container para a imagem ampliada -->
<div id="imagem-ampliada"></div>

<!-- Script jQuery para exibir e ocultar a imagem ampliada -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var imagemAmpliada = $("#imagem-ampliada");

    // Ao clicar em uma imagem, exibe a imagem ampliada
    $(".imagem-item").click(function() {
        var imgSrc = $(this).find("img").attr("src");
        var imgAlt = $(this).find("img").attr("alt");

        // Set the source and alternative text of the enlarged image
        imagemAmpliada.find("img").attr("src", imgSrc);
        imagemAmpliada.find("img").attr("alt", imgAlt);

        // Show the enlarged image
        imagemAmpliada.html('<img src="' + imgSrc + '" alt="' + imgAlt + '">').show();
    });

    // Ao clicar no fundo preto, esconde a imagem ampliada
    $("#imagem-ampliada").click(function() {
        imagemAmpliada.hide();
    });
});
</script>


