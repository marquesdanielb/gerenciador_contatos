<?php 

$exibir_tabela = true;
$exibir_formulario = true;

$tem_erros = false;
$erros_validacao = [];

$contato = new Contatos\Models\Contato();
$contato->setFavorito(1);

if (tem_post()) {
    if (strlen($_POST['nome']) > 0 && array_key_exists('nome', $_POST)) {
        $contato->setNome($_POST['nome']);
    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome é obrigatório';
    }

    if (strlen($_POST['telefone']) > 0) {
        $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_NUMBER_INT);
        if (validar_telefone($telefone)) {
            $contato->setTelefone($_POST['telefone']);
        } else {
            $tem_erros = true;
            $erros_validacao['telefone'] = 'O telefone informado não é válido!';
        }
    }

    if ($_POST['email'] > 0) {
        if (validar_email($_POST['email'])) {
            $contato->setEmail($_POST['email']);
        } else {
            $tem_erros = true;
            $erros_validacao['email'] = 'O email informado não é válido!';
        }
    }

    if (strlen($_POST['descricao']) > 0) {
        $contato->setDescricao($_POST['descricao']);
    } elseif ($_POST['descricao'] == '') {
        $contato->setDescricao('');
    }

    if ($_POST['data_nascimento'] > 0) {
        if (validar_data($_POST['data_nascimento'])) {
            $contato->setData_nascimento(traduz_data_banco($_POST['data_nascimento']));
        } else {
            $tem_erros = true;
            $erros_validacao['data_nascimento'] = 'A data de nascimento está no formato incorreto!';
        }
    }

    if (isset($_POST['favorito']) && $_POST['favorito'] == 1) {
        $contato->setFavorito(1);
    } else {
        $contato->setFavorito(0);
    }

    if (!$tem_erros) {
        $repositorio_contatos->salvar_contato($contato);
        header('Location: index.php?rota=contatos');
        die();
    }
}

$lista_contatos = $repositorio_contatos->buscar();

require __DIR__ . "/../views/template.php";
