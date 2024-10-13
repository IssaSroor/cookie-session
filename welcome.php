<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Welcome!</h2>
    
    <?php
    // Check if the GET parameters are set
    if (isset($_GET['first_name']) && isset($_GET['last_name'])) {
        // Retrieve the first name and last name
        $firstName = htmlspecialchars($_GET['first_name']);
        $lastName = htmlspecialchars($_GET['last_name']);
        
        // Display the welcome message
        echo "<p>Hello, $firstName $lastName! Welcome to our website.</p>";
    } else {
        // Handle case where parameters are missing
        echo "<p>No user information provided.</p>";
    }
    ?>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
