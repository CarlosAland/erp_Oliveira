<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Regiao.php');
require_once(__DIR__ . '/../controllers/RegiaoDAO.php');
$regiaoDAO = new RegiaoDAO();

$regiao = []

?>
<!--PHP CODE -->

<?php

//READ FOR REGION
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
  $regiao = $regiaoDAO->readForId($id);
}

function feedForm($id, $region, $attr)
{
  return $id != '' ? $region[0][$attr] : '';
}

?>



<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Editar Região</h2>
</header>



<body>

  <form class="formtop" action="./editarRegioes.php" method="POST" enctype="multipart/form-data" id="editReg">
    <div class="form-row">
      <input type="hidden" name="cid" value="<?= feedForm($id, $regiao, 'TREGIAO_ID_PK') ?>">
      <div class="form-group col-md-10">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= feedForm($id, $regiao, 'TREGIAO_NOME') ?>">
      </div>
    </div>

    <button type="submit" class="btn btn-primary lg">Salvar</button>
    <a href="listaRegioes.php" class="btn btn-secondary">Sair</a>
  </form>

  <!--PHP CODE -->
  <?php


  //CREATE NEW REGION

  $RegionForm = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  if ($RegionForm) {
    if (empty($RegionForm)) {
      echo "<script>Swal.fire('Oops...', 'Preencha todos os campos corretamente', 'error');</script>";
    } else {
      $rg = new Regiao(
        $RegionForm
      );
      $cid = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_NUMBER_INT);
      $regiaoDAO->upDate($rg, $cid);

      echo "<script>Swal.fire('', 'Cadastro atualizado com sucesso!', 'success');</script>";
    }
  }



  ?>

  <?php
  require_once(__DIR__ . '/../templates/rodape.php');

  ?>