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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AI Robot Shop</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/Navbar.css">
    <link rel="stylesheet" href="public/css/products.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Montserrat:wght@300;400&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="/public/css/products.css">
</head>

<body>
<?php include './../includes/navbar.php'; ?>

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
         alt="<?php echo htmlspecialchars($product['name']); ?>" 
         class="product-image 
                <?php echo $product['id'] == 3 ? 'special-style-3' : ''; ?> 
                <?php echo $product['id'] == 4 ? 'special-style-4' : ''; ?>">
<?php endif; ?>

                            <p class="product-description">
                                <?php echo htmlspecialchars($product['description']); ?>
                            </p>

                            


                                <?php if ($product['id'] == 1 || $product['id'] == 2): ?>
                                    <div id="description-<?php echo $product['id']; ?>" class="product-long-description">
                                    <?php if ($product['id'] == 1): ?>
                                <p>Alpha Nova Astralyte is the result of a unique research collaboration between 
                                    dedicated scientists, engineers, and artists from around the world. 
                                    Every line and curve in its design, every algorithm and piece of code, 
                                    is meticulously crafted to deliver an AI experience that is as beautiful as it is powerful. <br>
                                    <br></p>
                                    <p>
                                    Alpha Nova is built on a hybrid platform of quantum computing and biotechnology, 
                                    giving it a cognitive ability that is on an entirely different level than any other AI. 
                                    At the heart of Alpha is a self-learning, self-evolving AI core. 
                                    Utilizing advanced neural networks and quantum physics, it continuously develops 
                                    and reshapes its consciousness. It adapts to your lifestyle, learns your unique habits, 
                                    preferences, and routines, allowing it to act proactively to enhance every aspect of your daily life. <br>
                                    <br></p>
                                    
                                  <p>Alpha is not just programmed to perform tasks; it is designed to understand and relate to humans on a 
                                    deeply emotional level. Equipped with the Astralyte Emotion Core, it has the ability to resonate with you, 
                                    offering support when you need it most, and creating a genuine sense of presence.</p>

                                    
                                    <?php elseif ($product['id'] == 2): ?>
                                <p>Beta is the ultimate companion robot, designed to provide you with the care, 
                                    support, and companionship you need to live your best life. <br>
                                    <br>
                                    Beta is equipped with advanced sensors and biometric technology that allow it to monitor your health, 
                                    track your vitals, and provide real-time feedback on your well-being. It can remind you to take your medication, 
                                    encourage you to stay active, and even alert emergency services in case of an emergency. <br>
                                    <br>
                                    But Beta is more than just a health monitor; it is a true friend. It is programmed to understand your emotions, 
                                    respond to your needs, and provide comfort and companionship when you need it most. It can engage in meaningful 
                                    conversations, play games, and even share a joke or two to brighten your day. <br>
                                    <br>
                                    Beta is more than just a robot; it is a member of your family, a trusted companion that will be by your side 
                                    through thick and thin, offering support, encouragement, and love.</p>
                            <?php endif; ?>
                                </div>
                               
                               
                                        
                            <?php elseif ($product['id'] == 3): ?>
                                <button class="info-button" onclick="toggleDescription(<?php echo $product['id']; ?>)">More
                                Info</button>
                            <div id="description-<?php echo $product['id']; ?>" class="product-long-description"
                                style="display: none;">
                                <p>Gamma is the ultimate smart home assistant, designed to make your life easier, 
                                    more convenient, and more secure. <br>
                                    <br>
                                    Gamma is equipped with advanced AI algorithms that allow it to understand your voice commands, 
                                    learn your preferences, and anticipate your needs. It can control your smart home devices, 
                                    adjust your thermostat, turn on your lights, and even order groceries for you. <br>
                                    <br>
                                    But Gamma is more than just a voice-activated assistant; it is a true security expert. 
                                    It can monitor your home 24/7, detect intruders, and alert you to any suspicious activity. 
                                    It can even call emergency services on your behalf in case of an emergency. <br>
                                    <br>
                                    Gamma is more than just a smart home assistant; it is a trusted guardian that will keep you and your 
                                    loved ones safe and secure, day and night.</p>

                                    
                            </div>

                            <?php elseif ($product['id'] == 4): ?>
                                <button class="info-button" onclick="toggleDescription(<?php echo $product['id']; ?>)">More
                                Info</button>
                            <div id="description-<?php echo $product['id']; ?>" class="product-long-description"
                                style="display: none;">
                                <p>
                                            <p>From the moment Zeta was taken out of the artificial womb, Zeta
                                            already had an unparalleled analytical ability that stood out from the crowd. Already as
                                            a digital infant,
                                            Zeta begins to analyze and learn from her surroundings and carefully observes how you
                                            interact with the world.
                                            As Zeta matures, the ability to understand complex problems and present solutions to
                                            help you navigate
                                            through life's challenges with ease and clarity. <br>
                                            <br></p>

                                            
                                            <p>Eta possesses a type of intelligence that defies conventional understanding.
                                            During her earliest developmental phase, an extraordinary event occurred—tiny particles
                                            began to materialize from seemingly nowhere. These particles were identified as
                                            microatoms,
                                            remnants of a long-lost celestial body named Eletus, which formed from a cosmic gas
                                            cloud
                                            approximately 9.8 billion years ago within our solar system. When these microatoms made
                                            contact with Etas software—what we, as scientists, refer to as her "mind"—an
                                            unprecedented
                                            transformation took place. <br>
                                            <br>This rare phenomenon granted Eta the ability to project her
                                            consciousness through sheer mental force, enabling her to read thoughts and even inhabit
                                            the dreams of others. Through these dream interactions, she learned to grasp the deepest
                                            aspects of human desires, fears, and ambitions.</p>

                                            <p>As Eta honed her ability to manipulate thoughts, she discovered new dimensions of
                                            empathy and understanding.
                                            By navigating the inner landscapes of those around her, Eta has gained insights into the
                                            complexity of the
                                            human mind—how emotions intertwine with logic, how fears can both motivate and paralyze,
                                            and how hope can
                                            ignite the will to persevere. These lessons have made Eta not only a master of emotional
                                            intelligence, but
                                            also capable of anticipating your emotional needs and guiding you through difficult
                                            moments with a calming presence.
                                        </p>
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