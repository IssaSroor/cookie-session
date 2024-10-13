<?php
// Retrieve the cookie value
$message = isset($_COOKIE['myMessage']) ? $_COOKIE['myMessage'] : 'No cookie set.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Page 2</h2>
    <p>Cookie Value: <strong><?php echo htmlspecialchars($message); ?></strong></p>
    <a href="page1.php" class="btn btn-primary">Back to Page 1</a>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
