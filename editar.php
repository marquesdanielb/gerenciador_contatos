<?php

session_start();

require "banco.php";
require "ajudantes.php";

$exibir_tabela = false;

$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {
    $contato = [
        'id' => $_POST['id'],
        'nome' => $_POST['nome'],
        'telefone' => '',
        'email' => '',
        'descricao' => '',
        'nascimento' => '',
        'favorito' => ''        
    ];

    if (strlen($contato['nome']) == 0) {
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome é obrigatório';
    }

    if (array_key_exists('telefone', $_POST) && $_POST['telefone'] > 0) {
        if (valida_telefone($_POST['telefone'])) {
            $contato['telefone'] = $_POST['telefone']; 
        }else {
            $tem_erros = true;
            $erros_validacao['telefone'] = 'O telefone inserido não é válido';
        }
    }

    if (array_key_exists('email', $_POST) && $_POST['email'] > 0) {
        if (valida_email($_POST['email'])) {
            $contato['email'] = $_POST['email']; 
        }else {
            $tem_erros = true;
            $erros_validacao['email'] = 'O email inserido não é válido';
        }
    }

    if (array_key_exists('descricao', $_POST)) {
        $contato['descricao'] = $_POST['descricao'];
    }

    if (array_key_exists('nascimento', $_POST) && $_POST['nascimento'] > 0) {
        if (valida_nascimento($_POST['nascimento'])) {
            $contato['nascimento'] = traduz_nascimento_banco($_POST['nascimento']); 
        }else {
            $tem_erros = true;
            $erros_validacao['nascimento'] = 'A data de nascimento inserida não é válida';
        }
    }

    if (array_key_exists('favorito', $_POST)) {
        $contato['favorito'] = $_POST['favorito'];
    }

    if (!$tem_erros) {
        editar_contato($conexao, $contato);
        header('Location: contatos.php');
        die();
    }
}

$contato = buscar_contato($conexao, $_GET['id']);

$contato['nome'] = (array_key_exists('nome', $_POST) ? $_POST['nome'] : $contato['nome']);
$contato['telefone'] = (array_key_exists('telefone', $_POST) ? $_POST['telefone'] : $contato['telefone']);
$contato['email'] = (array_key_exists('email', $_POST) ? $_POST['email'] : $contato['email']);
$contato['descricao'] = (array_key_exists('descricao', $_POST) ? $_POST['descricao'] : $contato['descricao']);
$contato['nascimento'] = (array_key_exists('nascimento', $_POST) ? $_POST['nascimento'] : $contato['nascimento']);
$contato['favorito'] = (array_key_exists('favorito', $_POST) ? $_POST['favorito'] : $contato['favorito']);

require "template.php";
