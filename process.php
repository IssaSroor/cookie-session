<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // CSRF token is invalid
        die("CSRF token validation failed. Form submission rejected.");
    }

    // Process the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Display a success message
    echo "<div class='container mt-5'>
            <h3>Form Submitted Successfully!</h3>
            <p>Name: $name</p>
            <p>Email: $email</p>
          </div>";
}
?>
