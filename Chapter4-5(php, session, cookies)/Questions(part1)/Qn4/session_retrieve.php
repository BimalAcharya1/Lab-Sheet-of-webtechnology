<?php
session_start();

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"])) {
    echo "User ID: " . $_SESSION["user_id"] . "<br>";
    echo "User Name: " . $_SESSION["user_name"] . "<br>";
    echo "<a href='session_destroy.php'>Logout / Destroy session</a>";
} else {
    echo "No session found. Please <a href='session_store.php'>login</a>.";
}
?>
