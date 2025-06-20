<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h2>
<p>This is a protected dashboard.</p>
<a href="logout.php">Logout</a>
</body>
</html>
