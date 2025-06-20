<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

echo "Session destroyed. <br>";
echo "<a href='session_store.php'>Login again</a>";
?>
