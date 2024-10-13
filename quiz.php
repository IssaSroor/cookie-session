<?php
session_start();

// Define quiz questions and answers
$questions = [
    1 => ['question' => 'What is the capital of France?', 'options' => ['Paris', 'Berlin', 'Madrid'], 'answer' => 'Paris'],
    2 => ['question' => 'What is 2 + 2?', 'options' => ['3', '4', '5'], 'answer' => '4'],
    3 => ['question' => 'Which planet is known as the Red Planet?', 'options' => ['Mars', 'Jupiter', 'Saturn'], 'answer' => 'Mars']
];

// Initialize the session variables
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 1;
    $_SESSION['score'] = 0;
}

// Check if the form has been submitted (i.e., user answered a question)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_answer = $_POST['answer'];
    $current_question = $_SESSION['current_question'];

    // Check if the answer is correct
    if ($selected_answer == $questions[$current_question]['answer']) {
        $_SESSION['score'] += 1;
    }

    // Move to the next question
    $_SESSION['current_question'] += 1;
}

// Get the current question number
$current_question = $_SESSION['current_question'];

// Check if the quiz is complete
if ($current_question > count($questions)) {
    $total_score = $_SESSION['score'];
    
    // Clear session data for a new quiz attempt
    session_unset();
    session_destroy();
    
    echo "<h1>Your Total Score: $total_score / " . count($questions) . "</h1>";
    echo '<a href="quiz.php">Restart Quiz</a>';
    exit();
}

// Get the current question details
$question = $questions[$current_question]['question'];
$options = $questions[$current_question]['options'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Question <?php echo $current_question; ?> of <?php echo count($questions); ?></h2>
    <p><?php echo $question; ?></p>

    <form method="post" action="quiz.php">
        <?php foreach ($options as $option): ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer" value="<?php echo $option; ?>" required>
                <label class="form-check-label">
                    <?php echo $option; ?>
                </label>
            </div>
        <?php endforeach; ?>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

</body>
</html>
