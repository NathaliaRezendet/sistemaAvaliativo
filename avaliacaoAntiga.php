<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Avaliativo</title>

  <!-- css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   <!-- bootstrap -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php
      include('menu.php');
      include('valida-sessao.php');

?>

                              <!-- IMAGEM -->
<img src="https://i.ibb.co/QQ5h6B6/download.png" id="imgplayfibra">
<h2 id="tituloPlay">FORMULÁRIO DE AVALIAÇÃO TÉCNICA</h2>
<h2 id="tituloPlay"></h2>

                        <!-- INÍCIO  DO FORMULÁRIO -->
                        <div class="container">

<table class="table text-center">
    <thead class="thead-info">
      <tr>
        <th scope="col">Nº Avaliação</th>
        <th scope="col">Item</th>
        <th scope="col">Salvar</th>
        <th scope="col">Nota</th>
        <th scope="col">Conceito</th>
      </tr>
    </thead>
    <thead class="thead-info">
      <tr>
        <th scope="col">1</th>
        <th scope="col">Estava trajando uniforme completo e com crachá visível?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">2</th>
        <th scope="col">Ferramental - A mala de ferramentas estava completa, se houve esquecimento de ferramenta, equiamentos ou sujeira na residência do cliente?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">3</th>
        <th scope="col">Meio de transporte - Estava organizado (equipamentos no carro), veículo identificado (plotado), limpo (aparência externa e interna), abastecido e com o estepe em perfeito estado para o uso? 
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">4</th>
        <th scope="col">Segurança do Trabalho - Fazia uso dos EPIs (cinto de segurança paraquedista, talabarte, bota de segurança, luva de segurança, capa de chuva, óculos de segurança, capacete e EPC) cones de sinalização? ? 
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">5</th>
        <th scope="col">Deslocamento ao Cliente (Cumprir a agenda e horários passados pelo apoio a campo) - Utilizou todos os status corretamente de acordo com o processo de atendimento (Deslocamento, Inicio, Refeição, etc)
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>

      <tr>
        <th scope="col">6</th>
        <th scope="col">Deslocamento ao Cliente (Cumprir a agenda com responsabilidade e prudência) - Aplicou os princípios de direção defensiva?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>

      <tr>
        <th scope="col">7</th>
        <th scope="col">Entender a solicitação do cliente (Foco no Cliente) - Utilizou boas     práticas de comunicação (Pediu permissão para entrar na residência,        Articulação Clara, Pronúncia Correta e Empatia) e Fez as devidas Orientações de Uso da Internet e nossos Serviços?
