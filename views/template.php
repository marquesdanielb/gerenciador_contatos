<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/estilo.css">
        <title>Gerenciador de Contatos</title>
    </head>
    <body>
        <h1><a href="index.php?rota=contatos">Gerenciador de Contatos</a></h1>
        <a href="index.php?rota=favoritos">Listar Favoritos</a>
        <br>
        <br>
        <?php if($exibir_formulario) : ?>
            <?php require 'formulario.php';?>
        <?php endif; ?>

        <?php if($exibir_tabela) : ?>
            <?php require 'tabela.php';?>
        <?php endif; ?>
    </body>
</html>