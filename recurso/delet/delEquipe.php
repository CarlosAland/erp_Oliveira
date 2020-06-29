<?php

require_once(__DIR__ . '/../../templates/cabecalho.php');
require_once(__DIR__ . '/../../controllers/EquipeDAO.php');
$equipeDAO = new EquipeDAO();


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


if (!empty($id)) {

  $equipeDAO->delete($id);
  
  echo "<script>Swal.fire('', 'Equipe removida com sucesso!', 'success');</script>";
  header('location: ../../views/listaEquipes.php');
}
