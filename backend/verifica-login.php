<?php

session_start();

if (
    !isset($_SESSION['logado']) ||
    $_SESSION['logado'] != "sim"
) {

    header("Location: login.php");
    exit;
}

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");