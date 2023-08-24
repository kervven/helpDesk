<?php
//aqui o session start foi iniciado para podermos ter acesso às variaveis de sessão da instancia, e dai podemos usar alguns metodos de manipulação de array ja que as variaveis de sessão são arrays
session_start();

//a partir daqui toda variavel de sessão é destruida e com isso toda instancia é destruida também. Em seguida é feito o direcionamento para a pagina index.php, forçando o usuario a fazer o login novamente.
session_destroy();
header('Location: index.php');

?>