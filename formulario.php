<form method="POST">
    <input type="hidden" name="id" value="<?php echo $contato['id'];?>">
    <fieldset>
        <label>
            Nome:
            <?php if($tem_erros && array_key_exists('nome', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['nome']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="nome" value="<?php echo $contato['nome']; ?>">
        </label>
        <label>
            Telefone:
            <?php if($tem_erros && array_key_exists('telefone', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['telefone']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>">
        </label>
        <label>
            Email:
            <?php if($tem_erros && array_key_exists('email', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['email']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="email" value="<?php echo $contato['email'];?>">
        </label>
        <label>
            Descrição:
            <textarea name="descricao" value="<?php echo $contato['descricao'];?>"></textarea>
        </label>
        <label>
            Data de nascimento:
            <?php if($tem_erros && array_key_exists('nascimento', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['nascimento']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="nascimento" value="<?php echo traduz_nascimento_exibir($contato['nascimento']);?>">
        </label>
        <label>
            Favorito?
            <input type="checkbox" name="favorito" value='0'
                <?php echo ($contato['favorito'] == 1) ? 'checked' : ''; ?>
            >
        </label>
        <input type="submit" value="<?php echo ($contato['id'] > 0 ? 'Atualizar' : 'Cadastrar'); ?>">
    </fieldset>
</form>