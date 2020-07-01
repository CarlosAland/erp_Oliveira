<?php
require_once(__DIR__ . '../../templates/cabecalho.php');
require_once(__DIR__ . '../../controllers/LtDAO.php');
require_once(__DIR__ . '/../controllers/EquipeDAO.php');
require_once(__DIR__ . '/../controllers/producaoDAO.php');
require_once(__DIR__ . '/../models/Producao.php');

$ltDAO = new LtDAO();
$producaoDAO = new ProducaoDAO();
$equipeDAO = new EquipeDAO();

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

    <form class="formtop" action="" method="POST" enctype="multipart/form-data" name="formProd">
      <input type="hidden" name="cid" value="<?= feedForm($id, $equipe, 'TEQUIPE_ID_PK') ?>">
      <div class="form-row">
        <div class="form-group col-md-1">
          <label for="text">Item</label>
          <input type="text" class="form-control" name="item" required>
        </div>
        <div class="form-group col-md-2">
          <label for="nome">data</label>
          <input type="date" class="form-control" name="dataprod" required>
        </div>



        <div class="form-group col-md-6">
          <label for="inputRegiao">Lt</label>
          <select id="inputRegiao" class="form-control" name="inputRegiao" required>
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
            <input type="text" class="form-control" name="vao" required>
          </div>
          <div class="form-group col-md-1">
            <label for="nome">Comprimento</label>
            <input type="text" class="form-control" name="comp" id="comp" required>
          </div>
          <div class="form-group col-md-1">
            <label for="nome">Largura</label>
            <input type="text" class="form-control" name="larg" id="larg" onChange="multiplica()" required>
          </div>

          <div class="form-group col-md-2">
            <label for="nome">Total M2</label>
            <input type="text" class="form-control" name="result" id="m2" disabled>
          </div>
          <div class="form-group col-md-5">
            <label for="text">Justificativa</label>
            <input type="text" class="form-control" name="justificativa">
          </div>
        </div>



        <div class="form-group col-md-5">
          <label for="nome">Imagem Antes</label>
          <input type="file" class="form-control" name="img_antes" required>
        </div>


        <div class="form-group col-md-5">
          <label for="nome">Imagem Depois</label>
          <input type="file" class="form-control" name="img_depois" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary" name="enviar">Salvar</button>
      <a href="listaEquipesProducao.php" class="btn btn-secondary">Sair</a>


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



    $eqNameDir = str_replace(' ', '_', $equipe[0]['TEQUIPE_NOME']);


    $FileDir = __DIR__ . "/../uploads/{$eqNameDir}";
    if (!file_exists($FileDir) || !is_dir($FileDir)) {
      mkdir($FileDir, 0755);
    }

    if (isset($_POST['vao'])) {


      // SEND PREVIOUS IMAGE
      if (checkImgType('img_antes')) {
        $newFileNamePrev = namePhotor('img_antes', $dataproducao);
        if (move_uploaded_file($_FILES['img_antes']['tmp_name'], __DIR__ . "/../uploads/{$eqNameDir}/{$newFileNamePrev}")) {
          $img1 = __DIR__ . "/../uploads/{$eqNameDir}/{$newFileNamePrev}";

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
        if (move_uploaded_file($_FILES['img_depois']['tmp_name'], __DIR__ . "/../uploads/{$eqNameDir}/{$newFileNameAfter}")) {
          $img2 =  __DIR__ . "/../uploads/{$eqNameDir}/{$newFileNameAfter}";
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
      "item" => FILTER_SANITIZE_STRING,
      "dataprod" => FILTER_DEFAULT,
      "inputRegiao" => FILTER_SANITIZE_STRING,
      "vao" => FILTER_SANITIZE_STRING
    ];

    //CREATE NEW PRODUCT
    $cid = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_NUMBER_INT);
    $vlrservico = $equipeDAO->read($cid);

    $formArray = filter_input_array(INPUT_POST, $filterForm);
    if ($formArray) {
      if (in_array("", $formArray)) {
        echo "<script>Swal.fire('Oops...', 'Preencha todos os campos corretamente', 'error');</script>";
      } else {
        $producao = new Producao(
          $formArray['item'],
          $formArray['dataprod'],
          $formArray['inputRegiao'],
          $formArray['vao'],
          str_replace(',', '.', $_POST['comp']),
          str_replace(',', '.', $_POST['larg']),
          $img1,
          $img1,
          $cid,
          $vlrservico[0]['TEQUIPE_VLR_SERV']
        );
        $producaoDAO->create($producao);
        echo "<script>Swal.fire('', 'Cadastro realizado com sucesso!', 'success');</script>";
      }
    }

    require(__DIR__ . '../../templates/rodape.php');

    ?>