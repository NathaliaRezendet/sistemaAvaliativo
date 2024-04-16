<?php
include("conn.php");
include("menu.php");

$query_funcionarios = "SELECT t.id, t.nome, t.imagem, a.nota_total
FROM tbl_tecnicos t
LEFT JOIN tbl_avaliacao a ON t.id = a.id_tecnico
ORDER BY a.nota_total ASC, t.nome ASC";

$result_funcionarios = $conn->query($query_funcionarios);
$funcionarios = $result_funcionarios->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Avaliativo</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-6sn0tA7KTjB1+uvj6bRmx3n3y+be3rI5e5/8gH18wBYhZbpt0iuxvcwUKp2z2zQR" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carrousel.css">
</head>

<body>

  <div class="search-container">
    <input type="text" id="searchInput" placeholder="Pesquisar técnico...">
  </div>

  <section>
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"><img src="./images/simbolo-de-setas-duplas-para-a-esquerda (2).png"></img></i>
      <ul class="carousel">
        <?php foreach ($funcionarios as $funcionario) : ?>
          <li class="cartao">
            <div class="imagem">
              <img src="<?php echo $funcionario['imagem']; ?>" alt="<?php echo $funcionario['nome']; ?>" draggable="false">
            </div>
            <h2><?php echo $funcionario['nome']; ?></h2>
            <a href="avaliacao_tecnico.php?id=<?php echo $funcionario['id']; ?>" class="botao-avaliar">Avaliar</a>
          </li>
        <?php endforeach; ?>
      </ul>
        <i id="right" class="fa-solid fa-angle-right"><img src="./images/simbolo-de-setas-duplas-para-a-direita-para-avancar (1).png" style="width: 24px;"></img></i>
    </div>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const input = document.getElementById("searchInput");
      const cartoes = document.querySelectorAll(".cartao");

      input.addEventListener("input", function() {
        const filtro = input.value.toLowerCase();
        
        cartoes.forEach(function(cartao) {
          const nomeTecnico = cartao.dataset.nome;
          const nomeCartao = cartao.querySelector("h2").textContent.toLowerCase();

          if (nomeCartao.includes(filtro)) {
            cartao.style.display = "block";
          } else {
            cartao.style.display = "none";
          }
        });
      });
    });
  </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="./carousel.js"></script>
  
</body>

</html>