<?php
include("../classes/Db.php");
include("../classes/Usuario.php");

$banco = new Db();
$banco->conectar();
$banco->setTabela("usuarios");

$usuario = new Usuario();

$pagina = file_get_contents("../html/index.html");

if (!isset($_REQUEST['operacao'])){
    $pagina = str_replace("#mensagem", "", $pagina);
}

//no lugar de bsubmit coloque o nome do seu botão
if (isset($_REQUEST['enviar'])){
    $usuario->setCpf($_REQUEST['cpf']);
    $usuario->setNome($_REQUEST['nome']);
    $usuario->setCelular($_REQUEST['celular']);
    $usuario->setEmail($_REQUEST['email']);
    $usuario->setLogin($_REQUEST['login']);
    $usuario->setSenha(md5($_REQUEST['senha']));
    $usuario->gravar($banco);
    $pagina = str_replace("#mensagem", "Dados Salvos!", $pagina);
}

$menu = file_get_contents("../index.php");
$pagina = str_replace("#conteudo", $pagina, $menu);
echo $pagina;

?>