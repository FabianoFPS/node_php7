<?php
    $login_com_sqlinjection = "Um teste de or '1='1;";
    $senha_com_sqlinjection = "Um teste de or '1='1;";
    $filtro_texto = '/[^[:alpha:]_]/';
    $filtro_text_numero = '/[^[:alnum:]_]/';
    $Login_limpo = preg_replace($filtro_texto, '', $login_com_sqlinjection);
    $Senha_limpa = preg_replace($filtro_text_numero, '', $senha_com_sqlinjection);

    echo "  login_com_sqlinjection: $login_com_sqlinjection <br>
            Login_limpo: $Login_limpo <br>
            senha_com_sqlinjection: $senha_com_sqlinjection <br>
            Senha_limpa: $Senha_limpa";
 ?>
