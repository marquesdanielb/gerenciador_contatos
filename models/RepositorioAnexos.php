<?php

namespace Contatos\Models;

class RepositorioAnexos
{
    function __construct(
        private \PDO $pdo
    ) {}

    public function buscar_anexo(int $id)
    {
        $sql = "SELECT * FROM anexos WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        
        $anexo = $query->fetchObject('Contatos\Models\Contato');

        if (!is_object($anexo)) {
            throw new \Exception("O anexo com o id {$id} não existe.");

        }

        return $anexo;
    }

    public function buscar_anexos(int $contato_id)
    {
        $sql = "SELECT * FROM anexos WHERE contato_id = :contato_id";
	$query = $this->pdo->prepare($sql);
	$query->execute([
		'contato_id' => $contato_id,
	]);

        $anexos = [];

        while ($anexo = $query->fetchObject('Contatos\Models\Contato')) {
            $anexos[] = $anexo;
        }

        return $anexos;
    }

    public function salvar_anexo(Anexo $anexo)
    {
        $sql = "INSERT INTO anexos
                    (contato_id, nome, arquivo)
                VALUES
                    (:contato_id, :nome, :arquivo)";
        
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'contato_id' => $anexo->getContato_id(),
            'nome' => strip_tags($anexo->getNome()),
            'arquivo' => strip_tags($anexo->getArquivo()),
        ]);

    }

    public function remover_anexo(Anexo $anexo)
    {
        $id = $anexo->getId();
        $sql = "DELETE FROM anexos WHERE id = :id";

        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);
    }
}
