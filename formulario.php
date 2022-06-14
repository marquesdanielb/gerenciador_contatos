<form>
    <input type="hidden" name="id" value="<?php echo $contato['id'];?>">
    <fieldset>
        <label>
            Nome:
            <input type="text" name="nome" value="<?php echo $contato['nome']; ?>">
        </label>
        <label>
            Telefone:
            <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>">
        </label>
        <label>
            Email:
            <input type="text" name="email" value="<?php echo $contato['email'];?>">
        </label>
        <label>
            Descrição:
            <textarea name="descricao" value="<?php echo $contato['descricao'];?>"></textarea>
        </label>
        <label>
            Data de nascimento:
            <input type="text" name="nascimento" value="<?php echo traduz_nascimento_exibir($contato['nascimento']);?>">
        </label>
        <label>
            Favorito?
            <input type="checkbox" name="favorito" value='0'
                <?php echo ($contato['favorito'] == 1) ? 'checked' : ''; ?>
            >
        </label>
        <input type="submit" name="cadastrar" value="<?php echo ($contato['id'] > 0 ? 'Atualizar' : 'Cadastrar'); ?>">
    </fieldset>
</form>