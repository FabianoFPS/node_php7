<?php
$senha = "112233445566";

$nova_senha = base64_encode($senha);

echo "base64: $nova_senha<br>";
echo "Sua senha é: ".base64_decode($nova_senha);

echo "<hr>";

echo "MD5: ".md5('$senha');
echo "<hr>";
echo "Sha1: ". sha1($senha);
echo "<hr>";
/*
Criptografia dupla
*/
$parametro = uniqid(rand(),true);

function encripta(string $p_senha, String $p_salt_fonte):string
{
    //gera salt
    $salt = md5($p_salt_fonte);
    //PRIMEIRA ENCRIPTAÇÃO
    $codifica = crypt($p_senha, $salt);
    //SEGUNDA ENCRIPTAÇÃO COM sha512 (128 bits)
    $codifica = hash('sha512', $codifica);

    return $codifica;
}
echo uniqid(rand(),true);
echo "<br>";
echo "primeiro....exemplo:". encripta('123456', $parametro);
echo "<br>";
echo "primeiro....exemplo:". encripta('123456', 'asdfasdfasdfasdf');
echo "<hr>";
echo "segundo...exemplo:". encripta('123456', 'qwerqwetqwrtqerty');
