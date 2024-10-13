<?php
// Set the initial cookie if it doesn't exist
if (!isset($_COOKIE['userLevel'])) {
    setcookie('userLevel', 'User Level: Beginner', time() + (7 * 24 * 60 * 60), "/"); // Cookie expires in 7 days
}

// Check if the form is submitted to update the cookie
if (isset($_POST['update'])) {
    // Get the new value from the input field
    $newLevel = $_POST['userLevel'];
    
    // Update the cookie with the new value
    setcookie('userLevel', $newLevel, time() + (7 * 24 * 60 * 60), "/"); // Cookie expires in 7 days

    // Set a flag to show the updated message
    $updated = true;
}

// Retrieve the current cookie value
$currentLevel = isset($_COOKIE['userLevel']) ? $_COOKIE['userLevel'] : 'No cookie set.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Cookie Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Update User Level</h2>
    
    <!-- Display the current cookie value -->
    <p>Current Cookie Value: <strong><?php echo htmlspecialchars($currentLevel); ?></strong></p>
    
    <?php if (isset($updated)): ?>
        <div class="alert alert-success">Cookie updated to: <strong><?php echo htmlspecialchars($newLevel); ?></strong></div>
    <?php endif; ?>

    <!-- Form to update the cookie value -->
    <form method="post" action="">
        <div class="mb-3">
            <label for="userLevel" class="form-label">Update User Level:</label>
            <input type="text" name="userLevel" id="userLevel" class="form-control" placeholder="Enter new user level" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Cookie</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
