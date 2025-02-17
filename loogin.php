<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sample hardcoded credentials (replace with actual validation)
    $valid_username = "user";
    $valid_password = "password";
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        // Store user details in session for security checks
        $_SESSION['username'] = $username;
        $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR']; // Store user's IP address
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT']; // Store user's user agent

        // Redirect to protected page
        header("Location: protect.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Login</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
