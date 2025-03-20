<?php
// Start the session (required to access session variables)
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Destroy the session
session_destroy();

// Clear any other cookies that might be set (like remember_username)
if (isset($_COOKIE['remember_username'])) {
    setcookie('remember_username', '', time() - 3600, '/');
}

// Redirect to login page with success message
header("Location: login.php?success=You have been successfully logged out");
exit();
?>