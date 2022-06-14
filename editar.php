<?php

session_start();

require "banco.php";
require "ajudantes.php";

$exibir_tabela = false;

if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {
    $contato = [
        'id' => $_GET['id'],
        'nome' => $_GET['nome'],
        'telefone' => '',
        'email' => '',
        'descricao' => '',
        'nascimento' => '',
        'favorito' => ''        
    ];

    if (array_key_exists('telefone', $_GET)) {
        $contato['telefone'] = $_GET['telefone'];
    }

    if (array_key_exists('email', $_GET)) {
        $contato['email'] = $_GET['email'];
    }

    if (array_key_exists('descricao', $_GET)) {
        $contato['descricao'] = $_GET['descricao'];
    }

    if (array_key_exists('nascimento', $_GET)) {
        $contato['nascimento'] = traduz_nascimento_banco($_GET['nascimento']);
    }

    if (array_key_exists('favorito', $_GET)) {
        $contato['favorito'] = $_GET['favorito'];
    }

    editar_contato($conexao, $contato);

    header('Location: contatos.php');
    die();
}

$contato = buscar_contato($conexao, $_GET['id']);

require "template.php";
