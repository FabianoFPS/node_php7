<?php
/*
define('BD_HOST' , "zeus");
define('DB_USER' , "0063950");
define('DB_PASSWORD' , "799873");
define('DB_NAME' , "pergamarc");
define('BD_DRIVER' , "sqlsrv");
*/
    $server_name = "sqlteste";
    $user_name = "0063950";
    $password = "feevale";
    $db_name = "pergamarc";

    /*Conexão mysql*/
    /*$conect = mysqli_connect($server_name, $user_name, $password, $db_name);
    if(mysqli_connect_error()):
        echo "Falha na conexão: ".mysqli_connect_error();
    endif:
    */
    try {
        $pdoConfig = "sqlsrv:Server=$server_name;Database=$db_name;";
        $connect = new PDO($pdoConfig, $user_name, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$resultado = $connect->query("select nome_pessoa from pessoa where cod_pessoa = 63950");
        //$sql = "select nome_pessoa from pessoa where cod_pessoa = :codigo";

        $sql_verifica_usuario = "select login_ldap from pessoa where login_ldap like :codigo";

        $sql = "select  cod_pessoa,
                        nome_pessoa,
                        senha_alfa,
                        login_ldap
                from    pessoa
                where   login_ldap = :codigo and
                        senha_alfa like :senha
                ";
        $sth0 = $connect->prepare($sql_verifica_usuario, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth = $connect->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        unset($connect);
        //$cod_pessoa = '63950';
        //$sth->execute(array(':codigo'=>&$cod_pessoa));
        //$connect = NULL;

        //$result = $sth->fetchall();
        //print_r($result);
    } catch (Exception $e) {
        exit($e-getMessage());
    }

?>
