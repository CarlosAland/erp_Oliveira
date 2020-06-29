<?php
require(__DIR__ . '../../templates/cabecalho.php');
require_once(__DIR__ . '/../controllers/RegiaoDAO.php');
require_once(__DIR__ . '/../controllers/LtDAO.php');
require_once(__DIR__ . '/../models/Lt.php');

$regiaoDAO = new RegiaoDAO();
$ltDAO = new LtDAO();


?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Cadastro de LTs</h2>
</header>



<body>

  <form class="formtop" action="./cadastroLts.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-10">
        <label for="nome">Nome da LT </label>
        <input type="text" class="form-control" name="nome">
      </div>
      <div class="form-group col-md-6">
        <label for="text">Sigla </label>
        <input type="text" class="form-control" name="sigla">
      </div>
      <div class="form-group col-md-6">
        <label for="inputRegiao">Região</label>
        <select id="inputRegiao" class="form-control" name="inputRegiao">
          <option selected>Escolher...</option>
          <?php
          foreach ($regiaoDAO->read() as $regioes) {
            echo "<option value='{$regioes['TREGIAO_ID_PK']}'> {$regioes['TREGIAO_NOME']} </option>";
          } ?>
        </select>
      </div>
    </div>
    </div>


    <button type="submit" class="btn btn-primary lg">Salvar</button>
    <a href="listaLts.php" class="btn btn-secondary">Sair</a>
  </form>

  <!--PHP CODE -->
  <?php


  //FILTER INPUT FORM
  $filterForm = [
    "nome" => FILTER_SANITIZE_STRING,
    "sigla" => FILTER_SANITIZE_STRING,
    "inputRegiao" => FILTER_SANITIZE_STRING,
  ];

  //CREATE NEW WORKER

  $formArray = filter_input_array(INPUT_POST, $filterForm);
  if ($formArray) {
    if (in_array("", $formArray)) {
      echo "<script>Swal.fire('Oops...', 'Preencha todos os campos corretamente', 'error');</script>";
    } else {
      $lts = new Lt(
        $formArray['nome'],
        $formArray['sigla'],
        $formArray['inputRegiao'],
      );
      $ltDAO->create($lts);
      echo "<script>Swal.fire('', 'Cadastro realizado com sucesso!', 'success');</script>";
    }
  }



  require(__DIR__ . '../../templates/rodape.php');
  ?>