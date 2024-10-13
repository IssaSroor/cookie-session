<?php
// Start the session
session_start();

// Define a list of products
$products = [
    ["id" => 1, "name" => "Product A", "price" => 10.00],
    ["id" => 2, "name" => "Product B", "price" => 15.50],
    ["id" => 3, "name" => "Product C", "price" => 7.99],
    ["id" => 4, "name" => "Product D", "price" => 20.00],
];

// Handle adding a product to the cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to cart
    $_SESSION['cart'][] = [
        "id" => $productId,
        "name" => $productName,
        "price" => $productPrice,
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Product List</h2>
    <div class="list-group">
        <?php foreach ($products as $product): ?>
            <div class="list-group-item d-flex justify-content-between">
                <h5><?php echo htmlspecialchars($product['name']); ?> - $<?php echo number_format($product['price'], 2); ?></h5>
                <form method="post" action="">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                    <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <br>
    <a href="seCart.php" class="btn btn-success">View Cart</a>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
