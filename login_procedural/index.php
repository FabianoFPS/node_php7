<?php
//conexão
require_once 'db_connect.php';

session_start();



if(isset($_POST['btn_entrar'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
endif;
echo "<br>";

 ?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Login: <input type="text" name="login" value=""><br>
            Senha: <input type="password" name="senha" value=""><br>
            <button type="submit" name="btn_entrar"> Entrar </button>
        </form>
    </body>
</html>
