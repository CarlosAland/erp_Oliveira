<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Equipe.php');
require_once(__DIR__ . '/../controllers/EquipeDAO.php');


$equipeDAO = new EquipeDAO();


?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Listagem de Equipes Inativas</h2>
</header>

<body>

<div>
<a class="btn btn-danger" href="dashboard.php " role="button">Voltar</a>

  <div class="container theme-showcase table-responsive" role="main">
    <div class="page-header">

      <div class="row">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr class="bg-danger">
                <th>Código</th>
                <th>Nome da Equipe</th>
                <th>Responsável</th>
                <th>Valor Serviço</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($equipeDAO->readDisable() as $equipe) {
                //  var_dump($equipe);
                echo "
                    <tr>
                    <th>{$equipe['TEQUIPE_ID_PK']}</th>
                    <td>{$equipe['TEQUIPE_NOME']}</td>
                    <td>{$equipe['TEQUIPE_RESP']}</td>
                    <td>{$equipe['TEQUIPE_VLR_SERV']}</td>
                    <td>
                    <a class='btn btn-primary btn-sm' role='button' href='editaRequipes.php?id={$equipe['TEQUIPE_ID_PK']}' >Editar</a>
                    </td>
                    </tr>
                    ";
              }
              ?>

            </tbody>
            <tfoot>

            </tfoot>
          </table>

        </div>


        <!--PHP CODE -->
        <?php
        require_once(__DIR__.'/../templates/rodape.php');
          
        
        ?>
</body>

</html>