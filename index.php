<?php

require_once "config.php";

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM usuarios");
//echo json_encode($usuarios);

// Busca usuário por ID
//$test = new Usuario();
//$test->loadById(3);
//echo $test;

// Retorna todos os usuários do bando de dados
//$list = Usuario::getList();
//echo json_encode($list);

/*
// Retorna lista dos usuários pelo description do BD
$search = Usuario::search("na");
echo json_encode($search);
*/

/*
// Trás o usuário pelo login e senha
$usuario = new Usuario();
$usuario->login("Natalia", "123");
echo ($usuario);
*/

/*
// Insert de novo Usuario
$aluno = new Usuario("Oldtd", "753159");
$aluno->insert();
echo $aluno;
*/

/*
// Faz a alteração do login e senha na tabela usuário
$usuario = new Usuario();
$usuario->loadById(38);
$usuario->update("Lodtt", "654987");
echo $usuario;
*/

// Deleta um usuário da tabela usuarios
$usuario = new Usuario();
$usuario->loadById(37);
$usuario->delete();
echo $usuario;


?>