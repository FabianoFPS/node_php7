<?php
//conexão
require_once 'db_connect.php';

session_start();



if(isset($_POST['btn_entrar'])):
    $erros = array();
    //$login = mysqli_escape_string($connect, $_POST['login']);
    echo "<br>";
    $filtro_text_numero = '/[^[:alnum:]_]/';
    $login = preg_replace($filtro_text_numero, '', $_POST['login']);
    echo "<br>";
    $senha = preg_replace($filtro_text_numero, '', $_POST['senha']);

    if(empty($login) or empty($senha)):
        $erros[]="<li>O campo Login/senha precisa ser preenchido</li>";
    else:
        // TODO:(codigo original do curso) selec login from usuarios where login = '$logn'
        try {
            $sth0->execute(array(':codigo'=>&$login));
            echo "<br>";
            echo $sth0->rowCount();
            if ($sth0->rowCount() < 0)
            {
                var_dump($sth);
                //echo "<br>login: $login, senha: $senha<br>";

                $senha_md5 = md5($senha);
                $sth->execute(array(':codigo'=>&$login,
                                    ':senha'=>&$senha_md5
                                )
                            );
                echo "<br>Qunatidade de linhas sth: ".$sth->rowCount();
                if($sth->rowCount()<0)
                {
                    $result = $sth->fetchall();
                    print_r($result);

                    $_SESSION['logado'] = true;
                    $_SESSION['id'] = $result[0]['login_ldap'];
                    echo $_SESSION['id'];
                    header ('Location: home.php');
                }else {
                    echo "<br>Senha Inválida<br>";
                }

            }else {
                echo "<i>Usuario inexistente</i>";
            }
        } catch (PDOException $exception) {
            echo $exception;
        }
    endif;
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
        <?php
            if (!empty($erros)) {
                foreach ($erros as $key => $value):
                    echo $value;
                endforeach;
            }
         ?>
        <hr>
        <h1>Login</h1>
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Login: <input type="text" name="login" value=""><br>
            Senha: <input type="password" name="senha" value=""><br>
            <button type="submit" name="btn_entrar"> Entrar </button>
            <input type="reset" name="limpar" value="Limpar">
        </form>
    </body>
</html>
