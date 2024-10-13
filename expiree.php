<?php
session_start();

// Set session timeout to 5 minutes (300 seconds)
$timeout_duration = 10;

// Check if the last activity time is set in the session
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Calculate the session lifetime
    if ((time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        // If the session has timed out, destroy the session
        session_unset();     // Unset session variables
        session_destroy();   // Destroy the session

        // Redirect to login page with a timeout message
        header("Location: llooggiinn.php?timeout=true");
        exit();
    }
}

// Update the last activity time for the current request
$_SESSION['LAST_ACTIVITY'] = time();

// Check if the user is logged in by verifying session variables
if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    // Redirect to login page if not logged in
    header("Location: llooggiinn.php");
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

<div class="container mt-5">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
    <p>This is a protected page that you can only see after logging in.</p>

    <!-- Add a logout button -->
    <form method="post" action="logout.php">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

</body>
</html>
