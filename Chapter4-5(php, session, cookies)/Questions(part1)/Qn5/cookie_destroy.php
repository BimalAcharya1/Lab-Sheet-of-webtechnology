<?php
// Set cookies to expire in the past
setcookie("user_name", "", time() - 3600, "/");
setcookie("user_id", "", time() - 3600, "/");

echo "Cookies have been destroyed.<br>";
echo "<a href='cookie_store.php'>Set again</a>";
?>
