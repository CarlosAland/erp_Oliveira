<?php

require_once(__DIR__ . '/../../templates/cabecalho.php');
require_once(__DIR__ . '/../../controllers/LtDAO.php');
$ltDAO = new LtDAO();


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


if (!empty($id)) {

  $ltDAO->delete($id);
  
  echo "<script>Swal.fire('', 'Lt removida com sucesso!', 'success');</script>";
  header('location: ../../views/listaLts.php');
}
