<?php

include ("dbh.inc.php" ); 

$sql= "SELECT tbody, tsub, tdate FROM Ticket WHERE tuserid = 'User 2'"; 
$result = mysqli_query($conn ,  $sql); 

$data = mysqli_fetch_assoc($result); // Fetch a single row
print_r(json_encode($data));

?> 

