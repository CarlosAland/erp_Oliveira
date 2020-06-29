<?php
require(__DIR__ . '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Funcionarios.php');
require_once(__DIR__ . '/../models/Funcao.php');
require_once(__DIR__ . '/../models/Equipe.php');

require_once(__DIR__ . '/../controllers/FuncionarioDAO.php');
require_once(__DIR__ . '/../controllers/FuncaoDAO.php');
require_once(__DIR__ . '/../controllers/EquipeDAO.php');
$funcionarioDAO = new FuncionarioDAO();
$funcaoDAO = new FuncaoDAO();
$equipeDAO = new EquipeDAO();

$funcionarios = []

?>

<!--PHP CODE -->
<?php

//READ FOR WORKER
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


if (!empty($id)) {
  $funcionarios = $funcionarioDAO->readForId($id);
}

function feedForm($id, $worker, $attr)
{
  return $id != '' ? $worker[0][$attr] : '';
}

?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Editar de Funcionários</h2>
</header>

<body>


  <form class="formtop" action="./editarFuncionarios.php" method="POST" enctype="multipart/form-data" id="editFun">
    <div class="form-row">
      <input type="hidden" name="cid" value="<?= feedForm($id, $funcionarios, 'TFUNC_ID') ?>">
      <div class="form-group col-md-1">
        <label for="text">Codigo </label>
        <input type="text" class="form-control" name="cod" value="<?= feedForm($id, $funcionarios, 'TFUNC_CODIGO') ?>">
      </div>
      <div class="form-group col-md-9">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= feedForm($id, $funcionarios, 'TFUNC_NOME') ?>">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="text">Endereço </label>
        <input type="text" class="form-control" name="endereco" value="<?= feedForm($id, $funcionarios, 'TFUNC_END') ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">Bairro</label>
        <input type="text" class="form-control" name="bairro" value="<?= feedForm($id, $funcionarios, 'TFUNC_BAIRRO') ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">CEP</label>
        <input type="text" class="form-control" name="cep" value="<?= feedForm($id, $funcionarios, 'TFUNC_CEP') ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="text">Cidade </label>
        <input type="codigo" class="form-control" name="cidade" value="<?= feedForm($id, $funcionarios, 'TFUNC_CIDADE') ?>">
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Estado</label>
        <input type="text" class="form-control" name="estado" value="<?= feedForm($id, $funcionarios, 'TFUNC_EST') ?>">
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Telefone</label>
        <input type="text" class="form-control" name="tel" value="<?= feedForm($id, $funcionarios, 'TFUNC_TEL') ?>">
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Celular</label>
        <input type="text" class="form-control" name="cel" value="<?= feedForm($id, $funcionarios, 'TFUNC_CEL') ?>">
      </div>

      <div class="form-group col-md-2">
        <label for="nome">RG</label>
        <input type="text" class="form-control" name="rg" value="<?= feedForm($id, $funcionarios, 'TFUNC_RG') ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">CPF</label>
        <input type="text" class="form-control" name="cpf" value="<?= feedForm($id, $funcionarios, 'TFUNC_CPF') ?>">
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Salário</label>
        <input type="num" class="form-control" name="salario" value="<?= feedForm($id, $funcionarios, 'TFUNC_SALARIO') ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="inputFuncao">Função</label>
        <select id="inputFuncao" class="form-control" name="inputFuncao" required>
          <option selected></option>
          <?php
          foreach ($funcaoDAO->read() as $funcoes) {
            echo "<option value='{$funcoes['TFUNCAO_ID_PK']}'> {$funcoes['TFUNCAO_NOME']} </option>";
          } ?>
        </select>


      </div>
      <div class="form-group col-md-2">
        <label for="nome">Data Nascimento</label>
        <input type="date" class="form-control" name="datanasc" value="<?= feedForm($id, $funcionarios, 'TFUNC_DT_NASC') ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">Data Admissão</label>
        <input type="date" class="form-control" name="dataadmin" value="<?= feedForm($id, $funcionarios, 'TFUNC_DT_ADMIS') ?>">

      </div>


      <div class="form-group col-md-4">
        <label for="inputEquipe">Equipe</label>
        <select id="inputEquipe" class="form-control" name="inputEquipe" required>
          <option selected></option>
          <?php
          foreach ($equipeDAO->read() as $equipe) {
            echo "<option value='{$equipe['TEQUIPE_ID_PK']}'> {$equipe['TEQUIPE_NOME']} </option>";
          } ?>
        </select>


      </div>
    </div>
    <!-- bloco dados bancarios-->
    <div class="row">
      <div class="card-body text-primary">
        <div class="card-body">
          <div class="card border-primary mb-12" style="max-width: 50rem;">
            <div class="card-header">Dados Bancários</div>
            <div class="card-body text-primary">

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="text">Banco </label>
                  <input type="text" class="form-control" name="banco" value="<?= feedForm($id, $funcionarios, 'TFUNC_BANCO') ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="nome">Agência</label>
                  <input type="text" class="form-control" name="agencia" value="<?= feedForm($id, $funcionarios, 'TFUNC_AGENCIA') ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="nome">Conta</label>
                  <input type="text" class="form-control" name="conta" placeholder="Conta com o Dígito" value="<?= feedForm($id, $funcionarios, 'TFUNC_CONTA') ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="nome">Tipo da Conta</label>
                  <input type="text" class="form-control" name="tipoconta" placeholder="Corrente ou Poupança" value="<?= feedForm($id, $funcionarios, 'TFUNC_TIPOCONTA') ?>">
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- bloco dados para demissao-->
      <div class="col-sm-6">
        <div class="card-body">
          <div class="card border-danger mb-10" style="max-width: 40rem;">
            <div class="card-header">Dados para Demissão</div>
            <div class="card-body text-danger">

              <div class="form-group col-md-4">
                <label for="text">Data Demissão </label>
                <input type="date" class="form-control" name="datademissao" value="<?= feedForm($id, $funcionarios, 'TFUNC_DT_DEMIS') ?>">
              </div>
              <div class="form-group col-md-8">
                <label for="text">Motivo Demissão </label>
                <input type="text" class="form-control" name="motivodemissao" value="<?= feedForm($id, $funcionarios, 'TFUNC_MOTIVO_DEMIS') ?>">
              </div>
            </div>
          </div>


        </div>
        <button type="submit" class="btn btn-primary " data-confirm=''>Salvar</button>
        <a class="btn btn-danger" href="listafuncionarios.php " role="button">Sair</a>
      </div>

  </form>

  <!--PHP CODE -->
  <?php


  //FILTER INPUT FORM
  $filterForm = [
    "nome" => FILTER_SANITIZE_STRING,
    "endereco" => FILTER_SANITIZE_STRING,
    "bairro" => FILTER_SANITIZE_STRING,
    "cidade" => FILTER_SANITIZE_STRING,
    "estado" => FILTER_SANITIZE_STRING,
    "cel" =>  FILTER_SANITIZE_STRING,
    "rg" => FILTER_SANITIZE_STRING,
    "cpf" =>  FILTER_SANITIZE_STRING,
    "salario" =>  FILTER_SANITIZE_NUMBER_FLOAT,
    "inputFuncao" => FILTER_SANITIZE_STRING,
    "datanasc" => FILTER_DEFAULT,
  ];

  //CREATE NEW WORKER

  $workerArray = filter_input_array(INPUT_POST, $filterForm);

  if ($workerArray) {
    if (in_array("", $workerArray)) {
      echo "<script>Swal.fire('Oops...', 'Preencha todos os campos corretamente', 'error');</script>";
    } else {
      $fn = new Funcionario(
        $_POST['cod'],
        $workerArray['nome'],
        $workerArray['endereco'],
        $workerArray['bairro'],
        $workerArray['cidade'],
        $workerArray['estado'],
        $_POST['cep'],
        $_POST['tel'],
        $workerArray['cel'],
        $workerArray['rg'],
        $workerArray['cpf'],
        $workerArray['datanasc'],
        $_POST['dataadmin'],
        $workerArray['salario'],
        $workerArray['inputFuncao'],
        $_POST['banco'],
        $_POST['agencia'],
        $_POST['conta'],
        $_POST['tipoconta'],
        $_POST['inputEquipe']
      );
      $cid = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_NUMBER_INT);
      $funcionarioDAO->upDate($fn, $cid);

      echo "<script>Swal.fire('', 'Cadastro atualizado com sucesso!', 'success');</script>";
    }
  }



  ?>
</body>

</html>