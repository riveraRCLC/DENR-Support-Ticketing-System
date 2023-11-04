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
    if(!mysqli_stmt_prepare($stmt,$sql)){
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
    $sql = "INSERT INTO user (uemail, ufname, umname, ulname, upassword) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){

        header("Location: /DENR-Support-Ticketing-System/pages/register/register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $email, $firstName, $middleName, $lastName, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
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

function loginUser($conn,$email, $password){
    $emailExist = emailExist($conn, $email);

    if($emailExist === false){
        echo "User doesn't exist";
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=UserDoesn'tExist");
        exit();
    }

     $pwdHashed = $emailExist["upassword"];
    echo "Password Hash: " . $pwdHashed; // Add this line
    $checkPwd = password_verify($password, $pwdHashed);
    echo "Password Verify Result: " . ($checkPwd ? "true" : "false"); // Add this line
    
    
    if ($checkPwd === false){
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=wrongloginWrongPassword");
        
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["userID"]= $emailExist["userid"];
        $_SESSION["uemaIL"]= $emailExist["uemail"];
        header("Location: /DENR-Support-Ticketing-System/pages/Dashboard/dashboard.php");
        exit();
    }
}
