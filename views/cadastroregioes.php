<?php
require(__DIR__ . '../../templates/cabecalho.php');
require_once(__DIR__ . '../../controllers/RegiaoDAO.php');
require_once(__DIR__ . '../../models/Regiao.php');

$regiaoDAO = new RegiaoDAO();

?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Cadastro de Regiões</h2>
</header>



<body>

  <form class="formtop" action="./cadastroRegioes.php" method="POST" enctype="multipart/form-data" id="editReg">
    <div class="form-row">
      <div class="form-group col-md-10">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" required>
      </div>
      <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="1">
          <label class="custom-control-label" for="customRadio1">Ativo </label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="0">
          <label class="custom-control-label" for="customRadio2">Inativo </label>
        </div>
    </div>
    </div>



    <button type="submit" class="btn btn-primary lg">Salvar</button>
    <a href="listaRegioes.php" class="btn btn-secondary">Sair</a>
  </form>

  <!--PHP CODE -->
  <?php


  //CREATE NEW Region

  $nameRegion = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING,);
  if ($nameRegion) {
    if (empty($nameRegion)) {
      echo "<script>Swal.fire('Oops...', 'Preencha todos os campos corretamente', 'error');</script>";
    } else {
      $region = new Regiao(
        $nameRegion,
        $_POST['status']
      );
      $regiaoDAO->create($region);
      echo "<script>Swal.fire('', 'Cadastro realizado com sucesso!', 'success');</script>";
    }
  }



  require(__DIR__ . '../../templates/rodape.php');
  ?>