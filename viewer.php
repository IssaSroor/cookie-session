<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['role'])) {
    echo "Access Denied. You do not have permission to access this page.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewer Page</title>
</head>
<body>
<div class="container mt-5">
    <h2>Viewer Page</h2>
    <p>Welcome! This page is accessible to all users.</p>
</div>
</body>
</html>
