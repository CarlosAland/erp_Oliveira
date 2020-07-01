<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Equipe.php');
require_once(__DIR__ . '/../controllers/EquipeDAO.php');
$equipeDAO = new EquipeDAO();


?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Cadastro de Equipes</h2>
</header>



<body>

  <form class="formtop" action="./cadastroEquipes.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-10">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" required>
      </div>
      <div class="form-group col-md-6">
        <label for="text">Responsável </label>
        <input type="text" class="form-control" name="responsavel" required>
      </div>

      <div class="form-group col-md-1">
        <label for="nome">Valor Serviço</label>
        <input type="text" class="form-control" name="valorservico" required>
      </div>
      <div class="form-group col-md-10">
        <label for="nome">Observação</label>
        <input type="text" class="form-control" name="observacao">
      </div>
    </div>
    </div>

    <button type="submit" class="btn btn-primary lg">Salvar</button>
    <a href="listaEquipes.php" class="btn btn-secondary">Sair</a>
  </form>

  <!--PHP CODE -->
  <?php

  //FILTER INPUT FORM
  $filterForm = [
    "nome" => FILTER_SANITIZE_STRING,
    "responsavel" => FILTER_SANITIZE_STRING,
  ];

  //CREATE NEW WORKER

  $formArray = filter_input_array(INPUT_POST, $filterForm);
  if ($formArray) {
    if (in_array("", $formArray)) {
      echo "<script>Swal.fire('Oops...', 'Preencha todos os campos corretamente', 'error');</script>";
    } else {
      $eqp = new Equipe(
        $formArray['nome'],
        $formArray['responsavel'],
        str_replace(',', '.', $_POST['valorservico']),
        $_POST['observacao']

      );
      $equipeDAO->create($eqp);

      echo "<script>Swal.fire('', 'Cadastro realizado com sucesso!', 'success');</script>";
    }
  }



  require(__DIR__ . '../../templates/rodape.php');
  ?>