<?php
$url = 'http://localhost:3000/products';
$response = file_get_contents($url);
$products = json_decode($response, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                <?php if (!empty($product['image'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
