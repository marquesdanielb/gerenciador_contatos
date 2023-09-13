<?php

require "config.php";
require "vendor/autoload.php";
require "helpers/banco.php";
require "helpers/ajudantes.php";

$repositorio_contatos = new Contatos\Models\RepositorioContatos($pdo);
$repositorio_anexos = new Contatos\Models\RepositorioAnexos($pdo);

$rota = "contatos";

if (array_key_exists("rota", $_GET)) {
    $rota = (string) $_GET['rota'];
}

if (is_file("controllers/{$rota}.php")) {
    require "controllers/{$rota}.php";
} else {
    echo "Rota não encontrada";
}