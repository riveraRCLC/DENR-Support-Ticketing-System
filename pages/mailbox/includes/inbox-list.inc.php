<?php
///////////////////////////////////////////////////


// i guess i need to start session here


include ("dbh.inc.php" ); 

// also change the sql statement here to where  email add is billy90000 will populate the inbox
// or we can store it there and dont do anything
$sql= "SELECT *  FROM `ticket`" ; 
$result = mysqli_query($conn ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
///////////////////////////////////////////////////
?> 
