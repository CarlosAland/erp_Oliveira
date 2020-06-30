
<?php
require ( __DIR__. '../../templates/cabecalho.php');
?>
<header class="cabecalho">
            <h1>Oliveira Podas</h1>
            <h2>Cadastro de Usuários</h2> 
        </header>



<body>

<form class="formtop" >
  <div class="form-row">
      <div class="form-group col-md-4">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" required>
  </div>
       <div class="form-group col-md-4">
      <label for="text">Nome Completo </label>
      <input type="text" class="form-control" id="nomecompleto"required>
    </div>
		
    	<div class="form-group col-md-2">
      <label for="nome">Senha</label>
      <input type="password" class="form-control" name="senha"required>
		</div>	
	
	</div>
	</div>
	  
	
   


  <button type="submit" class="btn btn-primary lg">Salvar</button>
  <a href="dashboard.php" class="btn btn-secondary">Sair</a>
</form>











  
</body>
</html>
