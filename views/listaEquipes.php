<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Equipe.php');
require_once(__DIR__ . '/../controllers/EquipeDAO.php');


$equipeDAO = new EquipeDAO();


?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Listagem de Equipes </h2>
</header>

<body>

<div>
<a class="btn btn-danger" href="dashboard.php " role="button">Voltar</a>
<a class="btn btn-success" href="cadastroEquipes.php " role="button">Cadastrar Novo</a>



  <div class="container theme-showcase" role="main">
    <div class="page-header">

      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>Código</th>
                <th>Nome da Equipe</th>
                <th>Responsável</th>
                <th>Valor Serviço</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($equipeDAO->read() as $equipe) {
                //  var_dump($equipe);
                echo "
                    <tr>
                    <th scope='row'>{$equipe['TEQUIPE_ID_PK']}</th>
                    <td>{$equipe['TEQUIPE_NOME']}</td>
                    <td>{$equipe['TEQUIPE_RESP']}</td>
                    <td>{$equipe['TEQUIPE_VLR_SERV']}</td>
                    <td>
                    <a class='btn btn-primary btn-sm' role='button' href='editarEquipes.php?id={$equipe['TEQUIPE_ID_PK']}' >Editar</a>
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