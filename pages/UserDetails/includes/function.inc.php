<?php

function emptyInputSignup($firstName, $middleName, $lastName, $company){
    $result;
    if (empty($firstName) || empty($middleName) || empty($lastName) || empty($company)){
        $result = true;     
    }else{
        $result = false;
    }
    return $result;
}

function addUserDetails($conn, $firstName, $middleName, $lastName, $company){
    $result;
    if (empty($firstName) || empty($middleName) || empty($lastName) || empty($company)){
        $result = true;     
    }else{
        $result = false;
    }
    return $result;
}

