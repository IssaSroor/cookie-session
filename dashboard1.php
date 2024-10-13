<?php

    session_start();    

    if (!isset($_SESSION["username"])){

        header("Location: sessionLogin.php");
        exit(); 

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>This is your dashboard. Only logged-in users can see this page.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>