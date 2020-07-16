<?php
require_once("config.php");
// require_once('./Class/Pessoa/Pessoa.php');
/*$teste2 = new Usuario();
$teste2->loadById(10);

echo $teste2;
*/

/*$teste2 = Usuario::getList();
echo json_encode($teste2)
*/

/*$teste2 = Usuario::search("joz");
echo json_encode($teste2);
*/

// $teste2 = new Usuario();

// $teste2->login('joao','123456');
// echo $teste2;

// classe dentro da pasta
// $pedro = new Pessoa();
// $pedro->loadById(14);
// echo $pedro;

//-------------------//
//listando todos os usuarios
//$todos = Pessoa::getlist();
//echo json_encode($todos);

//--------------------
//pesquisa pelo login (search)
// $joze = Pessoa::search("joze");
// echo json_encode($joze);


//--------------------
//pesquisa por login e senha
$pedro = new Pessoa();
$pedro->login("pedro","1234566");
echo $pedro;






?>