
<?php
require ( __DIR__. '../../templates/cabecalho.php');

require_once(__DIR__ . '/../models/Equipe.php');
require_once(__DIR__ . '/../controllers/EquipeDAO.php');
?>
<!--PHP CODE -->
<?php

//READ FOR WORKER
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


if (!empty($id)) {
  $equipe = $EquipeDAO->readForId($id);
  
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

<form class="formtop" >
  <div class="form-row">
      <div class="form-group col-md-10">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome">
  </div>
       <div class="form-group col-md-6">
      <label for="text">Responsável </label>
      <input type="text" class="form-control" id="responsavel">
    </div>
		
    	<div class="form-group col-md-1">
      <label for="nome">Valor Serviço</label>
      <input type="text" class="form-control" name="valorservico">
		</div>	
	<div class="form-group col-md-10">
      <label for="nome">Observação</label>
      <input type="text" class="form-control" name="observacao">
      </div>
	</div>
	</div>
	  
	
   


  <button type="submit" class="btn btn-primary lg">Salvar</button>
  <a href="listaequipes.php" class="btn btn-secondary">Sair</a>
</form>











  
</body>
</html>
