<?php 

session_start();

require "banco.php";
require "ajudantes.php";

$exibir_tabela = true;

$tem_erros = false;
$erros_validacao = [];

if(tem_post()){
    $contato = [
        'nome' => $_POST['nome'],
        'telefone' => '',
        'email' => '',
        'descricao' => '',
        'nascimento' => '',
        'favorito' => ''        
    ];

    if (strlen($contato['nome']) == 0) {
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome do contato é obrigatório';
    }

    if (array_key_exists('telefone', $_POST) && strlen($_POST['telefone']) > 0) {
        if (valida_telefone($_POST['telefone'])) {
            $contato['telefone'] = $_POST['telefone'];
        }else {
            $tem_erros = true;
            $erros_validacao['telefone'] = 'O telefone inserido não é válido';
        }
    }

    if (array_key_exists('email', $_POST) && strlen($_POST['email']) > 0) {
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

    if (array_key_exists('nascimento', $_POST)) {
        if (valida_nascimento($_POST['nascimento'])) {
            $contato['nascimento'] = traduz_nascimento_banco($_POST['nascimento']);
        }else {
            $tem_erros = true;
            $erros_validacao['nascimento'] = 'A data informada não é válida';
        }
    }

    if (array_key_exists('favorito', $_POST)) {
        $contato['favorito'] = 1;
    }else{
        $contato['favorito'] = 0;
    }

    if (!$tem_erros) {
        gravar_contatos($conexao, $contato);
        header('Location: contatos.php');
        die();
    }
}

$contato = [
    'id' => 0,
    'nome' => $_POST['nome'] ?? '',
    'telefone' => $_POST['telefone'] ?? '',
    'email' => $_POST['email'] ?? '',
    'descricao' => $_POST['descricao'] ?? '',
    'nascimento' => (isset($_POST['nascimento'])) ? traduz_nascimento_banco($_POST['nascimento']) : '',
    'favorito' => $_POST['favorito'] ?? ''        
];

$lista_contatos = listar_contatos($conexao);

require "template.php";