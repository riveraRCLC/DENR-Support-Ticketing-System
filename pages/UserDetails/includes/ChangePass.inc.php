<?php

if (isset($_POST["Change_Password"])) {
    $email = $_POST["inputEmail"];
    $inputCurrentPass = $_POST["inputCurrentPass"];
    $inputNewPass = $_POST["inputNewPass"];
    $confirmNewPass = $_POST["confirmNewPass"];

        require_once 'dbh.inc.php';
        require_once 'functionChangePass.inc.php';

        changePass($conn, $email, $inputCurrentPass, $inputNewPass, $confirmNewPass);
       
       
}else {
    // Show an error message or take appropriate action
    echo '<script>alert("Error: All required fields must be filled in.");</script>';
    header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?fail=update");
}
?>
