<?php

$hostname = '127.0.0.1';
$username = 'contatosadmin';
$password = 'root';
$database = 'contatos';

$conexao = mysqli_connect($hostname, $username, $password, $database);

function listar_contatos($conexao)
{
    $sqlQuery = "SELECT * FROM contatos";

    $resultado = mysqli_query($conexao, $sqlQuery);

    $contatos = [];

    while ($contato = mysqli_fetch_assoc($resultado)) {
        $contatos[] = $contato;
    }

    return $contatos;
}

function gravar_contatos($conexao, $contato)
{
    if($contato['nascimento'] == ''){
        $nascimento = null;
    }else{
        $nascimento = "'{$contato['nascimento']}'";
    }

    $sqlQuery = "INSERT INTO contatos
                (nome, telefone, email, descricao, nascimento, favorito)
                VALUES
                (
                    '{$contato['nome']}',
                    '{$contato['telefone']}',
                    '{$contato['email']}',
                    '{$contato['descricao']}',
                    {$nascimento},
                    {$contato['favorito']}
                )
            ";
    var_dump($sqlQuery);
    mysqli_query($conexao, $sqlQuery);
}

function buscar_contato($conexao, $id)
{
    $sqlQuery = "SELECT * FROM contatos WHERE id=".$id;
    $resultado = mysqli_query($conexao, $sqlQuery);

        return mysqli_fetch_assoc($resultado);
}

function editar_contato($conexao, $contato)
{
    if($contato['favorito'] == ''){
        $favorito = 0;
    }else{
        $favorito = 1;
    }

    $sqlQuery = "UPDATE contatos SET
                    nome = '{$contato['nome']}',
                    telefone = '{$contato['telefone']}',
                    email = '{$contato['email']}',
                    descricao = '{$contato['descricao']}',
                    nascimento = '{$contato['nascimento']}',
                    favorito = $favorito
                WHERE id = {$contato['id']}
                ";

    mysqli_query($conexao, $sqlQuery);
}

function remover_contato($conexao, $id)
{
    $sqlQuery = "DELETE FROM contatos WHERE id =".$id;

    mysqli_query($conexao, $sqlQuery);
}
