<?php

$action = $_GET['action'] ?? '';
$username = $_GET['username'] ?? '';
$password = $_GET['password'] ?? '';

if ($action === 'store') {
    if ($username && $password) {
        setcookie("username", $username, time() + 3600, "/");
        setcookie("password", $password, time() + 3600, "/");
        echo "Cookies have been set.";
    } else {
        echo "Please provide both username and password in the query string.";
    }
}

elseif ($action === 'retrieve') {
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        echo "Stored Cookie Data:<br>";
        echo "Username: " . $_COOKIE['username'] . "<br>";
        echo "Password: " . $_COOKIE['password'];
    } else {
        echo "No cookies found.";
    }
}

elseif ($action === 'destroy') {
    setcookie("username", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
    echo "Cookies destroyed successfully.";
}

else {
    echo "Specify an action (?action=store, retrieve, or destroy)";
}
?>