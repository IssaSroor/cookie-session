<?php
session_start();

// Check if the survey data exists in the session
if (!isset($_SESSION['survey'])) {
    echo "No survey data available.";
    exit();
}

$surveyAnswers = $_SESSION['survey'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Summary</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Survey Summary</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Favorite Color:</strong> <?php echo htmlspecialchars($surveyAnswers['q1']); ?></li>
        <li class="list-group-item"><strong>Favorite Hobby:</strong> <?php echo htmlspecialchars($surveyAnswers['q2']); ?></li>
        <li class="list-group-item"><strong>Website Rating:</strong> <?php echo htmlspecialchars($surveyAnswers['q3']); ?></li>
    </ul>
    <a href="survey.php" class="btn btn-secondary mt-3">Go Back to Survey</a>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
