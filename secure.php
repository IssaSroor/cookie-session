<?php
// Start session to use cookies
session_start();

// Set a secure and HTTP-only cookie
if (!isset($_COOKIE['secureCookie'])) {
    // Set the cookie with secure and httponly flags
    setcookie('secureCookie', 'This is a secure cookie', time() + (7 * 24 * 60 * 60), "/", "", true, true); // Secure and HttpOnly
}

// Retrieve the cookie value
$cookieValue = isset($_COOKIE['secureCookie']) ? $_COOKIE['secureCookie'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Cookie Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Secure Cookie</h2>
    <p>Current Cookie Value: <strong><?php echo htmlspecialchars($cookieValue); ?></strong></p>

    <p id="jsCookieCheck"></p>
</div>

<!-- Try to retrieve the cookie using JavaScript -->
<script>
    // Try to access the secure cookie using JavaScript
    const cookieValue = document.cookie.split('; ').find(row => row.startsWith('secureCookie='));
    const jsMessage = cookieValue ? "The secure cookie can be accessed via JavaScript." : "The secure cookie is HTTP-only and cannot be accessed via JavaScript.";
    document.getElementById('jsCookieCheck').innerText = jsMessage;
</script>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
