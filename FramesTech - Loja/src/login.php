<?php
session_start();

include("../classes/Db.php");
include("../classes/Usuario.php");

$login = $_REQUEST ['cpf'];
$senha = md5($_REQUEST['senha']);

$banco = new Db();
$banco->conectar();
$banco->setTabela("usuarios");

$usuario = new Usuario();
$campos = "senha";
$where = "cpf = '" . $login . "'";
$registro = $usuario->consultar($banco, $campos, $where);

$existe = 0;

foreach($registro as $linha){
    if($senha == $linha["senha"]) $existe = 1;
}

if($existe == 1){
    $_SESSION['login'] = $login;
    $_SESSION['logado'] = true;
    header("location: menu.php");
}
else{
    header("location: ../index.php?erro=1");
}



?>