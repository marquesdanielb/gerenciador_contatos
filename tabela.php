<table>
    <tr>
        <th>Contato</th>
        <th>telefone</th>
        <th>Email</th>
        <th>Descrição</th>
        <th>Nascimento</th>
        <th>Favorito?</th>
        <th>Opções</th>
    </tr>
    <?php foreach($lista_contatos as $contatos) : ?>
            <tr>
                <td>
                    <a href="contato.php?id=<?php echo $contatos['id']; ?>">
                        <?php echo $contatos['nome']; ?>
                    </a>
                </td>
                <td><?php echo $contatos['telefone']; ?></td>
                <td><?php echo $contatos['email']; ?></td>
                <td><?php echo $contatos['descricao']; ?></td>
                <td><?php echo traduz_nascimento_exibir($contatos['nascimento']); ?></td>
                <td><?php echo traduz_favorito($contatos['favorito']); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $contatos['id']; ?>">
                        Editar
                    </a>
                    <a href="remover.php?id=<?php echo $contatos['id']; ?>">
                        Remover
                    </a>
                </td>
            </tr>
    <?php endforeach; ?>
</table>
