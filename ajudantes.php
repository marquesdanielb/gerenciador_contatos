<?php

function traduz_nascimento_banco($data){
    if ($data == '') {
        return null;
    }

    $data_banco = DateTime::createFromFormat('d/m/Y', $data);
    return $data_banco->format('Y-m-d');
}

function traduz_nascimento_exibir($data)
{
    if ($data == '') {
        return null;
    }

    $data_exibir = DateTime::createFromFormat('Y-m-d', $data);
    return $data_exibir->format('d/m/Y');
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

function traduz_telefone_banco($telefone)
{
    if ($telefone == '') {
        return null;
    }
    return $telefone;
}

function traduz_email_banco($email)
{
    if ($email == '') {
        return null;
    }
    return $email;
}

function traduz_descricao_banco($descricao)
{
    if ($descricao == '') {
        return null;
    }
    return $descricao;
}