<?php

function emptyInputSignup($email, $firstName, $middleName, $lastName, $password, $pwdRepeat){
    $result;
    if (empty($email) || empty($firstName) || empty($middleName) || empty($lastName) || empty($password) || empty($pwdRepeat)){
        $result = true;     
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;     
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $pwdRepeat){
    $result;
    if ($password !== $pwdRepeat){
        $result = true;     
    }else{
        $result = false;
    }
    return $result;
}

function emailExist($conn, $email){
    $sql = "SELECT * FROM user WHERE uemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: /DENR-Support-Ticketing-System/pages/register/register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $firstName, $middleName, $lastName, $password){
    $sqlUser = "INSERT INTO user (uemail, ufname, umname, ulname) VALUES (?, ?, ?, ?);";
    $stmtUser = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtUser, $sqlUser)){
        header("Location: /DENR-Support-Ticketing-System/pages/register/register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmtUser, "ssss", $email, $firstName, $middleName, $lastName);
    mysqli_stmt_execute($stmtUser);
    mysqli_stmt_close($stmtUser);

    // Get the user ID from the inserted user record
    $userId = mysqli_insert_id($conn);

    // Create a user_auth record
    $sqlAuth = "INSERT INTO user_auth (userid, username, password, role) VALUES (?, ?, ?, ?);";
    $stmtAuth = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtAuth, $sqlAuth)){
        header("Location: /DENR-Support-Ticketing-System/pages/register/register.php?error=stmtfailed");
        exit();
    }

    // For simplicity, I'll use the email as the username and assume a default role like 'user'
    $role = 'Guest';

    // Hash and salt the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmtAuth, "isss", $userId, $email, $hashedPassword, $role);
    mysqli_stmt_execute($stmtAuth);
    mysqli_stmt_close($stmtAuth);

    header("Location: /DENR-Support-Ticketing-System/pages/register/login.php");
    exit();
}

function emptyInputLogin($email, $password){
    $result;
    if (empty($email) ||empty($password)){
        $result = true;     
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $password){
    session_start();
    $message = "";

    // Find the user by email in the user table
    $sqlUser = "SELECT * FROM user WHERE uemail = ?;";
    $stmtUser = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtUser, $sqlUser)){
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmtUser, "s", $email);
    mysqli_stmt_execute($stmtUser);

    $resultUser = mysqli_stmt_get_result($stmtUser);

    if($rowUser = mysqli_fetch_assoc($resultUser)){
        // If the user is found, check the password in the user_auth table
        $sqlAuth = "SELECT * FROM user_auth WHERE userid = ?;";
        $stmtAuth = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmtAuth, $sqlAuth)){
            header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmtAuth, "i", $rowUser['userid']);
        mysqli_stmt_execute($stmtAuth);

        $resultAuth = mysqli_stmt_get_result($stmtAuth);

        if($rowAuth = mysqli_fetch_assoc($resultAuth)){
            // Verify the password
            $passwordCheck = password_verify($password, $rowAuth['password']);
            if($passwordCheck){
                $_SESSION["id"] = $rowUser['userid'];
                $_SESSION["email"] = $rowUser['uemail'];
                header("Location: /DENR-Support-Ticketing-System/pages/Dashboard/dashboard.php");
                exit();
            } else {
                $message = "Invalid Username or Password!";
                header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=wrongLoginWrongPassword");
                exit();
            }
        } else {
            $message = "Invalid Username or Password!";
            header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=wrongLoginWrongPassword");
            exit();
        }

        mysqli_stmt_close($stmtAuth);
    } else {
        $message = "Invalid Username or Password!";
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=wrongLoginWrongPassword");
        exit();
    }

    mysqli_stmt_close($stmtUser);
}