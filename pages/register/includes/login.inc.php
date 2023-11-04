<?php

if (isset($_POST["login_acct"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputLogin($email, $password) !== false){
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $password);

}else{
    header("Location: /DENR-Support-Ticketing-System/pages/register/login.php");
    exit();
}