
<?php
require ( __DIR__. '../../templates/cabecalho.php');
?>
<header class="cabecalho">
            <h1>Oliveira Podas</h1>
            <h2>Cadastro de Equipes</h2> 
        </header>



<body>

<form class="formtop" >
  <div class="form-row">
      <div class="form-group col-md-8">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome">
  </div>
   <div class="form-check ">
   <label for="text">Ativo </label> <br>
  <input class="form-check-input position-static" type="radio" name="Ativo" id="blankRadio1" value="ativo" aria-label="Ativo">
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
  <a href="dashboard.php" class="btn btn-secondary">Sair</a>
</form>











  
</body>
</html>
