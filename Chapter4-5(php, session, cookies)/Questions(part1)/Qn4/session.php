<?php

session_start();

$action = $_GET['action'] ?? '';
$username = $_GET['username'] ?? '';
$password = $_GET['password'] ?? '';

if ($action === 'store') {
    if ($username && $password) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo "Session data stored";
    } else {
        echo "Please provide both username and password in the query string.";
    }
}

elseif ($action === 'retrieve') {
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        echo "Stored Session Data:<br>";
        echo "Username: " . $_SESSION['username'] . "<br>";
        echo "Password: " . $_SESSION['password'];
    } else {
        echo "No session data found.";
    }
}

elseif ($action === 'destroy') {
    session_unset();
    session_destroy();
    echo "Session destroyed successfully.";
}

else {
    echo "Specify an action (?action=store, retrieve, or destroy)";
}
?>