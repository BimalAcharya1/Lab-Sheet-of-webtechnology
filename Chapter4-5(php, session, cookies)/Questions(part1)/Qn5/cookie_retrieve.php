<?php
if (isset($_COOKIE["user_name"]) && isset($_COOKIE["user_id"])) {
    echo "User Name: " . $_COOKIE["user_name"] . "<br>";
    echo "User ID: " . $_COOKIE["user_id"] . "<br>";
    echo "<a href='cookie_destroy.php'>Destroy cookies</a>";
} else {
    echo "Cookies are not set.<br>";
    echo "<a href='cookie_store.php'>Set cookies</a>";
}
?>
