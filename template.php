<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Gerenciador de Contatos</title>
</head>
<body>
    <h1>Gerenciador de contatos</h1>

    <?php require('formulario.php'); ?>
    <?php if($exibir_tabela) : ?>
        <?php require('tabela.php'); ?>
    <?php endif; ?>

</body>
</html>