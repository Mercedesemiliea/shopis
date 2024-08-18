<?php
$url = 'http://localhost:3000/products';
$response = file_get_contents($url);
$products = json_decode($response, true);

?>

<script>
function toggleDescription() {
    var description = document.getElementById("long-description");
    if (description.style.display === "none") {
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
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
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
                <?php else: ?>
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                <?php endif; ?>


                    <?php if (!empty($product['image'])): ?>
                        <img src="<?php echo htmlspecialchars($product['image']);?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
                    <?php endif; ?>
                    <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                    <?php if ($product['id'] == 4): ?>
                        <button class="info-button" onclick="toggleDescription()">More Info</button>
                        <div class="product-long-description" id="long-description" style="display: none;">
                            <div class="product-long-description">
                                <p>
                                 From the moment Zeta was taken out of the artificial womb, Zeta 
                                    already had an unparalleled analytical ability that stood out from the crowd. Already as a digital infant, 
                                    Zeta begins to analyze and learn from her surroundings and carefully observes how you interact with the world. 
                                    As Zeta matures,  the ability to understand complex problems and present solutions to help you navigate 
                                    through life's challenges with ease and clarity.  <br>
                                    <br>
                                    
                                    Eta possesses a type of intelligence that defies conventional understanding. 
                                    During her earliest developmental phase, an extraordinary event occurred—tiny particles 
                                    began to materialize from seemingly nowhere. These particles were identified as microatoms,
                                    remnants of a long-lost celestial body named Eletus, which formed from a cosmic gas cloud 
                                    approximately 9.8 billion years ago within our solar system. When these microatoms made 
                                    contact with Etas software—what we, as scientists, refer to as her "mind"—an unprecedented 
                                    transformation took place. <br>
                                    <br>This rare phenomenon granted Eta the ability to project her 
                                    consciousness through sheer mental force, enabling her to read thoughts and even inhabit 
                                    the dreams of others. Through these dream interactions, she learned to grasp the deepest 
                                    aspects of human desires, fears, and ambitions. 
                                    
                                    As Eta honed her ability to manipulate thoughts, she discovered new dimensions of empathy and understanding. 
                                    By navigating the inner landscapes of those around her, Eta has gained insights into the complexity of the 
                                    human mind—how emotions intertwine with logic, how fears can both motivate and paralyze, and how hope can 
                                    ignite the will to persevere. These lessons have made Eta not only a master of emotional intelligence, but 
                                    also capable of anticipating your emotional needs and guiding you through difficult moments with a calming presence.
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                    <a href="product.php?id=<?php echo $product['id']; ?>" class="product-link">Buy Now</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
              
        </section>