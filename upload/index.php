<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Upload de Arquivos</title>
    </head>
    <body>
        <?php
            if (isset($_POST['enviar-formulario'])) {
                $fomatos_permitiddos = array("png", "jpeg", "jpg", "gif", "pdf", "pptx", "mrc", "zip");
                var_dump($_FILES);
                echo "<br>";
                $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
                //var_dump($_FILES);
                echo $extensao.'<br>';
                if (in_array($extensao, $fomatos_permitiddos)):
                    $pasta = "arquivos/";
                    $temporario = $_FILES['arquivo']['tmp_name'];
                    echo $temporario."<br>";
                    $novo_nome = uniqid(rand(),true).".$extensao";
                    echo "nome: $novo_nome<br>";

                    if(move_uploaded_file($temporario, $pasta.$novo_nome)):
                        $mensagem = "Upload feito com sucesso!";
                    else:
                        $mensagem = "Erro[1 ($temporario)], não foi possivel fazer o upload";
                    endif;
                else:
                    $mensagem = "Formato Inválido";
                    print_r($mensagem);
                endif;

                echo $mensagem;
            }
        ?>
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="arquivo" >
            <input type="submit" name="enviar-formulario" value="Enviar">
        </form>
    </body>
</html>
