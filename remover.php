<?php

session_start();

require "banco.php";

remover_contato($conexao, $_GET['id']);
header('Location: contatos.php');
die();