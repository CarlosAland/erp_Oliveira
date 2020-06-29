
<?php
require ( __DIR__. '../../templates/cabecalho.php');
require ( __DIR__. '../../controllers/LtDAO.php');

$ltDAO = new LtDAO();

?>

       

<body>
    <header class="cabecalho">
        <h1>Oliveira Podas</h1>
        <h2>Cadastro de Produção Diária</h2>
    
    </header>
  
 

   

     

<!-- script calcula total m2-->
<script type="text/javascript">
  function multiplica()
 {
       num1 = document.getElementById("comp").value;
       num2 = document.getElementById("larg").value;
       document.getElementById("m2").value = num1 * num2;
}
</script>





<div>

<form  method="POST" enctype="multipart/form-data">
 <div class="form-row">
      <div class="form-group col-md-1">
        <label for="text">Item</label>
        <input type="text" class="form-control" name="item" require>
      </div>
      <div class="form-group col-md-2">
        <label for="nome">data</label>
        <input type="date" class="form-control" name="dataprod" require>
      </div>
      
   
           
      <div class="form-group col-md-6">
        <label for="inputRegiao">Lt</label>
        <select id="inputRegiao" class="form-control" name="inputRegiao"require>
          <option selected>Escolher...</option>
          <?php
          foreach ($ltDAO->read() as $lts) {
            echo "<option value='{$lts['TLT_ID_PK']}'> {$lts['TLT_NOME']} -  {$lts['TLT_LOCAL'] } - {$lts['TLT_SIGLA'] }</option>";
          } ?>
        </select>
      </div>
  


      <div class="form-row">
      <div class="form-group col-md-1">
        <label for="text">Vão </label>
        <input type="text" class="form-control" name="vao" require>
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Comprimento</label>
        <input type="text" class="form-control" name="comp" id ="comp" require>
      </div>
      <div class="form-group col-md-1">
        <label for="nome">Largura</label>
        <input type="text" class="form-control" name="larg" id ="larg" onChange="multiplica()"require  >
      </div>
    
      <div class="form-group col-md-2">
        <label for="nome">Total M2</label>
        <input type="text" class="form-control" name="result" id ="m2" readonly>
      </div>
      <div class="form-group col-md-5">
        <label for="text">Justificativa</label>
        <input type="text" class="form-control" name="item" >
      </div>
      </div>
   

     
        <div class="form-group col-md-5">
        <label for="nome">Imagem Antes</label>
        <input type="file" class="form-control" name="img_antes" require>
      </div>
     
      
      <div class="form-group col-md-5">
      <label for="nome">Imagem Depois</label>
        <input type="file" class="form-control" name="img_depois" require>
      </div>
      </div>








<pre>

<!-- envio de imagens --->        
<!--
<label for="">Imagem Produção Antes</label> <br>
    <input type="file" name="img_antes" > <br><br><br>
<label for="">Imagem Produção Depois</label> <br> 
    <input type="file"  name="img_depois"> <br> 
<br><br><br>

<pre>

-->
   <?php




 // envio de imagem de prodcao Antes
 if (isset($_POST['vao']))
     {          
 if (isset($_FILES ['img_antes']))
 $dataproducao = date("d-m-Y ", strtotime($_POST['dataprod']));
     
   $nomeimagemantes= $_FILES['img_antes']['name'];
  if ($_FILES['img_antes']['type'] == 'image/jpeg')
      {
      move_uploaded_file($_FILES['img_antes']['tmp_name'], '../fotos/'. 'I_'. $_POST['item']. '_' .$dataproducao. '_'. 'V'. $_POST['vao']. '_Antes'. '.jpg' );
      }
    else
      {
        echo "<script> alert('Esse arquivo não é uma imagem (JPG). Foto produção antes');</script>" ;
      }
   // imagem depois  
      if (isset($_FILES ['img_depois']))
      $nomeimagedepois= $_FILES['img_depois']['name'];
     if ($_FILES['img_depois']['type'] == 'image/jpeg')
         {
         move_uploaded_file($_FILES['img_depois']['tmp_name'], '../fotos/'.$dataproducao. '_'. 'V'. $_POST['vao']. '_Depois'. '.jpg' );
         }
       else
         {
           echo "<script> alert('Esse arquivo não é uma imagem (JPG). Foto produção depois');</script>" ;
         }


    }

   
?>

</pre>
<button type="submit" class="btn btn-primary"name="enviar">Salvar</button>
<a href="dashboard.php" class="btn btn-secondary">Sair</a>


    </form>
    
   
<?php
  require(__DIR__ . '../../templates/rodape.php');
  ?>