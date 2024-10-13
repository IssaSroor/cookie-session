<?php
// Start the session
session_start();

// Handle clearing the cart
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']); // Clear the cart
}

// Initialize the cart
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Your Cart</h2>

    <?php if (empty($cartItems)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($cartItems as $item): ?>
                <li class="list-group-item">
                    <h5><?php echo htmlspecialchars($item['name']); ?> - $<?php echo number_format($item['price'], 2); ?></h5>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <br>
    <form method="post" action="">
        <button type="submit" name="clear_cart" class="btn btn-danger">Clear Cart</button>
    </form>
    
    <a href="seProducts.php" class="btn btn-secondary mt-2">Continue Shopping</a>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
