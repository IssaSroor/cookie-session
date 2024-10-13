<?php
// Start session to use cookies
session_start();

// Set a cookie for the user's favorite fruit
if (!isset($_COOKIE['favoriteFruit'])) {
    setcookie('favoriteFruit', 'Mango', time() + (7 * 24 * 60 * 60), "/"); // Set to expire in 7 days
}

// Check if the delete button was pressed
if (isset($_POST['delete'])) {
    // Delete the cookie by setting its expiration time to the past
    setcookie('favoriteFruit', '', time() - 3600, "/");
    $message = "The cookie 'favoriteFruit' has been deleted.";
}

// Retrieve the cookie value
$fruit = isset($_COOKIE['favoriteFruit']) ? $_COOKIE['favoriteFruit'] :'';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Cookie Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Favorite Fruit Cookie</h2>
    <p>Current Cookie Value: <strong><?php echo htmlspecialchars($fruit); ?></strong></p>

    <?php if (isset($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <button type="submit" name="delete" class="btn btn-danger">Delete Cookie</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
