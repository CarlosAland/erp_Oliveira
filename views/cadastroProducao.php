<?php
require_once(__DIR__ . '../../templates/cabecalho.php');
require_once(__DIR__ . '../../controllers/LtDAO.php');
require_once(__DIR__ . '/../controllers/EquipeDAO.php');

$ltDAO = new LtDAO();
$img1 = '';
$img2 = '';

//READ FOR EQUIPE
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
  $equipe = $equipeDAO->readForId($id);
}

function feedForm($id, $worker, $attr)
{
  return $id != '' ? $worker[0][$attr] : '';
}

$eqName = $id != '' ?  $equipe[0]['TEQUIPE_NOME'] : '01';
?>



<body>
  <header class="cabecalho">
    <h1>Oliveira Podas</h1>
    <h2>Cadastro de Produção Diária</h2>

  </header>







  <!-- script calcula total m2-->
  <script type="text/javascript">
    function multiplica() {
      num1 = document.getElementById("comp").value;
      num2 = document.getElementById("larg").value;
      document.getElementById("m2").value = num1 * num2;
    }
  </script>





  <div>

    <form class="formtop" action="./cadastroProducao.php" method="POST" enctype="multipart/form-data" name="formProd">
      <input type="hidden" name="cid" value="<?= feedForm($id, $equipe, 'TEQUIPE_ID_PK') ?>">
      <div class="form-row">
        <div class="form-group col-md-1">
          <label for="text">Item</label>
          <input type="text" class="form-control" name="item" require>
        </div>
        <div class="form-group col-md-2">
          <label for="nome">data</label>
          <input type="date" class="form-control" name="dataprod" require>
        </div>



        <div class="form-group col-md-6">
          <label for="inputRegiao">Lt</label>
          <select id="inputRegiao" class="form-control" name="inputRegiao" require>
            <option selected>Escolher...</option>
            <?php
            foreach ($ltDAO->read() as $lts) {
              echo "<option value='{$lts['TLT_ID_PK']}'> {$lts['TLT_NOME']} -  {$lts['TLT_LOCAL']} - {$lts['TLT_SIGLA']}</option>";
            } ?>
          </select>
        </div>
        <div class="form-row">
          <div class="form-group col-md-1">
            <label for="text">Vão </label>
            <input type="text" class="form-control" name="vao" require>
          </div>
          <div class="form-group col-md-1">
            <label for="nome">Comprimento</label>
            <input type="text" class="form-control" name="comp" id="comp" require>
          </div>
          <div class="form-group col-md-1">
            <label for="nome">Largura</label>
            <input type="text" class="form-control" name="larg" id="larg" onChange="multiplica()" require>
          </div>

          <div class="form-group col-md-2">
            <label for="nome">Total M2</label>
            <input type="text" class="form-control" name="result" id="m2" desable>
          </div>
          <div class="form-group col-md-5">
            <label for="text">Justificativa</label>
            <input type="text" class="form-control" name="justificativa">
          </div>
        </div>



        <div class="form-group col-md-5">
          <label for="nome">Imagem Antes</label>
          <input type="file" class="form-control" name="img_antes" require>
        </div>


        <div class="form-group col-md-5">
          <label for="nome">Imagem Depois</label>
          <input type="file" class="form-control" name="img_depois" require>
        </div>
      </div>

      <button type="submit" class="btn btn-primary" name="enviar">Salvar</button>
      <a href="dashboard.php" class="btn btn-secondary">Sair</a>


    </form>
    <?php


    if (isset($_POST['vao'])) {
      $dataproducao = date("d-m-Y ", strtotime($_POST['dataprod']));
    }

    $folder = __DIR__ . "/../uploads";


    if (!file_exists($folder) || !is_dir($folder)) {
      mkdir($folder, 0755);
    }

    function checkImgType($name)
    {
      return $_FILES[$name]['type'] == "image/jpeg";
    }
    function namePhotor($name, $dataproducao)
    {
      return "I_{$_POST['item']}_D_{$dataproducao}_V_{$_POST['vao']}_{$name}" . mb_strstr($_FILES[$name]['name'], '.');
    }




    $FileDir = __DIR__ . "/../uploads/{$eqName}";
    if (!file_exists($FileDir) || !is_dir($FileDir)) {
      mkdir($FileDir, 0755);
    }
    if (isset($_POST['vao'])) {


      // SEND PREVIOUS IMAGE
      if (checkImgType('img_antes')) {
        $newFileNamePrev = namePhotor('img_antes', $dataproducao);
        if (move_uploaded_file($_FILES['img_antes']['tmp_name'], __DIR__ . "/../uploads/{$eqName}/{$newFileNamePrev}")) {
          $img1 = __DIR__ . "/../uploads/{$eqName}/{$newFileNamePrev}";
          echo "<script>Swal.fire('', 'Arquivo enviado com sucesso!', 'success');</script>";
        } else {
          echo "<script>Swal.fire('Ops...', 'Erro Inesperado!', 'error');</script>";
        }
      } else {
        echo "<script>Swal.fire('Ops...', 'Esse arquivo não é uma imagem (JPG). Foto produção antes!', 'warning');</script>";
      }


      // SEND AFTER IMAGE
      if (checkImgType('img_depois')) {
        $newFileNameAfter = namePhotor('img_depois', $dataproducao);
        if (move_uploaded_file($_FILES['img_depois']['tmp_name'], __DIR__ . "/../uploads/{$eqName}/{$newFileNameAfter}")) {
          $img2 =  __DIR__ . "/../uploads/{$eqName}/{$newFileNameAfter}";
          echo "<script>Swal.fire('', 'Arquivo enviado com sucesso!', 'success');</script>";
        } else {
          echo "<script>Swal.fire('Ops...', 'Erro Inesperado!', 'error');</script>";
        }
      } else {
        echo "<script>Swal.fire('Ops...', 'Esse arquivo não é uma imagem (JPG). Foto produção depois!', 'warning');</script>";
      }
    }

    //FILTER INPUT FORM
  $filterForm = [
    "nome" => FILTER_SANITIZE_STRING,
    "local" => FILTER_SANITIZE_STRING,
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
        $formArray['local'],
        $formArray['sigla'],
        $formArray['inputRegiao']
      );
      $ltDAO->create($lts);
      echo "<script>Swal.fire('', 'Cadastro realizado com sucesso!', 'success');</script>";
    }
  }

    require(__DIR__ . '../../templates/rodape.php');

    ?>