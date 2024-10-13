<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "You are not logged in!";
    exit();
}

// Validate the session: Check if IP address or user agent has changed
if ($_SESSION['ip_address'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
    // Destroy the session and log the user out
    session_unset();
    session_destroy();
    echo "Session validation failed. You have been logged out for security reasons.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Page</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>This is a protected page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
