<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Funcionarios.php');
require_once(__DIR__ . '/../controllers/FuncionarioDAO.php');
$funcionarioDAO = new FuncionarioDAO();


?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Listagem de Funcionários Inativos</h2>
</header>

<body>

<div>
<a class="btn btn-danger" href="dashboard.php " role="button">Voltar</a>
<a class="btn btn-success" href="cadastroFuncionarios.php " role="button">Cadastrar Novo</a>



<div class="container theme-showcase table-responsive" role="main">
    <div class="page-header">

      <div class="row">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr class="bg-danger">
                <th>Código</th>
                <th>Nome Funcionário</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($funcionarioDAO->readDisable() as $funcionarios) {
                //  var_dump($funcionarios);
                echo "
                    <tr>
                    <th scope='row'>{$funcionarios['TFUNC_ID']}</th>
                    <td>{$funcionarios['TFUNC_NOME']}</td>
                    <td>{$funcionarios['TFUNC_CPF']}</td>
                    <td>{$funcionarios['TFUNC_CEL']}</td>
                    <td>
                    <a class='btn btn-primary' role='button' href='editarFuncionarios.php?id={$funcionarios['TFUNC_ID']}' >Editar</a>
                   
                
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