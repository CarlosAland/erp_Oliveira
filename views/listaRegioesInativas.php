<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Regiao.php');
require_once(__DIR__ . '/../controllers/RegiaoDAO.php');
$regiaoDAO = new RegiaoDAO();


?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Listagem de Regiões - Inativas  </h2>
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
                <th>Nome</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($regiaoDAO->readDisable() as $regioes) {
                //  var_dump($lts);
                echo "
                    <tr>
                    <th scope='row'>{$regioes['TREGIAO_ID_PK']}</th>
                    <td>{$regioes['TREGIAO_NOME']}</td>
                    <td>
                    <a class='btn btn-primary' role='button' href='editarRegioes.php?id={$regioes['TREGIAO_ID_PK']}' >Editar</a>
                
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