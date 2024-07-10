<?php
 include("classes/Db.php");
 include("classes/Usuario.php");

 $telaLogin = file_get_contents("html/login.html");

$mensagem = "";
if(isset($_REQUEST['erro']))
{
  $mensagem = "Erro no login, tente novamente!";
}
$telaLogin = str_replace("#mensagem", 
                           $mensagem, 
                          $telaLogin);
 echo $telaLogin;

?>