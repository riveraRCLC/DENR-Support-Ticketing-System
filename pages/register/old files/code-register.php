<?php
session_start();        
require 'config.php';

if(isset($_POST['register_acct']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $firstName = mysqli_real_escape_string($con,$_POST['firstName']);
    $middleName = mysqli_real_escape_string($con,$_POST['middleName']);
    $lastName = mysqli_real_escape_string($con,$_POST['lastName']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    
    // Check if any of the fields are empty
    if(empty($email) || empty($firstName) || empty($lastName) || empty($password)){
        $_SESSION['message'] = "All fields are required. Please fill in all the fields.";
        header("Location: register.php");
        exit(0);
    }
    
    // Check if the email is already in use
    $check_query = "SELECT * FROM user WHERE uemail = '$email'";
    $check_result = mysqli_query($con, $check_query);
    
    if(mysqli_num_rows($check_result) > 0) {
        $_SESSION['message'] = "Email is already in use. Please choose another email.";
        header("Location: register.php");
        exit(0);
    }
    
   
    
    // If email is not in use, password meets requirements, and all fields are filled, proceed to insert the user
    $query = "INSERT INTO user (uemail, ufname, umname, ulname, upassword) VALUES ('$email','$firstName','$middleName','$lastName' ,'$password')";
    
    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: /DENR-Support-Ticketing-System/pages/register/login.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Student NOT CREATED";
        header("Location: register.php");
        exit(0);
    }
}

// Close the PHP session
session_write_close();
?>
