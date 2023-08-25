<?php

session_start();

//aqui estamos trabalhando na montagem do texto
$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);

$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

//abrindo o aquivo
$arquivo = fopen('arquivo.txt', 'a');
//escrevendo o texto
fwrite($arquivo, $texto);
//fechando o arquivo
fclose($arquivo);
//logo apos o registro de chamada a pagina de abrir chamados é mostrada para o usuario
header('Location: abrir_chamado.php');
?>