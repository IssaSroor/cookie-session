<?php
// Set a cookie with a 1-minute expiration
if (!isset($_COOKIE['testCookie'])) {
    setcookie('testCookie', 'This is a test cookie', time() + 60, "/"); // Expires in 60 seconds
    $message = "Cookie 'testCookie' has been set! It will expire in 1 minute.";
} else {
    $message = "Cookie 'testCookie' value: " . $_COOKIE['testCookie'];
}

// If the cookie has expired, show a different message
if (!isset($_COOKIE['testCookie']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $message = "The cookie has expired.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Expiry Experiment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Cookie Expiry Experiment</h2>
    <p><?php echo $message; ?></p>

    <p>Refresh the page to see the cookie value or observe what happens after 1 minute.</p>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
