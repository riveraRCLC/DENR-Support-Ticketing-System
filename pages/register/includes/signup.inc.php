<?php

if(isset($_POST["register_acct"])){
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["passwordConfirm"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

if(emptyInputSignup($email, $firstName, $middleName, $lastName, $password, $pwdRepeat) !== false){
    header("Location: /DENR-Support-Ticketing-System/pages/register/register.php?error=emptyinput");
    exit();
}
if(invalidEmail($email) !== false){
    header("Location: /DENR-Support-Ticketing-System/pages/register/register.php?error=invalidEmail");
    exit();
}
if(pwdMatch($password, $pwdRepeat) !== false){
    header("Location: /DENR-Support-Ticketing-System/pages/register/register.php?error=passwordDontMatch");
    exit();
}
if(emailExist($conn, $email) !== false){
    header("Location: /DENR-Support-Ticketing-System/pages/register/register.php?error=usernameTaken");
    exit();
}

createUser($conn, $email, $firstName, $middleName, $lastName, $password);


}else{
    header("Location: /DENR-Support-Ticketing-System/pages/register/forgotpass.php");
    exit();
}