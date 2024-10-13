<?php
// Check if the form was submitted and a username was entered
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['username'])) {
    // Set the username in a cookie for 7 days
    setcookie('username', $_POST['username'], time() + (7 * 24 * 60 * 60), "/");
    $username = $_POST['username'];
} else {
    // If the cookie exists, use its value to fill in the username field
    $username = $_COOKIE['username'] ?? '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remember Username</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Login Form</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" 
                   value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter your username">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
