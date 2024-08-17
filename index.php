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
    
    <link rel="stylesheet" href="frontend/css/navbar.css">
    <link rel="stylesheet" href="frontend/css/index.css">
    <title>Products</title>
</head>
<body>
  <div class="index-wrapper">
<?php include 'frontend/includes/navbar.php'; ?>
  
<div class="video-background">

    </div>
    <div class="content">
        <h1>Unleash the Power of AI in Your Home.</h1>
        <p> Welcome to a world where tomorrow's technology meets today's needs. Our AI robots are designed to simplify your life through smart, efficient solutions that assist you with everything from household tasks to personal assistance. Discover how we can transform your everyday life.</p>
    </div>
 

  


    <div class="products-container">

    
<div class="products">


           


<h1>Our AI Robots</h1>

<div class="products-wrapper">
    <ul>
    <?php if (is_array($products) && !empty($products)): ?>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                <a href="product.php?id=<?php echo $product['id']; ?>" class="product-link">Buy Now</a>
                <?php if (!empty($product['image'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>
    </ul>
    </div>
    </div> 
    </div>
               <!-- Sidomeny -->
               <nav class="side-nav">
                <ul>
                    <li>Contact Us</li>
                    <li>Careers</li>
                    <li>Privacy Policy</li>
                    <li>Terms of Service</li>
                </ul>
            </nav>

                </div>
               
</body>
</html>
