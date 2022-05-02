<?php setcookie('contatos');?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de contatos</h1>
    <form>
        <fieldset>
            <label>
                Nome:
                <input type="text" name="nome">
            </label>
            <label>
                Telefone:
                <input type="tel" name="telefone">
            </label>
            <label>
                Email:
                <input type="mail" name="email">
            </label>
            <input type="submit" name="cadastrar">
        </fieldset>
    </form>
    <?php
        if(isset($_COOKIE)){
            $_COOKIE['contatos'][] = $_GET['nome'];
            $_COOKIE['contatos'][] = $_GET['telefone'];
            $_COOKIE['contatos'][] = $_GET['email'];
        }
    
        $lista_contatos = [];

        if(array_key_exists('contatos', $_COOKIE)){
            $lista_contatos = $_COOKIE['contatos'];
        }
    ?>
    <table>
        <tr>
            <th>Contatos</th>
        </tr>
        <?php foreach($lista_contatos as $contatos) : ?>
                <tr>
                    <td><?php echo $contatos; ?></td>
                </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>