<?php
// Define variables to store error messages and form data
$firstNameErr = $lastNameErr = $emailErr = "";
$firstName = $lastName = $email = "";
$submittedData = "";

// Process the form when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate first name
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First name is required";
    } else {
        $firstName = sanitizeInput($_POST["firstName"]);
    }
    
    // Validate last name
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last name is required";
    } else {
        $lastName = sanitizeInput($_POST["lastName"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = sanitizeInput($_POST["email"]);
    }

    // If all fields are valid, display success message
    if (empty($firstNameErr) && empty($lastNameErr) && empty($emailErr)) {
        $submittedData = "First Name: $firstName<br>Last Name: $lastName<br>Email: $email";
    }
}

// Function to sanitize form inputs
function sanitizeInput($data) {
    $data = trim($data); // Remove unnecessary spaces
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data); // Prevent XSS attacks
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling with $_POST</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>User Information Form</h2>
    <?php
    if (!empty($successMessage)) {
        echo "<div class='alert alert-success'>$successMessage</div>";
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $firstName; ?>">
            <span class="text-danger"><?php echo $firstNameErr; ?></span>
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $lastName; ?>">
            <span class="text-danger"><?php echo $lastNameErr; ?></span>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
            <span class="text-danger"><?php echo $emailErr; ?></span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
     <!-- Display submitted data -->
     <?php if ($submittedData): ?>
    <div class="mt-4">
        <h4>Submitted Data:</h4>
        <p><?php echo $submittedData; ?></p>
    </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
