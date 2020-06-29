<?php

require_once(__DIR__ . '/../../templates/cabecalho.php');
require_once(__DIR__ . '/../../controllers/FuncionarioDAO.php');
$funcionarioDAO = new FuncionarioDAO();


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


if (!empty($id)) {

  $funcionarioDAO->delete($id);
  
  echo "<script>Swal.fire('', 'Funcionario removido com sucesso!', 'success');</script>";
  header('location: ../../views/listaFuncionarios.php');
}
