<?php

include("dbh.inc.php");
session_start();
$userID = $_SESSION["id"];

// Initialize data array
$data = array();

// Fetch udcompid from userdetails
$sql = "SELECT udcompid FROM userdetails WHERE uduserid = '$userID'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Fetch the associative array from the result
    $row = mysqli_fetch_assoc($result);

    // Check if udcompid exists
    if ($row) {
        $udcompid = $row['udcompid'];

        // Fetch compname from company using udcompid
        $sqlCompany = "SELECT compname FROM company WHERE compid = '$udcompid'";
        $resultCompany = mysqli_query($conn, $sqlCompany);

        if ($resultCompany) {
            // Fetch the associative array from the result
            $rowCompany = mysqli_fetch_assoc($resultCompany);

            // Check if compname exists
            if ($rowCompany) {
                $compname = $rowCompany['compname'];

                // Add data to the array
                $data['compname'] = $compname;
            } else {
                // Handle the case where compname is not found
                $data['error'] = "Company name not found";
            }
        } else {
            // Handle the case where the company query fails
            $data['error'] = mysqli_error($conn);
        }
    } else {
        // Handle the case where udcompid is not found
        $data['error'] = "Please Complete Your Details";
    }
} else {
    // Handle the case where the userdetails query fails
    $data['error'] = mysqli_error($conn);
}

// Output the JSON representation of the data
print_r(json_encode($data));

?>