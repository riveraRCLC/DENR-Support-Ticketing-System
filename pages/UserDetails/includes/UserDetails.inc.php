<?php

if(isset($_POST["save_changes"])){
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $company = $_POST["company"];


    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

if(emptyInputSignup($firstName, $middleName, $lastName, $company) !== false){
    header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?error=emptyinput");
    exit();
}

addUserDetails($conn, $firstName, $middleName, $lastName, $company);


}else{
    header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?error=UNEXPECTED");
    exit();
}