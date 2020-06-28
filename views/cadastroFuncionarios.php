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




?>
<header class="cabecalho">
  <h1>Oliveira Podas</h1>
  <h2>Cadastro de Funcionários</h2>
</header>

<body>


<form class="formtop" action="./cadastroFuncionarios.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-1">
        <label for="text">Codigo </label>
        <input type="text" class="form-control" name="cod">
      </div>
      <div class="form-group col-md-10">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" require>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="text">Endereço </label>
        <input type="text" class="form-control" name="endereco" require>
      </div>
      <div class="form-group col-md-2">
        <label for="nome">Bairro</label>
        <input type="text" class="form-control" name="bairro">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">CEP</label>
        <input type="text" class="form-control" name="cep">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="text">Cidade </label>
        <input type="codigo" class="form-control" name="cidade">
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Estado</label>
        <input type="text" class="form-control" name="estado">
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Telefone</label>
        <input type="text" class="form-control" name="tel">
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Celular</label>
        <input type="text" class="form-control" name="cel" require>
      </div>

      <div class="form-group col-md-2">
        <label for="nome">RG</label>
        <input type="text" class="form-control" name="rg"require
        >
      </div>
      <div class="form-group col-md-2">
        <label for="nome">CPF</label>
        <input type="text" class="form-control" name="cpf"require>
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Salário</label>
        <input type="num" class="form-control" name="salario">
      </div>
      <div class="form-group col-md-2">
        <label for="inputState">Função</label>
        <select id="inputState" class="form-control" name="inputState">
          <option selected>Escolher...</option>
          <?php
         foreach ($funcaoDAO->read() as $funcoes) {
          echo "<option value='{$funcoes['TFUNCAO_ID_PK']}'> {$funcoes['TFUNCAO_NOME']} </option>";
          } ?>
        </select>


      </div>
      <div class="form-group col-md-2">
        <label for="nome">Data Nascimento</label>
        <input type="date" class="form-control" name="datanasc">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">Data Admissão</label>
        <input type="date" class="form-control" name="dataadmin">

      </div>
   

    <div class="form-group col-md-4">
        <label for="inputState">Equipe</label>
        <select id="inputState" class="form-control" name="inputState">
          <option selected>Escolher...</option>
          <?php
          foreach ($equipeDAO->read() as $equipe) {
            echo "<option value='{$equipe['TEQUIPE_ID_PK']}'> {$equipe['TEQUIPE_NOME']} </option>";
          } ?>
        </select>
        

      </div>  
      </div>  
<div>
  <!-- bloco dados bancarios-->
<div class="row">
<div class="card-body text-primary">
<div class="card-body">
      <div class="card border-primary mb-12"  >
      <div class="card-header">Dados Bancários</div>
        <div class="card-body text-primary">
    
        <div class="form-row">
      <div class="form-group col-md-4">
        <label for="text">Banco </label>
        <input type="text" class="form-control" name="banco">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">Agência</label>
        <input type="text" class="form-control" name="agencia">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">Conta</label>
        <input type="text" class="form-control" name="conta" placeholder="Conta com o Dígito">
      </div>
      <div class="form-group col-md-4">
        <label for="nome">Tipo da Conta</label>
        <input type="text" class="form-control" name="tipoconta" placeholder="Corrente ou Poupança">
      </div>
    
      </div>
      </div>
      </div>
      
    </div>
  </div>
  </div>
  </div>        

    <button type="submit" class="btn btn-primary ">Salvar</button>
    <a class="btn btn-danger" href="listaFuncionarios.php " role="button">Sair</a>


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
    "inputState" => FILTER_SANITIZE_STRING,
    "datanasc" => FILTER_DEFAULT,
  ];

  //CREATE NEW WORKER

  $workerArray = filter_input_array(INPUT_POST, $filterForm);
  if ($workerArray) {
    if (in_array("", $workerArray)) {
      echo "<script>Swal.fire('Oops...', 'Preencha todos os campos corretamente', 'error');</script>";
    } else {
      $funcionario = new Funcionario(
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
        $workerArray['inputState'],
        $_POST['obs'],
        $_POST['banco'],
        $_POST['agencia'],
        $_POST['conta'],
        $_POST['tipoconta']
      );
      $funcionarioDAO->create($funcionario);
      echo "<script>Swal.fire('', 'Cadastro realizado com sucesso!', 'success');</script>";
    }
  }




  ?>
</body>

</html>