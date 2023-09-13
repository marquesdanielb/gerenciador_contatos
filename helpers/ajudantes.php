<?php

function traduz_data_exibir($data)
{
    if (!is_object($data)) {
        return '';
    } else {
        return $data->format('d/m/Y');
    }
}

function traduz_data_banco($data_banco)
{
    if ($data_banco == '') {
        return '';
    }
    
    $objeto_data = DateTime::createFromFormat('d/m/Y', $data_banco);

    return $objeto_data->format('Y-m-d');
}

function traduz_favorito_exibir($favorito)
{
    if ($favorito == 0) {
        return 'Não';
    }

    return 'Sim';
}

function tem_post()
{
    return count($_POST) > 0;    
}

function validar_data($data)
{
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    if ($resultado == 0) {
        return false;
    }

    $dados = explode('/', $data);

    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    return checkdate($mes, $dia, $ano);
}

function validar_email($email)
{
    $padrao = '/^\\S+@\\S+\\.\\S+$/';
    $resultado = preg_match($padrao, $email);
    
    if ($resultado == 0) {
        return false;
    }

    return true;
}

function validar_telefone($telefone)
{
    $padrao = '/^([0-9]{2})[0-9]{5}-[0-9]{4}$/';
    $resultado = preg_match($padrao, $telefone);

    if ($resultado == 0) {
        return false;
    }

    return true;
}

function tratar_anexo($anexo)
{
    $padrao = '/^.+(\.jpg|\.png)$/';
    $resultado = preg_match($padrao, $anexo['name']);

    if ($resultado == 0) {
        return false;
    }

    move_uploaded_file($anexo['tmp_name'], 
                        "anexos/{$anexo['name']}");

    return true;
}