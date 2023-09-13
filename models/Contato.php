<?php

namespace Contatos\Models;

class Contato
{
    private $id = 0;
    private $nome = '';
    private $telefone = '';
    private $email = '';
    private $descricao = '';
    private $data_nascimento = null;
    private $favorito = 0;

    public function getId(): string
    {
        return $this->id;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setData_nascimento($data_nascimento)
    {
        if (is_string($data_nascimento) && !empty($data_nascimento)) {
            return $this->data_nascimento = \DateTime::createFromFormat("Y-m-d", $data_nascimento); 
        } elseif ($this->data_nascimento == '') {
            $this->data_nascimento = null;
        }

        $this->data_nascimento = $data_nascimento;
    }

    public function getData_nascimento()
    {
        if (is_string($this->data_nascimento) && !empty($this->data_nascimento)) {
            $this->data_nascimento = \DateTime::createFromFormat("Y-m-d", $this->data_nascimento); 
        } elseif ($this->data_nascimento == "") {
            $this->data_nascimento = null;
        }
        
        return $this->data_nascimento;
    }

    public function setFavorito(int $favorito)
    {
        $this->favorito = $favorito;
    }

    public function getFavorito(): int
    {
        return $this->favorito;
    }
}