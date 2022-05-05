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
        $nascimento = 'NULL';
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
                    '{$contato['nascimento']}',
                    '{$contato['favorito']}'
                )
            ";

    mysqli_query($conexao, $sqlQuery);


}