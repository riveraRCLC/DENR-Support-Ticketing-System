<?php

if (isset($_POST["save_changes"])) {
    session_start();
    $userID = $_SESSION["id"];
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $phoneNum = $_POST["phoneNum"];
    $company = $_POST["company"];
    
    // Check if all required fields are not empty, excluding the company field
    if (!empty($firstName) && !empty($middleName) && !empty($lastName) && !empty($phoneNum)) {
        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        addUserDetails($conn, $firstName, $middleName, $lastName, $phoneNum);
        userCompany($conn, $userID, $company);
       
    } else {
        // Show an error message or take appropriate action
        echo '<script>alert("Error: All required fields must be filled in.");</script>';
        header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?fail=update");
    }
}
?>