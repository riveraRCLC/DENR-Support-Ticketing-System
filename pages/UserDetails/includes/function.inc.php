<?php


function addUserDetails($conn, $firstName, $middleName, $lastName, $phoneNum, $company)
{
    session_start();
    $userID = $_SESSION["id"];

    // Update user table
    $updateUserQuery = "UPDATE `user` SET `ufname` = ?, `umname` = ?, `ulname` = ?, `phonenum` = ? WHERE `userid` = ?";
    $stmt = $conn->prepare($updateUserQuery);
    $stmt->bind_param("ssssi", $firstName, $middleName, $lastName, $phoneNum, $userID);
    $stmt->execute();
    $stmt->close();

    // Retrieve company ID based on company name
    $companyID = getCompanyIdByName($conn, $company);

    // Update userdetails table
    $updateUserDetailsQuery = "UPDATE `userdetails` SET `udcompid` = ? WHERE `uduserid` = ?";
    $stmt = $conn->prepare($updateUserDetailsQuery);
    $stmt->bind_param("ii", $companyID, $userID);
    $stmt->execute();
    $stmt->close();

    header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?success=update");
    exit();
}


function getCompanyIdByName($conn, $companyName)
{
    $getCompanyIdQuery = "SELECT `compid` FROM `company` WHERE `compname` = ?";
    $stmt = $conn->prepare($getCompanyIdQuery);
    $stmt->bind_param("s", $companyName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $companyID = $row['compid'];
    $stmt->close();

    return $companyID;
}
