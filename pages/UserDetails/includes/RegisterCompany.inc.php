<?php

if (isset($_POST["Register_Company"])) {
    $companyName = $_POST["companyName"];
    $companyAddress = $_POST["companyAddress"];
       
        require_once 'dbh.inc.php';
        require_once 'functionRegister.inc.php';

        registerCompany($conn, $companyName, $companyAddress);
       
       
}else {
    // Show an error message or take appropriate action
    echo '<script>alert("Error: All required fields must be filled in.");</script>';
    header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?fail=update");
}
?>


