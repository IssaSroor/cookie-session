<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store the survey answers in the session
    $_SESSION['survey'] = [
        'q1' => $_POST['q1'],
        'q2' => $_POST['q2'],
        'q3' => $_POST['q3']
    ];

    // Redirect to summary page
    header("Location: summary.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Survey Form</h2>
    <form method="post" action="survey.php">
        <div class="mb-3">
            <label for="q1" class="form-label">1. What is your favorite color?</label>
            <input type="text" name="q1" id="q1" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="q2" class="form-label">2. What is your favorite hobby?</label>
            <input type="text" name="q2" id="q2" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="q3" class="form-label">3. How would you rate our website? (1-5)</label>
            <input type="number" name="q3" id="q3" class="form-control" min="1" max="5" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
