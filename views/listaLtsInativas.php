<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Lt.php');
require_once(__DIR__ . '/../controllers/LtDAO.php');
$ltDAO = new LtDAO();


?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Listagem de Linhas de Transmissão - Inativas</h2>
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
                <th>LT Código</th>
                <th>LT Nome</th>
                <th>LT local</th>
                <th>Sigla</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($ltDAO->readDisable() as $lts) {
                //  var_dump($lts);
                echo "
                    <tr>
                    <th scope='row'>{$lts['TLT_ID_PK']}</th>
                    <td>{$lts['TLT_NOME']}</td>
                    <td>{$lts['TLT_LOCAL']}</td>
                    <td>{$lts['TLT_SIGLA']}</td>
                    <td>
                    <a class='btn btn-primary' role='button' href='editarLts.php?id={$lts['TLT_ID_PK']}' >Editar</a>
                  
                
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