<?php

if (isset($_POST["Register_Company"])) {
    $companyName = $_POST["companyName"];
    $companyAddress = $_POST["companyAddress"];
       
        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        registerCompany($conn, $companyName, $companyAddress);
       
       
}
?>