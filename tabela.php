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