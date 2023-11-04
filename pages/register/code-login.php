<?php
session_start();
include "config.php";

// Update session timeout value in seconds
ini_set('session.gc_maxlifetime', $session_timeout);

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        $_SESSION['message'] = "Email is Required";
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=Email is Required");
        exit();
    } else if (empty($password)) {
        $_SESSION['message'] = "Password is Required";
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=Password is Required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE uemail='$email' AND upassword='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // User found in the database, perform login actions here
            $user = mysqli_fetch_assoc($result);

            // Store user information in a session variable
            $_SESSION['user_id'] = $user['uid'];
            $_SESSION['user_email'] = $user['uemail'];
            
            // Insert a new row into the session table
            $sql = "INSERT INTO user_sessions (session_id, user_id) VALUES (?, ?)";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ss", session_id(), $user['uid']);
            mysqli_stmt_execute($stmt);

            header("Location: /DENR-Support-Ticketing-System/pages/Dashboard/dashboard.php");
        } else {
            // User not found, display an error message and redirect
            $_SESSION['message'] = "Incorrect User or Password!";
            header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=Invalid Email or Password");
            exit();
        }
    }
} else {
    // Check if the user is already logged in
    if (isset($_SESSION['user_id'])) {
        // The user is logged in, you can redirect them to the dashboard or other protected pages.
        header("Location: /DENR-Support-Ticketing-System/pages/Dashboard/dashboard.php");
        exit();
    } else {
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php");
        exit();
    }
}
?>