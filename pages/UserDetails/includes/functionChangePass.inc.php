<?php

function changePass($conn, $email, $currentPass, $newPass, $confirmNewPass)
{
    // Validate inputs
    if (empty($email) || empty($currentPass) || empty($newPass) || empty($confirmNewPass)) {
        // Handle validation errors or return an error message
        echo '<script>alert("Error: All fields must be filled in.");</script>';
        header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?fail=update");
        exit();
    }

    // Fetch user information based on the provided email
    $sql = "SELECT * FROM user_auth WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Handle SQL statement preparation error
        echo '<script>alert("Error: SQL statement preparation failed.");</script>';
        header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?fail=update");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (!$row = mysqli_fetch_assoc($result)) {
        // Handle user not found error
        echo '<script>alert("Error: User not found.");</script>';
        header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?fail=update");
        exit();
    }

    // Verify current password
    $passwordCheck = password_verify($currentPass, $row['password']);

    if (!$passwordCheck) {
        // Handle incorrect current password error
        echo '<script>alert("Error: Incorrect current password.");</script>';
        header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?fail=update");
        exit();
    }

    // Update user's password
    $hashedNewPass = password_hash($newPass, PASSWORD_DEFAULT);
    $updateSql = "UPDATE user_auth SET password = ? WHERE username = ?;";
    $updateStmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($updateStmt, $updateSql)) {
        // Handle SQL statement preparation error for the update
        echo '<script>alert("Error: SQL statement preparation for update failed.");</script>';
        header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?fail=update");
        exit();
    }

    mysqli_stmt_bind_param($updateStmt, "ss", $hashedNewPass, $email);
    mysqli_stmt_execute($updateStmt);

    // Handle successful password update (redirect to a success page or display a success message)
    echo '<script>alert("Password updated successfully.");</script>';
    header("Location: /DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php?success=update");
    exit();
}

?>