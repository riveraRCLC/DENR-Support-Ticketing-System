<?php

function addUserDetails($conn, $firstName, $middleName, $lastName, $phoneNum, $company)
{
    try {
        session_start();
        $userID = $_SESSION["id"];

        // Update user table
        $updateUserQuery = "UPDATE `user` SET `ufname` = ?, `umname` = ?, `ulname` = ?, `phonenum` = ? WHERE `userid` = ?";
        $stmt = $conn->prepare($updateUserQuery);
        $stmt->bind_param("ssssi", $firstName, $middleName, $lastName, $phoneNum, $userID);
        $stmt->execute();
        $stmt->close();

        // Check if the user is associated with a company
        $userCompanyQuery = "SELECT `udcompid` FROM `userdetails` WHERE `uduserid` = ?";
        $stmt = $conn->prepare($userCompanyQuery);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row['udcompid'] === null) {
            // User is not associated with any company, insert a new record
            insertUserDetails($conn, $userID, $company);
        } else {
            // User is associated with a company, update the record
            $companyID = getCompanyIdByName($conn, $company);

            if ($companyID !== null) {
                // Company exists, update userdetails table
                $updateUserDetailsQuery = "UPDATE `userdetails` SET `udcompid` = ? WHERE `uduserid` = ?";
                $stmt = $conn->prepare($updateUserDetailsQuery);
                $stmt->bind_param("ii", $companyID, $userID);
                $stmt->execute();
                $stmt->close();
            } else {
                // Company doesn't exist, handle this case (e.g., insert the company first or show an error)
                // You may want to implement a function to insert a new company
                // insertNewCompany($conn, $company);
            }
        }

        header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?success=update");
        exit();
    } catch (Exception $e) {
        // Handle exceptions here (e.g., log the error, redirect to an error page)
        echo "An error occurred: " . $e->getMessage();
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
