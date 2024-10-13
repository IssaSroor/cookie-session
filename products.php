<?php
// Start session to use cookies for the cart

// Products array
$products = ['Apple', 'Banana', 'Orange', 'Grapes', 'Pineapple'];

// Handle adding products to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product'])) {
    $product = $_POST['product'];


    // Check if the cart cookie already exists
    if (!isset($_COOKIE['cart'])) {
        // If no cart cookie, create a new cart array
        $cart = [];
    } else {
        // If cart cookie exists, retrieve and unserialize it
        $cart = unserialize($_COOKIE['cart']);
    }

    // Add the selected product to the cart array
    $cart[] = $product;

    setcookie('cart', serialize($cart), time() + 1200, "/");

    // Serialize and store the cart back in the cookie for 1 hour
    $message = "$product added to cart!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Products</h2>

    <!-- Display message if product is added -->
    <?php if (!empty($message)) : ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <!-- List of Products -->
    <ul class="list-group">
        <?php foreach ($products as $product): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $product; ?>
                <form method="post" action="">
                    <input type="hidden" name="product" value="<?php echo $product; ?>">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="mt-4">
        <a href="cart.php" class="btn btn-success">Go to Cart</a>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
