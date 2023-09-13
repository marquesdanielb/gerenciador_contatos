<?php

try {
    $anexo = $repositorio_anexos->buscar_anexo($_GET['id']);
} catch (\Exception $e) {
    echo "O anexo com o id {$_GET['id']} não existe" . $e->getMessage(); 
}

if ($anexo->getId() == $_GET['id']) {
    $repositorio_anexos->remover_anexo($anexo);
    unlink('anexos/' . $anexo->getArquivo());
}

header('Location: index.php?rota=contato&id=' . $anexo->getContato_id());
die();

require __DIR__ . "template_contato.php";