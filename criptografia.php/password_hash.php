<?php
$senha = "123456";
$senha_segura_default = password_hash($senha, PASSWORD_DEFAULT);

$option = [
    'cost'=>15,
];

$senha_segura_opcional = password_hash($senha, PASSWORD_DEFAULT, $option);

echo $senha_segura_default."<br>".PHP_EOL;
echo $senha_segura_opcional."<br>".PHP_EOL;

$passwordHash='$2y$10$fIv2dBApBGKVDlZwYGUKKe9jQWd2uMfCnxEpfGL2vNuSk.I7M9Zom';


if(!password_verify($senha, $passwordHash)){
    exit("Senha inválida");
}
echo "Senha Válida";
