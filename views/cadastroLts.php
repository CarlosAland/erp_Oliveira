
<?php
require ( __DIR__. '../../templates/cabecalho.php');
?>
<header class="cabecalho">
            <h1>Oliveira Podas</h1>
            <h2>Cadastro de LTs</h2> 
        </header>



<body>

<form class="formtop">
  <div class="form-row">
      <div class="form-group col-md-10">
      <label for="nome">Nome da LT </label>
      <input type="text" class="form-control" name="nome">
  </div>
       <div class="form-group col-md-6">
      <label for="text">Sigla </label>
      <input type="text" class="form-control" id="sigla">
    </div>
	<div class="form-group col-md-6">	
    <label for="inputState">Região</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option> ....</option>
      </select>
	  </div>
	</div>
	</div>
	  
	
   


  <button type="submit" class="btn btn-primary lg">Salvar</button>
  <a href="listaLts.php" class="btn btn-secondary">Sair</a>
</form>











  
</body>
</html>
