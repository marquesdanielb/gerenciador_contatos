<?php

try {
    $contato = $repositorio_contatos->buscar($_GET['id']);
} catch (\Exception $e) {
    echo "Não é possível remover o contato com o id {$_GET['id']}" . $e->getMessage();
}

if ($contato->getId() == $_GET['id']) {
    $repositorio_contatos->remover_contato($contato->getId());
}

header('Location: index.php?rota=contatos');
die();
