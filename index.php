<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Clothing Store</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="main-container">

<?php include "Header.php"; ?>

<!-- HERO SECTION -->
<section class="hero">

    <div class="hero-content">

        <h1>
            NEW FASHION COLLECTION 2026
        </h1>

        <p>
            Discover trendy outfits, premium fashion and exciting offers.
        </p>

        <a href="Products.php" class="hero-btn">
            Shop Now
        </a>

    </div>

</section>

<!-- TRENDING CATEGORIES -->
<section class="section">
    <h2>Trending Categories</h2>

    <div class="card-container">

        <!-- JEANS -->
        <a href="Products.php?CategoryId=1" class="category-link">
            <div class="card">
                <img src="img/pants.png" alt="Jeans">
                <h3>Jeans</h3>
                <p>Premium denim collection</p>
            </div>
        </a>

        <!-- BLAZERS -->
        <a href="Products.php?CategoryId=2" class="category-link">
            <div class="card">
                <img src="img/suit.png" alt="Blazers">
                <h3>Blazers</h3>
                <p>Stylish formal wear</p>
            </div>
        </a>

        <!-- TSHIRTS -->
        <a href="Products.php?CategoryId=3" class="category-link">
            <div class="card">
                <img src="img/tshirt.png" alt="T-Shirts">
                <h3>T-Shirts</h3>
                <p>Comfortable casual wear</p>
            </div>
        </a>

    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="section">
    <h2>Featured Products</h2>

    <div class="product-grid">

        <div class="product-card">
            <img src="img/Jeans.jpg" alt="">
            <h3>Blue Denim Jeans</h3>
            <p class="price">₹1499</p>
            <button>Add to Cart</button>
        </div>

        <div class="product-card">
            <img src="img/asd.jpg" alt="">
            <h3>Classic Blazer</h3>
            <p class="price">₹2499</p>
            <button>Add to Cart</button>
        </div>

        <div class="product-card">
            <img src="img/images.jpg" alt="">
            <h3>Oversized T-Shirt</h3>
            <p class="price">₹999</p>
            <button>Add to Cart</button>
        </div>

    </div>
</section>

<!-- SPECIAL OFFER SECTION -->

<section class="offer-banner">

    <div class="offer-overlay">

        <h2>
            Special Summer Offer 🔥
        </h2>

        <p>
            Get Flat 50% OFF on Premium Fashion Collections
        </p>

        <a href="Offers.php" class="offer-btn">
            Explore Offers
        </a>

    </div>

</section>
<section class="social-section">

    <h2>Stay Connected with Lhasa Clothing Store</h2>

    <p>
        Follow us on social media for the latest fashion updates and exclusive offers.
    </p>

    <div class="social-icons">

        <a href="#">
            <img src="img/facebook.png" alt="Facebook">
        </a>

        <a href="#">
            <img src="img/twitter.png" alt="Twitter">
        </a>

        <a href="#">
            <img src="img/instagram.png" alt="Instagram">
        </a>

        <a href="#">
            <img src="img/linkedin.png" alt="LinkedIn">
        </a>

    </div>

</section>
<!-- footer -->
<?php include "Footer.php"; ?>

</body>
</html>