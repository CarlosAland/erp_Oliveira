<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Equipe.php');
require_once(__DIR__ . '/../controllers/EquipeDAO.php');
$equipeDAO = new EquipeDAO();

$equipe = []



?>
<!--PHP CODE -->

<?php

//READ FOR WORKER
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
  $equipe = $equipeDAO->readForId($id);
}

function feedForm($id, $worker, $attr)
{
  return $id != '' ? $worker[0][$attr] : '';
}

?>

<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Editar Equipes</h2>
</header>



<body>

  <form class="formtop" action="./editarEquipes.php" method="POST" enctype="multipart/form-data" id="editEqp">
    <div class="form-row">
      <input type="hidden" name="cid" value="<?= feedForm($id, $equipe, 'TEQUIPE_ID_PK') ?>">
      <div class="form-group col-md-10">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= feedForm($id, $equipe, 'TEQUIPE_NOME') ?>">
      </div>
      <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="<?= feedForm($id, $equipe, 'TEQUIPE_STATUS') ?>">
          <label class="custom-control-label" for="customRadio1">Ativo </label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="<?= feedForm($id, $equipe, 'TEQUIPE_STATUS') ?>">
          <label class="custom-control-label" for="customRadio2">Inativo </label>
        </div>
   
      <div class="form-group col-md-6">
        <label for="text">Responsável </label>
        <input type="text" class="form-control" name="responsavel" value="<?= feedForm($id, $equipe, 'TEQUIPE_RESP') ?>">
      </div>

      <div class="form-group col-md-1">
        <label for="nome">Valor Serviço</label>
        <input type="text" class="form-control" name="valorservico" value="<?= feedForm($id, $equipe, 'TEQUIPE_VLR_SERV') ?>">
      </div>
      <div class="form-group col-md-10">
        <label for="nome">Observação</label>
        <input type="text" class="form-control" name="observacao" value="<?= feedForm($id, $equipe, 'TEQUIPE_OBS') ?>">
      </div>
  
    </div>
    </div>

    <button type="submit" class="btn btn-primary lg">Salvar</button>
    <a href="listaequipes.php" class="btn btn-secondary">Sair</a>
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
        $_POST['observacao'],
        $_POST['status']

      );
      $cid = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_NUMBER_INT);
      $equipeDAO->upDate($eqp, $cid);

      echo "<script>Swal.fire('', 'Cadastro atualizado com sucesso!', 'success');</script>";
    }
  }



  ?>

  <?php
  require_once(__DIR__ . '/../templates/rodape.php');

  ?>