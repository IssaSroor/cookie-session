<?php
// Start session to use cookies for the cart

// Retrieve cart items from cookie
$cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Your Cart</h2>

    <!-- Display Cart Items -->
    <?php if (!empty($cart)): ?>
        <ul class="list-group">
            <?php foreach ($cart as $item): ?>
                <li class="list-group-item"><?php echo htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    <div class="mt-4">
        <a href="products.php" class="btn btn-primary">Back to Products</a>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
