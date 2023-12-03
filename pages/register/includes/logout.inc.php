<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);
unset($_SESSION["ufname"]);
unset($_SESSION["umname"]);
unset($_SESSION["ulname"]);
unset($_SESSION["phonenum"]);
header("Location: /DENR-Support-Ticketing-System/index.php");
?>