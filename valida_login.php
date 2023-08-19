<?php
    /*atraves do metodo GET é possivel recuperar os dados através de uma requisição http, o problema disso é que esses dados ficam expostos na url do navegador. Para encapusular esses dados, usamos outro metodo de requisição chamado POST. OBS: os atributos do formulario precisam ter name, no caso, as tags que ficam dentro da tag form, como inputs, precisam ter o atributo name, assim esse atributo será um elemento da array do GET OU POST e assim podemos acessa-las separadamente*/

    //print_r($_GET);

    //echo '<br/>';

    /*aqui estou mostrando os dados de cada atributo do formulario de login separadamente, mas poderia ser de outros tipos de forumalario com mais parametros*/ 

    //echo $_GET['email'];
    //echo '<br/>';
    //echo $_GET['senha'];

    /*para usar o metodo post em um elemento html, tem que usar o atributo method diretamente na tag html onde esta ou estao os atributo(s) por exemplo na tag form*/

    /*as informações serão recuperadas da mesma forma, mas a diferença principal é que os atributos não serão mais visto na url do navegador, assim dando maior privacidade das informações. */

    print_r($_POST);

    echo '<br/>';

    echo $_POST['email'];
    echo '<br/>';
    echo $_POST['senha'];

?>