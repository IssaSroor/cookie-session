<?php
// Start the session
session_start();

// Check if there is a flash message to display
$flashMessage = '';
if (isset($_SESSION['flash_message'])) {
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']); // Remove the flash message after displaying it
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputValue = $_POST['inputValue'];

    // Example validation: Check if input is empty
    if (!empty($inputValue)) {
        $_SESSION['flash_message'] = "Success! You entered: " . htmlspecialchars($inputValue);
    } else {
        $_SESSION['flash_message'] = "Error! Input cannot be empty.";
    }

    // Redirect to the same page to display the flash message
    header("Location: flashMessage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Messages Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Enter Something</h2>

    <?php if ($flashMessage): ?>
        <div class="alert alert-info"><?php echo $flashMessage; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="inputValue" class="form-label">Your Input:</label>
            <input type="text" name="inputValue" id="inputValue" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
