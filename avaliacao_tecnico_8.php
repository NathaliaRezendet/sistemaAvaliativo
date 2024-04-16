<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistema Avaliativo</title>

   <!-- Bootstrap -->
   
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-nvaBv9QUjQIo7UlszluBq4lF5FfRfwBQsAxIaY53XrrA01buP5zD1q/Z2e9Q5fOW" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   <!-- CSS personalizado -->
   <link rel="stylesheet" href="style.css">

</head>

<body>
   <?php
      include('valida-sessao.php');
      include('menu.php');
   ?>

   <img src="https://i.ibb.co/QQ5h6B6/download.png" id="imgplayfibra">
   <h2 id="tituloPlay">FORMULÁRIO DE AVALIAÇÃO TÉCNICA<br><br><p id="name">RENANN</p></h2>

    <form id="avaliacaoForm" action="insere.php" method="post">

      <div class="container">
         <table class="table text-center">
            <thead class="thead-info">
               <tr>
                  <th scope="col">Nº Avaliação</th>
                  <th scope="col">Item</th>
                  <th scope="col">Nota</th>
                  <th scope="col">Conceito</th>
                  <th scope="col">Imagem</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $questoes = [
                     "Estava trajando uniforme completo e com crachá visível?",
                     "Ferramental - A mala de ferramentas estava completa, se houve esquecimento de ferramenta, equipamentos ou sujeira na residência do cliente?",
                     "Meio de transporte - Estava organizado (equipamentos no carro), veículo identificado (plotado), limpo (aparência externa e interna), abastecido e com o estepe em perfeito estado para o uso?",
                     "Segurança do Trabalho - Fazia uso dos EPIs (cinto de segurança paraquedista, talabarte, bota de segurança, luva de segurança, capa de chuva, óculos de segurança, capacete e EPC) cones de sinalização?",
                     "Deslocamento ao Cliente (Cumprir a agenda e horários passados pelo apoio a campo) - Utilizou todos os status corretamente de acordo com o processo de atendimento (Deslocamento, Inicio, Refeição, etc)",
                     "Deslocamento ao Cliente (Cumprir a agenda com responsabilidade e prudência) - Aplicou os princípios de direção defensiva?)",
                     "Entender a solicitação do cliente (Foco no Cliente) - Utilizou boas práticas de comunicação (Pediu permissão para entrar na residência, Articulação Clara, Pronúncia Correta e Empatia) e Fez as devidas Orientações de Uso da Internet e nossos Serviços?",
                     "Entender a solicitação do cliente (Foco no Cliente) - Confirmou o produto velocidade contratada / serviços solicitados antes da execução?",
                     "Entender a solicitação do cliente (Foco no Cliente) - Solicitou ajuda, se necessário do apoio a campo, sendo permitido escalonar solicitando ao supervisor, NOC ou até mesmo ao Gerente?",
                     "Executar os Procedimentos Técnicos conforme os Padrões - Executou o correto procedimento de fixação do cabeamento e ancoragem de cabos aéreos de fibra ópticos 1F realizando o processo de clivagem e limpeza ao efetuar os conectores no cabo de acordo às normas e exigências da Playfibra?",
                     "Executar os Procedimentos Técnicos conforme os Padrões - Realizando o J ou popular Pingadeira na faixada a passagem correta pelos dutos da residência do cliente ou de acordo com as exigências do cliente sem ferir as normas existentes da Playfibra Interna e Externa? ?",
                     "Executar os Procedimentos técnicos conforme os Padões - Realizando a acomodação do cabeamento na CTO sem excessos e devidamente identificado com ID do cliente sem efetuar nehuma desconectorização (desconexão) de cliente popular (rodízio)?",
                     "Executar os Procedimentos Técnicos conforme os Padrões - Orientando e Colocando o Router (ONT/ONU) no ponto no qual o cliente mais faz utilização e de acordo com suas necessidades, informando o melhor posicionamento de acordo com a propagação certa do wi-fi (2.4Ghz e 5Ghz), orientando ao mesmo utilizar se possível suas conexões local via cabo de rede CAT5E ou CAT6E se necessário pontos adicionais na residência do cliente orientar quanto ao uso da rede Mesh (Router mesh) conectados via cabo de rede CAT5E para melhor proveito da velocidade contratadas nos pontos de propagação mesh.",
                     "Executar os Procedimentos Técnicos conforme os Padrões - Orientou o cliente a efetuar suas conexões, não deve ser feito as conexões pelo cliente. Se o técnico oriento corretamente?",
                     "Executar os Procedimentos Técnicos conforme os Padrões - Orienta e incentivar o cliente a utilizar os canais de auto atendimento?",
                     "Testar produto (Qualidade PLAYFIBRA) - Resolveu o Problema deve ser feito o teste de velocímetro utilizando o velocímetro Speedtest by Ookla e nPerf?",
                     "Executar os Procedimentos Técnicos conforme os Padrões - Orientando e Colocando o Router (ONT/ONU) no ponto no qual o cliente mais faz utilização e de acordo com suas necessidades, informando o melhor posicionamento de acordo com a propagação certa do wi-fi (2.4Ghz e 5Ghz), orientando ao mesmo se possível suas conexões local via cabo de rede CAT5E ou CAT6E se necessário pontos adicionais na residência do cliente orientar quanto ao uso da rede MeshRouter mesh conectados via cabo de rede CAT5E para melhor proveito da velocidade contratadas nos pontos de propagação mesh.",
                     "Executar os Procedimentos Técnicos conforme os Padrões - Orienta e incentivar o cliente a utilizar os canais de auto atendimento?",
                     "Testar produto (Qualidade PLAYFIBRA) - Resolveu o Problema deve ser feito o teste de velocímetro utilizando o velocímetro Speedtest by Ookla e nPerf?",
                     "Testar produto (Qualidade PLAYFIBRA) - Testou os produtos para checar se todos estão funcionando perfeitamente?",
                     "Testar produto (Qualidade PLAYFIBRA) - Testou os produtos para checar se todos estão funcionando perfeitamente em casos de instabilidade e lentidão relatados pelo cliente?",
                     "Encerrar atendimento (cumprir o combinado - Eficiência) - Deixando o local com a potência dentro dos parâmetros corretos obedecendo a perda de 1dbm acima do medido na CTO de atendimento do cliente. Acima de 25 dbm na CTO obrigatorio avisar no Grupo",
                     "Encerrar atendimento (Cumprir o combinado - Eficiência) - Deixa o local conforme os padrões de limpeza após atendimento?",
                     "Encerrar atendimento (Cumprir o combinado - Eficiência) - Preencheu corretamente a O.S. Fez corretamente o laudo técnico, lançou todo o material utilizado e entregou segunda via para o cliente?",
                     "Encerrar atendimento (Cumprir o combinado - Eficiência ) - Finaliza o atendimento e agradece ao cliente antes de deixar o local ?",
                     "Encerrar suas atividades (Cumprir o combinado - Eficiencia ) - Finalizar na base com a entrega dos equipamentos e OS's Deixar o local?"
        
                  ];
                  foreach ($questoes as $i => $questao) :
               ?>
               <tr>
                  <td><?= $i + 1 ?></td>
                  <td><?= $questao ?></td>
                  <td>
                     <input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number" name="notas[<?= $i ?>]" placeholder="Nota">
                  </td>
                  <td>
                     <a href="conceito/<?= $i + 1 ?>.php" class="btn btn-info">Leia o Conceito</a>
                  </td>
                  <td>
                     <a href="anexos/lista_avaliacoes_<?= $i + 1 ?>.php" class="btn btn-warning">Anexar Imagem</a>
                  </td>
                  <td>
                     <input type="hidden" name="id_tecnico[]" value="1">
                     <input type="hidden" name="id_supervisor">
                  </td>
               </tr>              
               <?php endforeach; ?>
            </tbody>
         </table>

         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

         <!-- <div class="satisfacao-container">
            <label class="satisfacao-label">Em geral o quanto você está satisfeito com o desempenho deste funcionário?</label>
            <div class="satisfacao-options">
               <input type="radio" id="muito-insatisfeito" name="satisfacao" value="1">
               <label for="muito-insatisfeito">😞</label>
               <input type="radio" id="insatisfeito" name="satisfacao" value="2">
               <label for="insatisfeito">😕</label>
               <input type="radio" id="satisfeito" name="satisfacao" value="3">
               <label for="satisfeito">😊</label>
               <input type="radio" id="muito-satisfeito" name="satisfacao" value="4">
               <label for="muito-satisfeito">😄</label>
            </div>
         </div> -->

         <div class="d-flex justify-content-center">
            <button type="button" id="confirmBtn" class="btn btn-success" style="width: 250px; margin-bottom: 20px;">Salvar</button>
         </div>
      </div>
   </form>


   <?php 
      if (isset($_SESSION['avaliacao_salva']) && $_SESSION['avaliacao_salva']){
         echo '<div id="successMessage" class="alert alert-success text-center">AVALIAÇÃO ENVIADA COM SUCESSO!</div>';
         $_SESSION['avaliacao_salva'] = false; // Reset a sessão
      }
   ?>

   <!-- Div para exibir mensagens de sucesso ou erro -->
   <div id="message" class="alert" style="display: none;"></div>

   <script>
      $(document).ready(function(){
         $('#confirmBtn').click(function(){
            // Obter o valor selecionado
            var satisfacao = $("input[name='satisfacao']:checked").val();

            // Verificar se algum valor foi selecionado
            if (satisfacao) {
               // Enviar os dados via AJAX para o script PHP
               $.ajax({
                  url: 'salvar_satisfacao.php',
                  type: 'POST',
                  data: { satisfacao: satisfacao },
                  success: function(response) {
                     // Exibir mensagem de sucesso
                     $('#message').removeClass('alert-danger').addClass('alert-success').html('Satisfação salva com sucesso!').show();
                  },
                  error: function(xhr, status, error) {
                     // Exibir mensagem de erro
                     $('#message').removeClass('alert-success').addClass('alert-danger').html('Erro ao salvar satisfação. Por favor, tente novamente mais tarde.').show();
                  }
               });
            } else {
               // Exibir mensagem de erro se nenhum valor foi selecionado
               $('#message').removeClass('alert-success').addClass('alert-danger').html('Por favor, selecione uma opção de satisfação.').show();
            }
         });
      });
   </script>

   <script>
      $(document).ready(function(){
         $('#confirmBtn').click(function(){
            if (confirm("Deseja salvar a nota?")) {
               $('#avaliacaoForm').submit();
            }
         });
      });
   </script>
   <div id="successMessage" class="alert alert-success" style="display: none;">
      Avaliação Salva com Sucesso!
   </div>
</body>