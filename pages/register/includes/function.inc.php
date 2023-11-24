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

   // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                                                                      //$hashedPwd   
    mysqli_stmt_bind_param($stmt, "sssss", $email, $firstName, $middleName, $lastName, $password);
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
    session_start();
    $message = "";
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE uemail='" . $email . "' and upassword = '" . $password . "'");
    $row = mysqli_fetch_array($result);
    
    if (is_array($row)) {
        $_SESSION["id"] = $row['userid'];
        $_SESSION["email"] = $row['uemail'];
        header("Location: /DENR-Support-Ticketing-System/pages/Dashboard/dashboard.php");
        exit();
    } else {
        $message = "Invalid Username or Password!";
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php?error=wrongLoginWrongPassword");
        exit();
    }
}
