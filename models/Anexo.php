<?php

namespace Contatos\Models;

class Anexo
{
    private $id = 0;
    private $contato_id = 0;
    private $nome = '';
    private $arquivo = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getContato_id(): string
    {
        return $this->contato_id;
    }

    public function getArquivo(): string
    {
        return $this->arquivo;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setContato_id(string $contato_id)
    {
        $this->contato_id = $contato_id;
    }

    public function setArquivo(string $arquivo)
    {
        $this->arquivo = $arquivo;
    }
}