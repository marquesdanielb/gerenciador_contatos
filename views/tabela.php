<table>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Descrição</th>
        <th>Data de Nascimento</th>
        <th>Favorito</th>
        <th>Opções</th>
    </tr>
    <?php foreach ($lista_contatos as $contato) : ?>
        <tr>
            <td>
                <a href="index.php?rota=contato&id=<?php echo $contato->getId(); ?>">
                    <?php echo $contato->getNome(); ?>
                </a>
            </td>
            <td><?php echo $contato->getTelefone(); ?></td>
            <td><?php echo $contato->getEmail(); ?></td>
            <td><?php echo $contato->getDescricao(); ?></td>
            <td><?php echo traduz_data_exibir($contato->getData_nascimento()); ?></td>
            <td><?php echo traduz_favorito_exibir($contato->getFavorito()); ?></td>
            <td>
                <a href="index.php?rota=editar&id=<?php echo $contato->getId(); ?>">Editar</a>
                <a href="index.php?rota=remover&id=<?php echo $contato->getId(); ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>