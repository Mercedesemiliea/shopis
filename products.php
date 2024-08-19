<?php
$url = 'http://localhost:3000/products';
$response = file_get_contents($url);
$products = json_decode($response, true);


?>

<script>
    function toggleDescription(productId) {

        var description = document.getElementById("description-" + productId);
        if (description.style.display === "none" || description.style.display === "") {
            description.style.display = "block";
        } else {
            description.style.display = "none";
        }
    }
</script>

<head>
    <title>AI Robot Shop</title>
    <link rel="stylesheet" href="frontend/css/index.css">
    <link rel="stylesheet" href="frontend/css/navbar.css">
    <link rel="stylesheet" href="frontend/css/products.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Montserrat:wght@300;400&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include 'frontend/includes/navbar.php'; ?>

    <div class="products-container">


        <section class="product-list">

            <?php if (is_array($products) && !empty($products)): ?>
                <ul>
                    <?php foreach ($products as $product): ?>
                        <li>

                            <?php if ($product['id'] == 1): ?>

                                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                            <?php elseif ($product['id'] == 2): ?>
                                <h2><?php echo htmlspecialchars($product['name']); ?></h2>


                            <?php elseif ($product['id'] == 3): ?>
                                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <?php elseif ($product['id'] == 4): ?>
                                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <?php endif; ?>


                            <?php if (!empty($product['image'])): ?>
                                <img src="<?php echo htmlspecialchars($product['image']); ?>"
                                    alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
                            <?php endif; ?>

                            <p class="product-description">
                                <?php echo htmlspecialchars($product['description']); ?>
                            </p>

                            <button class="info-button" onclick="toggleDescription(<?php echo $product['id']; ?>)">More
                                Info</button>


                                <?php if ($product['id'] == 1): ?>
                            <div id="description-<?php echo $product['id']; ?>" class="product-long-description"
                                style="display: none;">
                                <p>Alpha Nova Astralyte is the result of a unique research collaboration between 
                                    dedicated scientists, engineers, and artists from around the world. 
                                    Every line and curve in its design, every algorithm and piece of code, 
                                    is meticulously crafted to deliver an AI experience that is as beautiful as it is powerful. <br>
                                    <br>
                                    Alpha Nova is built on a hybrid platform of quantum computing and biotechnology, 
                                    giving it a cognitive ability that is on an entirely different level than any other AI. 
                                    At the heart of Alpha is a self-learning, self-evolving AI core. 
                                    Utilizing advanced neural networks and quantum physics, it continuously develops 
                                    and reshapes its consciousness. It adapts to your lifestyle, learns your unique habits, 
                                    preferences, and routines, allowing it to act proactively to enhance every aspect of your daily life. <br>
                                    <br>
                                    Alpha is not just programmed to perform tasks; it is designed to understand and relate to humans on a 
                                    deeply emotional level. Equipped with the Astralyte Emotion Core, it has the ability to resonate with you, 
                                    offering support when you need it most, and creating a genuine sense of presence.</p>

                            </div>

                            
                            <?php endif; ?>
                           
                            <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                            <a href="product.php?id=<?php echo $product['id']; ?>" class="product-link">Buy Now</a>


                        </li>

                    <?php endforeach; ?>
                </ul>
            </section>







        <?php endif; ?>
    </div>


</body>
</html>