<?php

require_once(__DIR__ . '/../../templates/cabecalho.php');
require_once(__DIR__ . '/../../controllers/RegiaoDAO.php');
$regiaoDAO = new RegiaoDAO();


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


if (!empty($id)) {

  $regiaoDAO->delete($id);
  
  echo "<script>Swal.fire('', 'Região removida com sucesso!', 'success');</script>";
  header('location: ../../views/listaRegioes.php');
}
