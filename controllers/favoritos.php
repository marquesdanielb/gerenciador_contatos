<?php

$exibir_tabela = true;
$exibir_formulario = false;

$lista_contatos = $repositorio_contatos->buscar_contatos_favoritos();

require __DIR__ . "/../views/template.php";