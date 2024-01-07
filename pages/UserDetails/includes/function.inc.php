<?php

function addUserDetails($conn, $firstName, $middleName, $lastName, $phoneNum)
{
    session_start();
    try {
        
        
        $userID = $_SESSION["id"];

                // Update user table
                $updateUserQuery = "UPDATE `user` SET `ufname` = ?, `umname` = ?, `ulname` = ?, `phonenum` = ? WHERE `userid` = ?";
                $stmt = $conn->prepare($updateUserQuery);
                $stmt->bind_param("ssssi", $firstName, $middleName, $lastName, $phoneNum, $userID);
                $stmt->execute();
                $stmt->close();

                // Update session variables with the new user details
                $_SESSION["ufname"] = $firstName;
                $_SESSION["umname"] = $middleName;
                $_SESSION["ulname"] = $lastName;
                $_SESSION["phonenum"] = $phoneNum;

                // Check if the user is associated with a company
                $userCompanyQuery = "SELECT `udcompid` FROM `userdetails` WHERE `uduserid` = ?";
                $stmt = $conn->prepare($userCompanyQuery);
                $stmt->bind_param("i", $userID);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $stmt->close();


                header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?success=update");
                exit();
        
    } catch (Exception $e) {
        // Handle exceptions here (e.g., log the error, redirect to an error page)
        echo "An error occurred: " . $e->getMessage();
    }
}

function editCompanyDetails($conn, $userID, $company) 
{
    $companyId = '';
    $count = '';
    // Step 1: Retrieve compid based on compname
    $getCompanyIdQuery = "SELECT `compid` FROM `company` WHERE `compname` = ?";
    $stmt = $conn->prepare($getCompanyIdQuery);
    $stmt->bind_param("s", $company);
    $stmt->execute();
    $stmt->bind_result($companyId);
    $stmt->fetch();
    $stmt->close();

    // Step 2: Check if the user already has a record in userdetails table
    $checkUserDetailsQuery = "SELECT COUNT(*) FROM `userdetails` WHERE `uduserid` = ?";
    $stmt = $conn->prepare($checkUserDetailsQuery);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // User already has a record, update it
        $updateUserDetailsQuery = "UPDATE `userdetails` SET `udcompid` = ? WHERE `uduserid` = ?";
        $stmt = $conn->prepare($updateUserDetailsQuery);
        $stmt->bind_param("ii", $companyId, $userID);
        $stmt->execute();
        $stmt->close();
    } else {
        // User doesn't have a record, insert a new one
        $insertUserDetailsQuery = "INSERT INTO `userdetails` (`udcompid`, `uduserid`) VALUES (?, ?)";
        $stmt = $conn->prepare($insertUserDetailsQuery);
        $stmt->bind_param("ii", $companyId, $userID);
        $stmt->execute();
        $stmt->close();
    }
}

// Function to insert a new record in userdetails table
function insertUserDetails($conn, $userID, $company)
{
    try {
        $companyID = getCompanyIdByName($conn, $company);

        // Insert new record in userdetails table
        $insertUserDetailsQuery = "INSERT INTO `userdetails` (`uduserid`, `udcompid`) VALUES (?, ?)";
        $stmt = $conn->prepare($insertUserDetailsQuery);
        $stmt->bind_param("ii", $userID, $companyID);
        $stmt->execute();
        $stmt->close();
    } catch (Exception $e) {
        // Handle exceptions here (e.g., log the error, redirect to an error page)
        echo "An error occurred: " . $e->getMessage();
    }
}

function getCompanyIdByName($conn, $companyName)
{
    try {
        $getCompanyIdQuery = "SELECT `compid` FROM `company` WHERE `compname` = ?";
        $stmt = $conn->prepare($getCompanyIdQuery);
        $stmt->bind_param("s", $companyName);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $companyID = $row['compid'];
        $stmt->close();

        return $companyID;
    } catch (Exception $e) {
        // Handle exceptions here (e.g., log the error, redirect to an error page)
        echo "An error occurred: " . $e->getMessage();
        return null;
    }
}
