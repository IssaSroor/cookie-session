<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<div class="container mt-5">
    <h2>Welcome, <?= htmlspecialchars($username) ?> (Role: <?= htmlspecialchars($role) ?>)</h2>
    <p>This is your dashboard.</p>

    <h3>Available Options</h3>
    <ul>
        <?php if ($role === 'admin'): ?>
            <li><a href="admin.php">Admin Page</a></li>
        <?php endif; ?>

        <?php if ($role === 'admin' || $role === 'editor'): ?>
            <li><a href="editor.php">Editor Page</a></li>
        <?php endif; ?>

        <li><a href="viewer.php">Viewer Page</a></li>
    </ul>

    <form method="post" action="logout.php">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
</body>
</html>
