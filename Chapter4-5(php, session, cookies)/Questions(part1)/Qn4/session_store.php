
<?php
session_start();



// Simulate user login info
$_SESSION["user_id"] = 101;
$_SESSION["user_name"] = "John Doe"; 

echo "Session data stored successfully.<br>";
echo "<a href='session_retrieve.php'>Go to retrieve session</a>";
?>

 // for random access 
$_SESSION["user_id"] = $id;
$_SESSION["user_name"] = $name; //