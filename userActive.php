<?php
// Start the session
session_start();

// Check if the visit time is set, if not, set it to the current time
if (!isset($_SESSION['visit_time'])) {
    $_SESSION['visit_time'] = date('Y-m-d H:i:s'); // Store the current date and time
}

// Get the user's IP address
$user_ip = $_SERVER['REMOTE_ADDR'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Activity Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>User Activity Log</h2>
    <p><strong>Visit Time:</strong> <?php echo $_SESSION['visit_time']; ?></p>
    <p><strong>Your IP Address:</strong> <?php echo htmlspecialchars($user_ip); ?></p>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
