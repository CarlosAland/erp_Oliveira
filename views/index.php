<?php
require(__DIR__ . '../../templates/cabecalho.php');
require_once(__DIR__ . "/../controllers/LoginDAO.php");

$loginDAO = new LoginDAO();



if (isset($_POST['btlogar'])) :

    $erros = array();
    $login = $_POST['nomeusuario'];
    $senha = $_POST['senha'];
    // $senhacritogafadadigitada =password_verify ($senha,)

    var_dump($login);

    if ($login == null || $senha == null) :
        $erros[] = "<script>Swal.fire('', 'O campo login/senha precisa ser preenchido!', 'error')</script>";
    else :
        $result = $loginDAO->loginUsuario($login, $senha);

        if ($result) :
            $_SESSION['logado'] = true;
            $session['id_usuario'] = $result[0]['tlogin_id_pk'];
            echo " <script>Swal.fire('Olá, {$result[0]['tlogin_nome_completo']}', 'Seja bem-vindo!', 'success');</script>";
            header('location: dashboard.php');
        else :
            $erros[] = "<script>Swal.fire('', 'Usuário/senha errado!', 'error');</script>";
        endif;
    endif;
endif;


if (!empty($erros)) :
    foreach ($erros  as $erro) :
        echo $erro;
    endforeach;
endif;
?>


<header class="cabecalho">
    <h1>Oliveira Podas</h1>
    <h2>Sistema de Gerenciamento</h2>
</header>
<main class="principal">
    <div class="conteudo">
        <br>



        <nav class="modulos">
            <div class="modulo verde-escuro">
                <h3>Login</h3>
                <center> <img src="../img/logo.png" alt="Oliveira Podas" width=360 height=150 align=center> </center>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-rpw">

                        <div class="form-group col-md-12">
                            <br>
                            <label for="lblnome">Nome do Usuario</label> <br>
                            <input type="text" class="form-control" name="nomeusuario" placeholder="Digite o nome"> <br><br>
                            <label for="senha">Senha</label> <br>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha">
                            <br>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg" name="btlogar">Entrar</button>
                    <button class="btn btn-default btn-lg">Cancelar</button>

                </form>


        </nav>
    </div>
</main>




<?php
require(__DIR__ . '../../templates/rodape.php');
