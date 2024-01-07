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
                

                header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?success=update");
                exit();
        
    } catch (Exception $e) {
        // Handle exceptions here (e.g., log the error, redirect to an error page)
        echo "An error occurred: " . $e->getMessage();
    }
}
function userCompany($conn, $userID, $selectedCompany)
{
    try {
        // Check if the selected company is "You Have No Company"
        if ($selectedCompany !== "You Have No Company") {
            // Find the compid for the selected company
            $compID = findCompanyID($conn, $selectedCompany);

            // Update the user's company in the userdetails table
            editCompanyDetails($conn, $userID, $compID);
            echo "Company details updated successfully.";
        } else {
            // User has no company, handle it as needed
            echo "User has no company";
        }
    } catch (Exception $e) {
        // Handle exceptions here
        echo "An error occurred: " . $e->getMessage();
    }
}

// Function to find the compid for the selected company
function findCompanyID($conn, $selectedCompany)
{
    $query = "SELECT compid FROM company WHERE compname = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $selectedCompany);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row) {
        return $row['compid'];
    } else {
        // Handle the case where the selected company name doesn't exist
        echo "Error: Selected company does not exist.";
        exit(); // or return an appropriate value
    }
}

// Function to update the user's company in the userdetails table
function editCompanyDetails($conn, $userID, $compID)
{
    try {
        // Update userdetails table with the compid
        $updateCompanyQuery = "UPDATE userdetails SET udcompid = ? WHERE uduserid = ?";
        $stmt = $conn->prepare($updateCompanyQuery);
        $stmt->bind_param("ii", $compID, $userID);
        $stmt->execute();
        $stmt->close();
    } catch (Exception $e) {
        // Handle exceptions here
        echo "An error occurred: " . $e->getMessage();
        exit(); // or return an appropriate value
    }
}

// Call userCompany function in UserDetails.inc.php
$userID = $_SESSION["id"];
$selectedCompany = $_POST["company"];
userCompany($conn, $userID, $selectedCompany);


