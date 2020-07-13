<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Lt.php');
require_once(__DIR__ . '/../controllers/LtDAO.php');
require_once(__DIR__ . '/../controllers/RegiaoDAO.php');

$regiaoDAO = new RegiaoDAO();
$ltDAO = new LtDAO();

$lt = [];
$regiao = [];

?>
<!--PHP CODE -->

<?php

//READ FOR Lt
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
  $lt = $ltDAO->readForId($id);
  $regiao = $regiaoDAO->readForId($lt[0]['TLT_REGIAO_FK']);
}

function feedForm($id, $lt, $attr)
{
  return $id != '' ? $lt[0][$attr] : '';
}

function feedRegion($id, $model, $attr)
{
  if ($id != '') {

    return $model != [] ? $model[0][$attr] : '';
  }
}

?>



<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Editar LT's</h2>
</header>



<body>

  <form class="formtop" action="./editarLts.php" method="POST" enctype="multipart/form-data" id="editEqp">
    <div class="form-row">
      <input type="hidden" name="cid" value="<?= feedForm($id, $lt, 'TLT_ID_PK') ?>">
      <div class="form-group col-md-10">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= feedForm($id, $lt, 'TLT_NOME') ?>">
      </div>
      <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="<?= feedForm($id, $lt, 'TLT_STATUS') ?>">
          <label class="custom-control-label" for="customRadio1">Ativo </label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="<?= feedForm($id, $lt, 'TLT_STATUS') ?>">
          <label class="custom-control-label" for="customRadio2">Inativo </label>
        </div>
      <div class="form-group col-md-6">
        <label for="text">Local </label>
        <input type="text" class="form-control" name="local" value="<?= feedForm($id, $lt, 'TLT_LOCAL') ?>">
      </div>

      <div class="form-group col-md-1">
        <label for="nome">Sigla</label>
        <input type="text" class="form-control" name="sigla" value="<?= feedForm($id, $lt, 'TLT_SIGLA') ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="inputRegiao">Região</label>
        <select id="inputRegiao" class="form-control" name="inputRegiao">
          <option selected><?= feedRegion($id, $regiao, 'TREGIAO_NOME') ?></option>
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
    "local" => FILTER_SANITIZE_STRING,
    "sigla" => FILTER_SANITIZE_STRING,
    "inputRegiao" => FILTER_SANITIZE_STRING
  ];

  //CREATE NEW Lts

  $formArray = filter_input_array(INPUT_POST, $filterForm);
  if ($formArray) {
    if (in_array("", $formArray)) {
      echo "<script>Swal.fire('Oops...', 'Preencha todos os campos corretamente', 'error');</script>";
    } else {
      $lts = new Lt(
        $formArray['nome'],
        $formArray['local'],
        $formArray['sigla'],
        $formArray['inputRegiao'],
        $_POST['status']
      );
      $cid = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_NUMBER_INT);
      $ltDAO->upDate($lts, $cid);

      echo "<script>Swal.fire('', 'Cadastro atualizado com sucesso!', 'success');</script>";
    }
  }



  ?>

  <?php
  require_once(__DIR__ . '/../templates/rodape.php');

  ?>