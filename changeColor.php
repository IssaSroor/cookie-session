<?php
// Set the background color based on the form submission or use the cookie value
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['color'])) {
    setcookie('bgColor', $_POST['color'], time() + 100, "/");
    $bgColor = $_POST['color'];
} else {
    $bgColor = $_COOKIE['bgColor'] ?? 'white'; // Default to white
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Background Color</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: <?php echo  ($bgColor); ?>;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Select Background Color</h2>
    <form method="post">
        <select class="form-select mb-3" name="color">
            <option value="red" <?php if($bgColor == 'red') echo 'selected'; ?>>Red</option>
            <option value="green" <?php if($bgColor == 'green') echo 'selected'; ?>>Green</option>
            <option value="blue" <?php if($bgColor == 'blue') echo 'selected'; ?>>Blue</option>
            <option value="yellow" <?php if($bgColor == 'yellow') echo 'selected'; ?>>Yellow</option>
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
