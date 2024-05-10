<?php
include("conn.php");
include('valida-sessao.php');
include('menu.php');

$nome = "Nome do Técnico !!!!";
 
// Verifica se o ID do técnico foi passado pela URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_tecnico = $_GET['id'];

    // Consulta para obter o nome do técnico
    $query = "SELECT nome_tecnico FROM tbl_tecnicos WHERE id_tecnico = :id_tecnico";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_tecnico', $id_tecnico, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $tecnico = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $nome = $tecnico['nome_tecnico'];
    }
} else {
   header("Location: erro.php");
   exit();
}

// Processamento do formulário de avaliação
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Verifica se as notas foram enviadas via POST
   if(isset($_POST['notas']) && is_array($_POST['notas'])) {
       $notas = $_POST['notas'];
       
       // Inicializa a string de consulta SQL para inserir a avaliação
       $query = "INSERT INTO tbl_avaliacao (id_supervisor, id_tecnico, ";

       // Adiciona as colunas de notas à consulta SQL
       for ($i = 1; $i <= 24; $i++) {
           $query .= "nota$i, ";
       }

       // Remove a vírgula extra no final da string
       $query = rtrim($query, ", ");

       // Adiciona os valores das notas à consulta SQL
       $query .= ") VALUES (:id_supervisor, :id_tecnico, ";
       for ($i = 1; $i <= 24; $i++) {
           $query .= ":nota$i, ";
       }
       $query = rtrim($query, ", "); // Remover a vírgula extra no final
       $query .= ")";

       $stmt = $conn->prepare($query);

       $stmt->bindParam(':id_supervisor', $_SESSION['id'], PDO::PARAM_INT); // Supondo que o ID do supervisor está armazenado na sessão
       $stmt->bindParam(':id_tecnico', $id_tecnico, PDO::PARAM_INT);

       // Adiciona os valores das notas aos parâmetros da consulta SQL
       foreach ($notas as $indice => $nota) {
           $param = ":nota" . ($indice + 1); // O índice começa em 0, então adicionamos 1 para corresponder às notas 1, 2, 3, ...
           $stmt->bindParam($param, $nota, PDO::PARAM_INT);
       }

       // Executa a consulta SQL
       if($stmt->execute()) {
          echo '<div class="alert alert-success" role="alert">Avaliação salva com sucesso!</div>';
       } else {
           echo '<div class="alert alert-danger" role="alert">Erro ao salvar avaliação!</div>';
       }
   } else {
       echo '<div class="alert alert-danger" role="alert">Nenhuma nota foi recebida!</div>';
   }
   exit; // Termina a execução do script após o processamento do formulário
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistema Avaliativo</title>


   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-nvaBv9QUjQIo7UlszluBq4lF5FfRfwBQsAxIaY53XrrA01buP5zD1q/Z2e9Q5fOW" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-2hEoBqR86YTf2Gz4OJHgY6niFMgE7pZ5Ei37sTlnhvsgpFl5G96Q5uIeqL1MsfMfT5IyMMeHJcdDdmELoxH77A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="./css/avaliacao.css">
</head>

<body>

<h2 id="tituloPlay">FORMULÁRIO DE AVALIAÇÃO TÉCNICA<br><br>
<a href="avaliacoes_imagens.php">
   <p id="name"><?= $nome ?></p></h2> 
      <button type="button" class="btn btn-primary mr-3" id="btnAnexarImagem" data-id="<?= $id_tecnico ?>">
         Anexar Imagem
      </button>
</a>

<!-- <input style="width: 20%; text-align: center; height: 37px; border-radius: 5px; margin-left: 40%; margin-bottom: 2%;" type="text" id="nome_cliente" name="nome_cliente" placeholder="Nome do Cliente"> -->