</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>

      <tr>
        <th scope="col">8</th>
        <th scope="col">Entender a solicitação do cliente (Foco no Cliente) - Confirmou o produto velocidade contratada / serviços solicitados antes da execução?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>

      <tr>
        <th scope="col">9</th>
        <th scope="col">Entender a solicitação do cliente (Foco no Cliente) - Solicitou ajuda, se necessário do apoio a campo, sendo permitido escalonar solicitando ao supervisor, NOC ou até mesmo ao Gerente?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>

      <tr>
        <th scope="col">10</th>
        <th scope="col">>Executar os Procedimentos Técnicos conforme os Padrões - Executou o correto procedimento de fixação do cabeamento e ancoragem de cabos aéreos de fibra ópticos 1F realizando o processo de clivagem e limpeza ao efetuar os conectores no cabo de acordo às normas e exigências da Playfibra?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">11</th>
        <th scope="col">Executar os Procedimentos Técnicos conforme os Padrões - Realizando o J ou popular Pingadeira na faixada a passagem correta pelos dutos da residência do cliente ou de acordo com as exigências do cliente sem ferir as normas existentes da Playfibra Interna e Externa?  
        ?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">12</th>
        <th scope="col">Executar os Procedimentos técnicos conforme os Padões - Realizando a acomodação do cabeamento na CTO sem excessos e devidamente identificado com ID do cliente sem efetuar nehuma desconectorização (desconexão) de cliente popular (rodízio)?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">13</th>
        <th scope="col">Executar os Procedimentos Técnicos conforme os Padrões - Orientando e Colocando o Router (ONT/ONU) no ponto no qual o cliente mais faz utilização e de acordo com suas necessidades, informando o melhor posicionamento de acordo com a propagação certa do wi-fi (2.4Ghz e 5Ghz), orientando ao mesmo utilizar se possível suas conexões local via cabo de rede CAT5E ou CAT6E se necessário pontos adicionais na residência do cliente orientar quanto ao uso da rede Mesh (Router mesh) conectados via cabo de rede CAT5E para melhor proveito da velocidade contratadas nos pontos de propagação mesh.
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">14</th>
        <th scope="col">Executar os Procedimentos Técnicos conforme os Padrões - Orientou o cliente a efetuar suas conexões, não deve ser feito as conexões pelo cliente. Se o técnico oriento corretamente? 
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">15</th>
        <th scope="col">Executar os Procedimentos Técnicos conforme os Padrões - Orienta e incentivar o cliente a utilizar os canais de auto atendimento?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">16</th>
        <th scope="col">Testar produto (Qualidade PLAYFIBRA) - Resolveu o Problema deve ser feito o teste de velocímetro utilizando o velocímetro Speedtest by Ookla e nPerf?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>      
      <tr>
        <th scope="col">17</th>
        <th scope="col">Executar os Procedimentos Técnicos conforme os Padrões - Orientando e Colocando o Router (ONT/ONU) no ponto no qual o cliente mais faz      utilização e de acordo com suas necessidades, informando o melhor posicionamento de acordo com a propagação certa do wi-fi (2.4Ghz e 5Ghz), orientando ao mesmo
          se possível suas conexões local via cabo de rede CAT5E ou CAT6E se necessário pontos adicionais na residência do cliente orientar quanto ao uso da rede MeshRouter mesh conectados via cabo de rede CAT5E para melhor proveito da velocidade contratadas nos pontos de propagação mesh.
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">18</th>
        <th scope="col">Executar os Procedimentos Técnicos
          conforme os Padrões - Orienta e
          incentivar o cliente a utilizar os canais
          de auto atendimento?
        </th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">19</th>
        <th scope="col">Executar os Procedimentos Técnicos
          conforme os Padrões - Orienta e
          incentivar o cliente a utilizar os canais
          de auto atendimento?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">20</th>
        <th scope="col">Testar produto (Qualidade
          PLAYFIBRA) - Resolveu o Problema
          deve ser feito o teste de velocímetro
          utilizando o velocímetro Speedtest by
          Ookla e nPerf?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">21</th>
        <th scope="col">Testar produto (Qualidade
          PLAYFIBRA) - Testou os produtos
          para checar se todos estão
          funcionando perfeitamente?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
        <th scope="col">22</th>
        <th scope="col">Testar produto (Qualidade
        PLAYFIBRA) - Testou os produtos
        para checar se todos estão
        funcionando perfeitamente em casos
        de instabilidade e lentidão relatados
        pelo cliente?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>  

      <tr>
      <th scope="col">23</th>
        <th scope="col">Encerrar atendimento (cumprir o
          combinado - Eficiência) - Deixando o
          local com a potência dentro dos
          parâmetros corretos obedecendo a
          perda de 1dbm acima do medido na
          CTO de atendimento do cliente.
          Acima de 25 dbm na CTO obrigatorio
          avisar no Grupo</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
       <th scope="col">24</th>
        <th scope="col"> Encerrar atendimento (Cumprir o
          combinado - Eficiência) - Deixa o
          local conforme os padrões de limpeza
          após atendimento?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
       <th scope="col">25</th>
        <th scope="col"> Encerrar atendimento (Cumprir o
        combinado - Eficiência) - Preencheu
        corretamente a O.S. Fez corretamente
        o laudo técnico, lançou todo o
        material utilizado e entregou segunda
        via para o cliente?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
      <tr>
       <th scope="col">25</th>
        <th scope="col"> Encerrar atendimento (Cumprir o
          combinado - Eficiência ) - Finaliza o
          atendimento e agradece ao cliente
          antes de deixar o local ?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>

     <tr>
       <th scope="col">25</th>
        <th scope="col">      Encerrar suas atividades (Cumprir o
          combinado - Eficiencia ) - Finalizar
          na base com a entrega dos
          equipamentos e OS's Deixar o local?</th>
        <th scope="col"><button class="btn btn-success" href="avaliacao.php">Salvar</button> </th>
        <th scope="col"><input style="width: 80px; text-align: center; height: 37px; border-radius: 5px;" type="number"  placeholder="Nota"></th>
        <th scope="col">
          <a href="conceito/conceito2.php">
              <button class="btn btn-info">Leia o Conceito</button></span>
          </a>
        </th>
      </tr>
    </thead>

</table>
</div>
</body>

