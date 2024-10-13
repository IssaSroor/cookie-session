<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Query Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Search Form</h2>

    <!-- Search form -->
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="query" class="form-label">Search:</label>
            <input type="text" name="query" id="query" class="form-control" placeholder="Enter search query" value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Display search results -->
    <?php if (isset($_GET['query'])): ?>
    <div class="mt-4">
        <h4>Search Results for: "<?php echo htmlspecialchars($_GET['query']); ?>"</h4>
        <!-- You can replace this section with actual search logic -->
        <p>No actual search logic implemented. Displaying search query for now.</p>
    </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
