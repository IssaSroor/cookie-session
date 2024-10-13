<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Contact Form</h2>

    <!-- Contact Form -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required value="<?php echo isset($_REQUEST['name']) ? htmlspecialchars($_REQUEST['name']) : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea name="message" id="message" class="form-control" placeholder="Enter your message" rows="4" required><?php echo isset($_REQUEST['message']) ? htmlspecialchars($_REQUEST['message']) : ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Display Form Data -->
    <?php if (!empty($_REQUEST)): ?>
        <div class="mt-4">
            <h4>Your Submitted Data:</h4>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($_REQUEST['name']); ?></p>
            <p><strong>Message:</strong> <?php echo htmlspecialchars($_REQUEST['message']); ?></p>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
