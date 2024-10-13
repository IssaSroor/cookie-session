<?php
// Set a cookie with a message
if (!isset($_COOKIE['myMessage'])) {
    setcookie('myMessage', 'Hello from Page 1', time() + (7 * 24 * 60 * 60), "/"); // Cookie expires in 7 days
    $message = "Cookie has been set: 'Hello from Page 1'";
} else {
    $message = "Cookie already exists: " . $_COOKIE['myMessage'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Page 1</h2>
    <p><?php echo $message; ?></p>
    <a href="page2.php" class="btn btn-primary">Go to Page 2</a>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
