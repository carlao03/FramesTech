<?php
session_start();
$fezLogin = false;

if(isset($_SESSION['logado'])){
    if($_SESSION['logado'] == true){
        $fezLogin = true;
    }
}
if($fezLogin == false){
    header("Location: ../index.php");
}

$menu = file_get_contents("../html/index.html");

$menu = str_replace("#conteudo", "", $menu);
echo $menu;
?>