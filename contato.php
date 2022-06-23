<?php

require "banco.php";
require "ajudantes.php";

$contato = buscar_contato($conexao, $_GET['id']);

if (! is_array($contato)) {
    http_response_code(404);
    echo 'Contato não encontrado';
    die();
}

$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {

    $contato_id = $_POST['contato_id'];

    if (array_key_exists('anexo', $_FILES) && $_FILES['anexo']['name'] == '') {
        $tem_erros = true;
        $erros_validacao['anexo'] = 'Você selecionar um arquivo para anexar';
    }else{
        if (tratar_anexo($_FILES['anexo'])) {
            $nome = $_FILES['anexo']['name'];
            $anexo = [
                'contato_id' => $contato_id,
                'nome' => substr($nome, 0, -4),
                'arquivo' => $nome
            ];
        }else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'O formato do arquivo inserido não é válido. Somente .jpg ou .jpeg'; 
        }
    }

    if (!$tem_erros) {
        gravar_anexo($conexao, $anexo);
        header('Location: contato.php?id='.$contato_id);
        die();
    }
}

$anexos = buscar_anexos($conexao, $_GET['id']);

require "template_contato.php";