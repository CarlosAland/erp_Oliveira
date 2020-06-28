
<?php
include_once ('../controllers/conexao.php'); 
session_start();

if(isset($_POST['btlogar'])):
  
    $erros = array();
    $login = mysqli_escape_string($conn,$_POST['nomeusuario']);
    $senha = mysqli_escape_string($conn,$_POST['senha']);
   // $senhacritogafadadigitada =password_verify ($senha,)

    if(empty($login)) ://or empty($senha)):
        $erros [] ="<li> O campo login/senha precisa ser preenchido</li>";
    else:
        $sql = "SELECT * FROM tlogin WHERE tlogin_nome = '$login'" ;
        $resultado = mysqli_query($conn,$sql) ;
        if (mysqli_num_rows($resultado) > 0):
            $sql = "SELECT * FROM tlogin WHERE tlogin_nome = '$login' AND tlogin_pass = '$senha'" ;
            $resultado = mysqli_query($conn,$sql) ;
            if (mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $session['id_usuario'] = $dados['tlogin_id_pk'];
                header ('location: index.php');
            else:
                $erros[]= "<li>Usuário e senha não conferem </li>";
            endif;
                    else:
            $erros[] = "<li>Usuário  não existe </li>";
            endif;
        endif;
    endif;


    ?>

<?php
require ( __DIR__. '../../templates/cabecalho.php');

?>







<?php 

if (!empty($erros)):
    foreach($erros  as $erro):
        echo "<script>alert('$erro');</script>";
    endforeach;
endif;    
?>
    <header class="cabecalho">
        <h1>Oliveira Podas</h1>
        <h2>Sistema de Gerenciamento</h2>
    </header>
    <main class="principal">
        <div class="conteudo">
        <center> <img src="../img/logo.png" alt="Oliveira Podas" width=360 height=150  align=center> </center>
        <br>
        <br>
            <nav class="modulos">
                <div class="modulo verde-escuro">
                    <h3>Login</h3>
         
        <form action ="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-rpw">
        
        <div class="form-group col-md-12">
			<br>
        <label for="lblnome">Nome do Usuario</label> <br>
        <input type="text" class="form-control" name="nomeusuario" placeholder="Digite o nome" > <br><br>
		        <label for="senha">Senha</label> <br>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha">
            <br>
         </div>
      		</div>
    
    <button class = "btn btn-primary btn-lg" name= "btlogar">Entrar</button>
    <button class = "btn btn-default btn-lg">Cancelar</button>
			
	</form>
                
            
            </nav>
        </div>
    </main>



    
<?php
require ( __DIR__. '../../templates/rodape.php');

?>