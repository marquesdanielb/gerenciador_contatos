<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Gerenciador de Contatos</title>
</head>
<body>
    <h1>Gerenciador de contatos</h1>
    <form>
        <fieldset>
            <label>
                Nome:
                <textarea name="nome"></textarea>
            </label>
            <label>
                Telefone:
                <input type="text" name="telefone">
            </label>
            <label>
                Email:
                <input type="text" name="email">
            </label>
            <label>
                Descrição:
                <input type="text" name="descricao">
            </label>
            <label>
                Data de nascimento:
                <input type="text" name="nascimento">
            </label>
            <label>
                Favorito?
                <input type="checkbox" name="favorito" value='0'>
            </label>
            <input type="submit" value="cadastrar">
        </fieldset>
    </form>
    <table>
        <tr>
            <th>Contato</th>
            <th>telefone</th>
            <th>Email</th>
            <th>Descrição</th>
            <th>Nascimento</th>
            <th>Favorito?</th>
        </tr>
        <?php foreach($lista_contatos as $contatos) : ?>
                <tr>
                    <td><?php echo $contatos['nome']; ?></td>
                    <td><?php echo $contatos['telefone']; ?></td>
                    <td><?php echo $contatos['email']; ?></td>
                    <td><?php echo $contatos['descricao']; ?></td>
                    <td><?php echo traduz_nascimento_exibir($contatos['nascimento']); ?></td>
                    <td><?php echo traduz_favorito($contatos['favorito']); ?></td>
                </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>