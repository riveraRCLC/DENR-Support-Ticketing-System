<?php

if(isset($_POST["save_changes"])){
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $phoneNum = $_POST["phoneNum"];
    $company = $_POST["company"];


    require_once 'dbh.inc.php';
    require_once 'function.inc.php';


addUserDetails($conn, $firstName, $middleName, $lastName, $phoneNum, $company);


}