<?php 

session_start();

require "banco.php";
require "ajudantes.php";

if(array_key_exists('nome', $_GET) && $_GET['nome'] != ''){

    $contato['nome'] = $_GET['nome'];

    if (array_key_exists('telefone', $_GET)) {
        $contato['telefone'] = traduz_telefone_banco($_GET['telefone']);
    }

    if (array_key_exists('email', $_GET)) {
        $contato['email'] = traduz_email_banco($_GET['email']);
    }

    if (array_key_exists('descricao', $_GET)) {
        $contato['descricao'] = traduz_descricao_banco($_GET['descricao']);
    }

    if (array_key_exists('nascimento', $_GET)) {
        $contato['nascimento'] = traduz_nascimento_banco($_GET['nascimento']);
    }      

    if (array_key_exists('favorito', $_GET)) {
        $contato['favorito'] = 1;
    }else{
        $contato['favorito'] = 0;
    }

    gravar_contatos($conexao, $contato);
}

$lista_contatos = listar_contatos($conexao);

require "template.php";