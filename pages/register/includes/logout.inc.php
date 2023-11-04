<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
header("Location: /DENR-Support-Ticketing-System/index.php");
?>