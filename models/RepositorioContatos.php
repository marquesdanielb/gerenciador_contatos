<?php

namespace Contatos\Models;

class RepositorioContatos
{
    public function __construct(
        private \PDO $pdo
    ) {}

    public function salvar_contato(Contato $contato)
    {
        $data_nascimento = $contato->getData_nascimento();

        if (is_object($data_nascimento)) {
            $data_nascimento = $data_nascimento->format('Y-m-d');
        }

        $sql = "INSERT INTO contatos
                    (nome, telefone, email, descricao, data_nascimento, favorito)
                VALUES
                    (:nome, :telefone, :email, :descricao, :data_nascimento, :favorito)";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'nome' => strip_tags($contato->getNome()),
            'telefone' => strip_tags($contato->getTelefone()),
            'email' => strip_tags($contato->getEmail()),
            'descricao' => strip_tags($contato->getDescricao()),
            'data_nascimento' => $data_nascimento,
            'favorito' => $contato->getFavorito(),
        ]);
    }

    public function buscar(int $contato_id = 0): Contato|array
    {
        if ($contato_id > 0) {
            return $this->buscar_contato($contato_id);
        } else {
            return $this->buscar_contatos();
        }
    }

    private function buscar_contatos(): array
    {
        $sql = "SELECT * FROM contatos";
        $query = $this->pdo->query($sql, \PDO::FETCH_CLASS, 'Contatos\Models\Contato');

        $contatos = [];

        while ($contato = $query->fetchObject('Contatos\Models\Contato')) {
            $contatos[] = $contato;
        }

        return $contatos;
    }

    private function buscar_contato(int $id): Contato
    {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        $contato = $query->fetchObject('Contatos\Models\Contato');

        if (!is_object($contato)) {
            throw new \Exception("Erro! Esse contato com id {$id} não existe.");
            die();
        }

        return $contato;
    }

    public function atualizar_contato(Contato $contato)
    {
        $data_nascimento = $contato->getData_nascimento();

        if (is_object($data_nascimento)) {
            $data_nascimento = $data_nascimento->format('Y-m-d');
        }

        $sql = "UPDATE contatos SET
                    nome = :nome, 
                    telefone = :telefone,
                    email = :email, 
                    descricao = :descricao, 
                    data_nascimento = :data_nascimento, 
                    favorito = :favorito
                WHERE id = :id";
        
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $contato->getId(),
            'nome' => strip_tags($contato->getNome()),
            'telefone' => strip_tags($contato->getTelefone()),
            'email' => strip_tags($contato->getEmail()),
            'descricao' => strip_tags($contato->getDescricao()),
            'data_nascimento' => $data_nascimento,
            'favorito' => $contato->getFavorito(),
        ]);

    }

    public function remover_contato(int $id)
    {
        $sql = "DELETE FROM contatos WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
    }
    
    public function buscar_contatos_favoritos()
    {
        $sql = 'SELECT * FROM contatos WHERE favorito = 1';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $favoritos = [];
        
        while ($favorito = $query->fetchObject('Contatos\Models\Contato')) {
            $favoritos[] = $favorito;
        }

        return $favoritos;

    }
}
