<?php
// Initialize the score
$score = isset($_COOKIE['quizScore']) ? (int)$_COOKIE['quizScore'] : 0;

// Check if the quiz form is submitted
if (isset($_POST['submit'])) {
    // Define correct answers
    $correctAnswers = ['b', 'a', 'c']; // Corresponding to each question

    // Calculate the score
    for ($i = 0; $i < count($correctAnswers); $i++) {
        if (isset($_POST['question' . ($i + 1)]) && $_POST['question' . ($i + 1)] === $correctAnswers[$i]) {
            $score++;
        }
    }

    // Save the updated score in a cookie
    setcookie('quizScore', $score, time() + (7 * 24 * 60 * 60), "/"); // Cookie expires in 7 days
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz with Cookies</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Simple Quiz</h2>
    
    <!-- Display user's current score -->
    <p>Your current score: <strong><?php echo $score; ?></strong></p>

    <form method="post" action="">
        <div class="mb-4">
            <h4>Question 1: What is the capital of France?</h4>
            <div>
                <label><input type="radio" name="question1" value="a"> a) London</label><br>
                <label><input type="radio" name="question1" value="b"> b) Paris</label><br>
                <label><input type="radio" name="question1" value="c"> c) Rome</label>
            </div>
        </div>

        <div class="mb-4">
            <h4>Question 2: What is 2 + 2?</h4>
            <div>
                <label><input type="radio" name="question2" value="a"> a) 4</label><br>
                <label><input type="radio" name="question2" value="b"> b) 22</label><br>
                <label><input type="radio" name="question2" value="c"> c) 5</label>
            </div>
        </div>

        <div class="mb-4">
            <h4>Question 3: Which planet is known as the Red Planet?</h4>
            <div>
                <label><input type="radio" name="question3" value="a"> a) Earth</label><br>
                <label><input type="radio" name="question3" value="b"> b) Venus</label><br>
                <label><input type="radio" name="question3" value="c"> c) Mars</label>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit Answers</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