<form id="avaliacaoForm" action="insere.php" method="post">
   <input type="hidden" name="name" value="<?= $nome ?>">
   <input type="hidden" name="id_tecnico" value="<?= $id_tecnico ?>"> 
   <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

         <div class="carousel-inner">
            <?php
            $questoes = [
                "01/25 <br><br> Ferramental - A mala de ferramentas estava completa, se houve esquecimento de ferramenta, equipamentos ou sujeira na residência do cliente?",   
                "02/25 <br><br> Meio de transporte - Estava organizado (equipamentos no carro), veículo identificado (plotado), limpo (aparência externa e interna), abastecido e com o estepe em perfeito estado para o uso?",
                "03/25 <br><br> Segurança do Trabalho - Fazia uso dos EPIs (cinto de segurança paraquedista, talabarte, bota de segurança, luva de segurança, capa de chuva, óculos de segurança, capacete e EPC) cones de sinalização?",
                "04/25 <br><br> Deslocamento ao Cliente (Cumprir a agenda e horários passados pelo apoio a campo) - Utilizou todos os status corretamente de acordo com o processo de atendimento (Deslocamento, Inicio, Refeição, etc)",
                "05/25 <br><br> Deslocamento ao Cliente (Cumprir a agenda com responsabilidade e prudência) - Aplicou os princípios de direção defensiva?)",
                "06/25 <br><br> Entender a solicitação do cliente (Foco no Cliente) - Utilizou boas práticas de comunicação (Pediu permissão para entrar na residência, Articulação Clara, Pronúncia Correta e Empatia) e Fez as devidas Orientações de Uso da Internet e nossos Serviços?",
                "07/25 <br><br> Entender a solicitação do cliente (Foco no Cliente) - Confirmou o produto velocidade contratada / serviços solicitados antes da execução?",
                "08/25 <br><br> Entender a solicitação do cliente (Foco no Cliente) - Solicitou ajuda, se necessário do apoio a campo, sendo permitido escalonar solicitando ao supervisor, NOC ou até mesmo ao Gerente?",
                "09/25 <br><br> Executar os Procedimentos Técnicos conforme os Padrões - Executou o correto procedimento de fixação do cabeamento e ancoragem de cabos aéreos de fibra ópticos 1F realizando o processo de clivagem e limpeza ao efetuar os conectores no cabo de acordo às normas e exigências da Playfibra?",
                "10/25 <br><br> Executar os Procedimentos Técnicos conforme os Padrões - Realizando o J ou popular Pingadeira na faixada a passagem correta pelos dutos da residência do cliente ou de acordo com as exigências do cliente sem ferir as normas existentes da Playfibra Interna e Externa? ?",
                "11/25 <br><br> Executar os Procedimentos técnicos conforme os Padões - Realizando a acomodação do cabeamento na CTO sem excessos e devidamente identificado com ID do cliente sem efetuar nehuma desconectorização (desconexão) de cliente popular (rodízio)?",
                "12/25 <br><br> Executar os Procedimentos Técnicos conforme os Padrões - Orientando e Colocando o Router (ONT/ONU) no ponto no qual o cliente mais faz utilização e de acordo com suas necessidades, informando o melhor posicionamento de acordo com a propagação certa do wi-fi (2.4Ghz e 5Ghz), orientando ao mesmo utilizar se possível suas conexões local via cabo de rede CAT5E ou CAT6E se necessário pontos adicionais na residência do cliente orientar quanto ao uso da rede Mesh (Router mesh) conectados via cabo de rede CAT5E para melhor proveito da velocidade contratadas nos pontos de propagação mesh.",
                "13/25 <br><br> Executar os Procedimentos Técnicos conforme os Padrões - Orientou o cliente a efetuar suas conexões, não deve ser feito as conexões pelo cliente. Se o técnico oriento corretamente?",
                "14/25 <br><br> Executar os Procedimentos Técnicos conforme os Padrões - Orienta e incentivar o cliente a utilizar os canais de auto atendimento?",
                "15/25 <br><br> Testar produto (Qualidade PLAYFIBRA) - Resolveu o Problema deve ser feito o teste de velocímetro utilizando o velocímetro Speedtest by Ookla e nPerf?",
                "16/25 <br><br> Executar os Procedimentos Técnicos conforme os Padrões - Orientando e Colocando o Router (ONT/ONU) no ponto no qual o cliente mais faz utilização e de acordo com suas necessidades, informando o melhor posicionamento de acordo com a propagação certa do wi-fi (2.4Ghz e 5Ghz), orientando ao mesmo se possível suas conexões local via cabo de rede CAT5E ou CAT6E se necessário pontos adicionais na residência do cliente orientar quanto ao uso da rede MeshRouter mesh conectados via cabo de rede CAT5E para melhor proveito da velocidade contratadas nos pontos de propagação mesh.",
                "17/25 <br><br> Executar os Procedimentos Técnicos conforme os Padrões - Orienta e incentivar o cliente a utilizar os canais de auto atendimento?",
                "18/25 <br><br> Testar produto (Qualidade PLAYFIBRA) - Resolveu o Problema deve ser feito o teste de velocímetro utilizando o velocímetro Speedtest by Ookla e nPerf?",
                "19/25 <br><br> Testar produto (Qualidade PLAYFIBRA) - Testou os produtos para checar se todos estão funcionando perfeitamente?",
                "20/25 <br><br> Testar produto (Qualidade PLAYFIBRA) - Testou os produtos para checar se todos estão funcionando perfeitamente em casos de instabilidade e lentidão relatados pelo cliente?",
                "21/25 <br><br> Encerrar atendimento (cumprir o combinado - Eficiência) - Deixando o local com a potência dentro dos parâmetros corretos obedecendo a perda de 1dbm acima do medido na CTO de atendimento do cliente. Acima de 25 dbm na CTO obrigatorio avisar no Grupo",
                "22/25 <br><br> Encerrar atendimento (Cumprir o combinado - Eficiência) - Deixa o local conforme os padrões de limpeza após atendimento?",
                "23/25 <br><br> Encerrar atendimento (Cumprir o combinado - Eficiência) - Preencheu corretamente a O.S. Fez corretamente o laudo técnico, lançou todo o material utilizado e entregou segunda via para o cliente?",
                "24/25 <br><br> Encerrar atendimento (Cumprir o combinado - Eficiência ) - Finaliza o atendimento e agradece ao cliente antes de deixar o local ?",
                "25/25 <br><br> Encerrar suas atividades (Cumprir o combinado - Eficiencia ) - Finalizar na base com a entrega dos equipamentos e OS's Deixar o local?"
            ];

            foreach ($questoes as $i => $questao) :
            ?>
            <div class="carousel-item<?= $i === 0 ? ' active' : '' ?>" id="questao-<?= $i ?>">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title text-center"><?= $questao ?></h5>
                        <input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number" name="notas[<?= $i ?>]" placeholder="Nota">
                     </div>
                  </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>

    <div class="d-flex justify-content-center">

         <button type="submit" class="btn btn-success" id="btnSalvar" style="width: 250px; margin-bottom: 50px; display: none;">Salvar Avaliação</button>
         <button type="button" class="btn-back btnfos btnfos-4">Pergunta Anterior</button>
         <button type="button" class="btn-next btnfos btnfos-4">Próxima pergunta</button>         
      </div>
   </div>
</form>
<div id="successMessage" class="alert alert-success" style="display: none;">
   Avaliação Salva com Sucesso!
</div>

<script>
$(document).ready(function() {
   // Inicia o carrossel sem transição automática
   $('.carousel').carousel({
      interval: false
   });

   // Adiciona um evento de clique aos botões de navegação
   $('.btn-next').click(function() {
      // Avança para o próximo slide
      $('.carousel').carousel('next'); 

      // Verifica se o penúltimo slide está ativo para exibir ou ocultar o botão de salvar
      if ($('.carousel-item:nth-last-child(2)').hasClass('active')) {
         $('#btnSalvar').show(); 
         $('.btn-next').hide(); 
      }
   });

   $('.btn-back').click(function() {
      // Retrocede para o slide anterior
      $('.carousel').carousel('prev');

      // Oculta o botão de salvar e exibe o botão de próxima pergunta
      $('#btnSalvar').hide();
      $('.btn-next').show();
   });
});
</script>


</body>
</html>
