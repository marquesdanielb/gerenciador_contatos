<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/estilo.css">
    <title>Anexos</title>
</head>
    <body>
        <div id="bloco_principal">
            <h1>Contato: <?php echo htmlentities($contato->getNome()); ?></h1>
            <p>
                <a href="index.php?rota=contatos">Voltar para a lista de contatos</a>
            </p>
            <p>
                <strong>Telefone:</strong>
                <?php echo htmlentities($contato->getTelefone()); ?>
            </p>
            <p>
                <strong>E-mail:</strong>
                <?php echo htmlentities($contato->getEmail()); ?>
            </p>
            <p>
                <strong>Descrição:</strong>
                <?php echo nl2br(htmlentities($contato->getDescricao())); ?>
            </p>
            <p>
                <strong>Data de Nascimento:</strong>
                <?php echo traduz_data_exibir($contato->getData_nascimento()); ?>
            </p>
            <h2>Anexos</h2>
            <?php if (count($anexos) > 0) : ?>
                <table>
                    <tr>
                        <th>Arquivo</th>
                        <th>Opções</th>
                    </tr>
                    <?php foreach ($anexos as $anexo) : ?>
                        <tr>
                            <td>
                                <?php echo htmlentities($anexo->getArquivo()); ?>
                            </td>
                            <td>
                                <a href="anexos/<?php echo htmlentities($anexo->getArquivo()); ?>">Download</a>
                                <a href="index.php?rota=remover_anexo&id=<?php echo $anexo->getId(); ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <p>Não há anexos para essa contato.</p>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="contato_id" value="<?php echo $contato->getId(); ?>">
                <fieldset>
                    <legend>Novo anexo</legend>
                    <label>
                        <?php if ($tem_erros && array_key_exists('anexo', $erros_validacao)) : ?>
                            <span class="erro">
                                <?php echo $erros_validacao['anexo']; ?>
                            </span>
                        <?php endif; ?>
                        <input type="file" name="anexo">
                    </label>
                    <input type="submit" value="Cadastrar">
                </fieldset>
            </form>
        </div>
    </body>
</html>