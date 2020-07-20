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
// $pedro = new Pessoa();
// $pedro->login("pedro","123456");
// echo $pedro;

//-------------
// insert
// $aluno= new Usuario();
// $aluno->setDeslogin("silvana");
// $aluno->setDessenha("051430");
// $aluno->insert();
// echo $aluno;

// utilizando o update;

// $teste2 = new Pessoa();
// $teste2->loadById(10);
// $teste2->update("Teste3", "12345");
// echo $teste2;

// utilizando o DELETE

$teste2 = new Pessoa();
$teste2->loadById(10);
$teste2->delete();
echo $teste2;







?>