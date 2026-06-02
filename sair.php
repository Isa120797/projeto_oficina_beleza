<?php
//inicia a sessão
session_start();
//ZERANDO AS VARIÁVEIS DE SESSÃO
$_SESSION = [];

//destroi a sessão
session_destroy();

//redireciona para o login
header('Location:login.php');




?>