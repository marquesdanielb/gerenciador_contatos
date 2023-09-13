<form method="POST">
    <input type="hidden" name="id" value="<?php echo $contato->getId(); ?>">
    <fieldset>
        <legend>Nova Contato</legend>
        <label>
            Nome:
            <?php if($tem_erros && array_key_exists('nome', $erros_validacao)) : ?>
                <span class="erro">
                   <?php echo $erros_validacao['nome']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="nome" value="<?php echo htmlentities($contato->getNome());?>">
        </label>
        <label>
            Telefone:
            <?php if ($tem_erros && array_key_exists('telefone', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['telefone']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="telefone" value="<?php echo htmlentities($contato->getTelefone());?>">
        </label>
        <label>
            E-mail:
            <?php if($tem_erros && array_key_exists('email', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['email']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="email" value="<?php echo htmlentities($contato->getEmail());?>">
        </label>
        <label>
            Descrição:
            <input type="text" name="descricao" value="<?php echo htmlentities($contato->getDescricao());?>">
        </label>
        <label>
            Data de Nascimento:
            <?php if ($tem_erros && array_key_exists('data_nascimento', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['data_nascimento']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="data_nascimento" value="<?php echo traduz_data_exibir($contato->getData_nascimento());?>">
        </label>
        <fieldset>
            <label>
                Favorito:
                <input type="checkbox" name="favorito" value="1"
                    <?php echo ($contato->getFavorito() == 1) ? 'checked' : '';?>
                />
            </label>
        </fieldset>
        <br>
        <input type="submit" value="<?php echo ($contato->getId() > 0) ? 'Atualizar' : 'Cadastrar'; ?>">
    </fieldset>
</form>