<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Server and Client Information</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Server IP Address:</strong> <?php echo $_SERVER['SERVER_ADDR']; ?></li>
        <li class="list-group-item"><strong>Current Script Name:</strong> <?php echo $_SERVER['SCRIPT_NAME']; ?></li>
        <li class="list-group-item"><strong>User Agent (Browser):</strong> <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
        <li class="list-group-item"><strong>Request Method:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?></li>
        <li class="list-group-item"><strong>Client IP Address:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
    </ul>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
