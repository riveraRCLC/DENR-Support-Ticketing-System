<?php
function registerCompany($conn, $companyName, $companyAddress)
{
    try {
        // Check if the company already exists
        $checkCompanyQuery = "SELECT compid FROM company WHERE compname = ?";
        $stmt = $conn->prepare($checkCompanyQuery);
        $stmt->bind_param("s", $companyName);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            // Company already exists, handle it as needed (e.g., show an error message)
            echo "Error: Company already exists.";
            exit(); // or return an appropriate value
        } else {
            // Insert the new company into the database
            $insertCompanyQuery = "INSERT INTO company (compname, compadd) VALUES (?, ?)";
            $stmt = $conn->prepare($insertCompanyQuery);
            $stmt->bind_param("ss", $companyName, $companyAddress);
            $stmt->execute();
            $stmt->close();

            // Handle the successful insertion (e.g., show a success message)
            echo "Company registered successfully.";
            header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?success=registerCompany");
        }
    } catch (Exception $e) {
        // Handle exceptions here
        echo "An error occurred: " . $e->getMessage();
        exit(); // or return an appropriate value
    }
}



// Call registerCompany function
$companyName = $_POST["companyName"];
$companyAddress = $_POST["companyAddress"];
registerCompany($conn, $companyName, $companyAddress);