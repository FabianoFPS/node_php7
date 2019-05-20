<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Upload de Arquivos</title>
    </head>
    <body>
        <?php
            if (isset($_POST['enviar-formulario'])) {
                //var_dump($_FILES);
                $fomatos_permitiddos = array("png", "jpeg", "jpg", "gif", "pdf", "zip", "pptx");

                $quantidade_arquivos = count($_FILES['arquivo']['name']);
                $contador = 0;

                while($contador < $quantidade_arquivos):

                    $extensao = pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_EXTENSION);
                //var_dump($_FILES);
                    echo $extensao.'<br>';
                    if (in_array($extensao, $fomatos_permitiddos)):
                        $pasta = "arquivos/";
                        $temporario = $_FILES['arquivo']['tmp_name'][$contador];
                        echo $temporario."<br>";
                        $novo_nome = uniqid(rand(),true).".$extensao";
                        echo "nome: $novo_nome";
                        echo "<br>temporario: $temporario";
                        if(move_uploaded_file($temporario, $pasta.$novo_nome)):
                            echo "Upload feito com sucesso para $pasta$novo_nome<br>";
                        else:
                            echo "<hr>";
                            var_dump($_FILES);
                            echo "Erro, não foi possivel fazer o upload: $temporario";
                        endif;
                    else:
                        echo "Formato Inválido: $extensao<br>";
                        //print_r($mensagem);
                    endif;

                $contador++;
                endwhile;
            }
        ?>
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="arquivo[]" multiple>
            <input type="submit" name="enviar-formulario" value="Enviar">
        </form>
    </body>
</html>
