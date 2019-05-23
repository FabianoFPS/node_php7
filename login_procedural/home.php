<?php
session_start();
if(empty($_SESSION['id']))
{
    die('Não autenticado.<br><a href="index.php"><<< voltar</a>');
}
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Página restrita</title>
    </head>
    <body>
        <h1><?php echo $id; ?></h1>
        <br>
        <a href="logout.php">LOGOUT</a>
    </body>
</html>
