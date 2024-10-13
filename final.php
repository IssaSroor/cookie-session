<?php
    session_start();    

    if(!isset($_SESSION["name"]) || !isset($_SESSION["email"]) || !isset($_SESSION["address"]) || !isset($_SESSION["phone"])) {

        header("Location: step1.php");
        exit(); 
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {  

        session_destroy();

        echo'thank you';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Step: Review Your Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Final Step: Review Your Information</h2>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></li>
        <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></li>
        <li class="list-group-item"><strong>Address:</strong> <?php echo htmlspecialchars($_SESSION['address']); ?></li>
        <li class="list-group-item"><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['phone']); ?></li>
    </ul>
    <form method="post" action="">
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>