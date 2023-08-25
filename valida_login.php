<?php

/*esse session start significa que a partir dele o codigo tem uma sessão por navegador, com isso conseguimos manipular paginas de acordo com a instancia do navegador por cliente, por exemplo, eu faço login no navegador chrome em um pc, logo, as paginas após o meu login serão instanciadas naquele pc caso o login for correto, mas essa intancia tem um tempo de duração padrao de 3 horas... dá pra fazer muitas coisas com o session para controlar a segurança de nossas paginas web. */

session_start();


/*atraves do metodo GET é possivel recuperar os dados através de uma requisição http, o problema disso é que esses dados ficam expostos na url do navegador. Para encapusular esses dados, usamos outro metodo de requisição chamado POST. OBS: os atributos do formulario precisam ter name, no caso, as tags que ficam dentro da tag form, como inputs, precisam ter o atributo name, assim esse atributo será um elemento da array do GET OU POST e assim podemos acessa-las separadamente*/

//print_r($_GET);

//echo '<br/>';

/*aqui estou mostrando os dados de cada atributo do formulario de login separadamente, mas poderia ser de outros tipos de forumalario com mais parametros*/

//echo $_GET['email'];
//echo '<br/>';
//echo $_GET['senha'];

/*para usar o metodo post em um elemento html, tem que usar o atributo method diretamente na tag html onde esta ou estao os atributo(s) por exemplo na tag form*/

/*as informações serão recuperadas da mesma forma, mas a diferença principal é que os atributos não serão mais visto na url do navegador, assim dando maior privacidade das informações. */

//print_r($_POST);

//echo '<br/>';

//echo $_POST['email'];
//echo '<br/>';
//echo $_POST['senha'];

/* a partir aqui vou começar a fazer a autenticação dos dados recebidos do front com os dados do back, como ainda nao estou usando um banco de dados, toda a logica da comparação sera escrita em hard code, mas nao se preocupe, eu tennho um conhecimento previo de banco de dados, ja mexi com sql server e sei os principais comando sql.*/

//variavel que verifica se autenticação foi realizada
//a variavel é falsa porque, ela só será true caso entre na condição verdadeira do if
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 => 'administrador', 2 => 'usuario');

/*aqui fiz um array que contém outros arrays dentro, como se fosse usuarios diferentes com seus respectivos atributos*/
$usuarios_app = array(
    array('id' => 1, 'email' => 'kerven.adm@gmail.com', 'senha' => '123456', 'perfil_id' => 1),
    array('id' => 2, 'email' => 'jessicasilva@gmail.com', 'senha' => '123456', 'perfil_id' => 2),
    array('id' => 3, 'email' => 'lucasmatheus@gmail.com', 'senha' => '123456', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'marceloaugusto@gmail.com', 'senha' => '123456', 'perfil_id' => 2),
    array('id' => 5, 'email' => 'heraldoferreira@gmail.com', 'senha' => '123456', 'perfil_id' => 2),
);


/*esse for each está sendo usado aqui para que eu possa pecorrer cada indicice do array usuarios_app, assim consigo manipular as arrays que estão dentro dele, com isso estou fazendo a comparação com os dados que ja estão salvos na array com a requisição http post, caso for verdadeira, eu tomo uma decisão usando uma variavel auxiliar para isso */

foreach ($usuarios_app as $user) {

    if ($user['email'] === $_POST['email'] && $user['senha'] === $_POST['senha']) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

/*em seguida é feita a verificação se a variavel foi alterada para true, caso se for, o bloco de codigo será executado, caso nao for, o bloco do else será executado*/

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
} else {
    //o header é um metodo nativo do php que, transfere o usuario para a pagina que está dentro do comando Location, no caso, para a pagina index.php e em seguida a ? serve como o metodo GET, mostrando tudo como após a interrogação como parametro de erro na url do navegador
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
}

?>