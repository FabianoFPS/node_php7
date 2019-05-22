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
        $sql = "select nome_pessoa from pessoa where cod_pessoa = :codigo";
        $sth = $connect->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(':codigo'=>"63950"));
        $connect = NULL;

        $result = $sth->fetchall();
        print_r($result);
    } catch (Exception $e) {
        exit($e-getMessage());
    }

?>
