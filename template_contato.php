<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Gerenciador de Contatos</title>
</head>
<body>
    <div="bloco_principal">
        <h1>Contato: <?php echo $contato['nome']; ?></h1>

        <p>
            <a href="contatos.php">Voltar para a lista de contatos</a>
        </p>

        <p>
            <strong>Telefone:</strong>
            <?php echo $contato['telefone']; ?>
        </p>

        <p>
            <strong>Email:</strong>
            <?php echo $contato['email']; ?>
        </p>

        <p>
            <strong>Descrição:</strong>
            <?php echo $contato['descricao']; ?>
        </p>

        <p>
            <strong>Data de Nascimento:</strong>
            <?php echo traduz_nascimento_exibir($contato['nascimento']); ?>
        </p>

        <h2>Anexos</h2>
        <?php if(count($anexos) > 0) : ?>
            <table>
                <tr>
                    <th>Arquivo</th>
                    <th>Opções</th>
                </tr>
                <?php foreach($anexos as $anexo) : ?>
                    <tr>
                        <td><?php echo $anexo['nome']; ?></td>
                        <td>
                            <a href="anexos/<?php echo $anexo['arquivo']; ?>">Download</a>
                            <a href="remover_anexo.php?id=<?php echo $anexo['id']; ?>">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Não há anexos cadastrados para essa contato.</p>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Novo Anexo:</legend>

                <input type="hidden" name="contato_id" value="<?php echo $contato['id']; ?>">
                <label>
                    <?php if($tem_erros && array_key_exists('anexo', $erros_validacao)) : ?>
                        <span class="erro">
                            <?php echo $erros_validacao['anexo']; ?>
                        </span>
                    <?php endif; ?>
                    <input type="file" name="anexo">
                </label>
                <input type="submit" value="Anexar">
            </fieldset>
        </form>
    </div>
</body>
</html>