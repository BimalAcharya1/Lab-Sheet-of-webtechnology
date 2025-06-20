<?php
// Set cookies to expire in 1 hour
setcookie("user_name", "John Doe", time() + 3600, "/");
setcookie("user_id", "101", time() + 3600, "/");

echo "Cookies have been set.<br>";
echo "<a href='cookie_retrieve.php'>Go to retrieve cookies</a>";
?>
