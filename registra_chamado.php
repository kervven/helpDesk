<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

//aqui estamos trabalhando na montagem do texto
$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);

$texto = $titulo . ' # ' . $categoria . ' # ' . $descricao;

//abrindo o aquivo
$arquivo = fopen('arquivo.txt', 'a');
//escrevendo o texto
fwrite($arquivo, "\n" . $texto);
//fechando o arquivo
fclose($arquivo);
//logo apos o registro de chamada a pagina de abrir chamados é mostrada para o usuario
header('Location: abrir_chamado.php');
?>