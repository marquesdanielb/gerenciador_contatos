<?php 

$tem_erros = false;
$erros_validacao = [];

try {
    $contato = $repositorio_contatos->buscar($_GET['id']);
} catch (Exception $e) {
    echo "Esse contato com o id {$_GET['id']} não existe" . $e->getMessage();
}


if (tem_post()) {
    $contato_id = $contato->getId();

    if (!array_key_exists('anexo', $_FILES)) {
        $tem_erros = true;
        $erros_validacao['anexo'] = 'Você deve selecionar um arquivo para anexar';
    } else {
        if (tratar_anexo($_FILES['anexo'])) {
            $anexo = new Contatos\Models\Anexo();
            $nome = $_FILES['anexo']['name'];
            $anexo->setContato_id($contato_id);
            $anexo->setNome(substr($nome, 0, -4));
            $anexo->setArquivo($nome);
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie anexos nos formatos jpg ou png';
        }
    }

    if (!$tem_erros) {
        $repositorio_anexos->salvar_anexo($anexo);
        header('Location: index.php?rota=contato&id=' . $anexo->getContato_id());
        die();
    }
}

$anexos = $repositorio_anexos->buscar_anexos($contato->getId());

require __DIR__ . "/../views/template_contato.php";