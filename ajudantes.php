<?php

function traduz_nascimento_banco($data){
    if ($data == '') {
        return null;
    }

    $partes = explode('/', $data);

    if (count($partes) != 3) {
        return $data;
    }

    $data_banco = DateTime::createFromFormat('d/m/Y', $data);
    return $data_banco->format('Y-m-d');
}

function traduz_nascimento_exibir($data)
{
    if ($data == '' || $data == "0000-00-00") {
        return '';
    }

    $partes = explode('-', $data);

    if (count($partes) != 3) {
        return $data;
    }

    $data_exibir = DateTime::createFromFormat('Y-m-d', $data);
    return $data_exibir->format('d/m/Y');
}

function valida_nascimento($nascimento)
{
    $padrao = "/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/";
    $resultado = preg_match($padrao, $nascimento);

    if ($resultado == 0) {
        
        return false;
    }

    $partes = explode('/', $nascimento);

    $dia = $partes[0];
    $mes = $partes[1];
    $ano = $partes[2];

    return checkdate($mes, $dia, $ano);
}

function traduz_favorito($codigo)
{
    if ($codigo) {
        $codigo = 'Sim';
    }else{
        $codigo = 'Não';
    }

    return $codigo;
}

function valida_telefone($telefone)
{
    $padrao = "/^[0-9]{7}-[0-9]{4}$/";
    $resultado = preg_match($padrao, $telefone);

    if ($resultado == 0) {
        return false;
    }

    return true;
}

function valida_email($email)
{
    $padrao = "/^[a-z0-9.]+@[a-z0-9]+\.[a-z]+\.([a-z]+)?$/i";
    $resultado = preg_match($padrao, $email);

    if ($resultado == 0) {
        return false;
    }

    return true;
}

function traduz_descricao_banco($descricao)
{
    if ($descricao == '') {
        return null;
    }
    return $descricao;
}

function tem_post()
{
    return (count($_POST) > 0);
}

function tratar_anexo($anexo)
{
    $padrao = "/^.+(\.jpg|\.jpeg)$/";
    $resultado = preg_match($padrao, $anexo['name']);

    if ($resultado == 0) {
        return false;
    }

    move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");

    return true;
}