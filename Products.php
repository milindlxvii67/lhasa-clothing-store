<?php

session_start();

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Database Connection Failed");
}

/* CATEGORY FILTER */

if(isset($_GET['CategoryId']))
{
    $CategoryId = $_GET['CategoryId'];

    $sql = "SELECT * FROM item_master WHERE CategoryId='$CategoryId'";
}
else
{
    $sql = "SELECT * FROM item_master";
}

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Products - Lhasa Clothing Store</title>

<link rel="stylesheet" href="style.css">

<style>

.product-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:30px;
    margin-top:40px;
}

.product-card{
    background:white;
    padding:25px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.product-card img{
    width:100%;
    height:250px;
    object-fit:contain;
    margin-bottom:15px;
}

.product-card h3{
    font-size:35px;
    margin-bottom:15px;
}

.product-description{
    color:#555;
    margin-bottom:15px;
    line-height:1.6;
}

.product-size{
    font-weight:bold;
    margin-bottom:10px;
}

.old-price{
    text-decoration:line-through;
    color:red;
    font-size:20px;
}

.discount{
    color:green;
    font-weight:bold;
    margin-top:10px;
}

.price{
    font-size:30px;
    font-weight:bold;
    margin:20px 0;
}

.cart-btn{
    background:black;
    color:white;
    border:none;
    padding:15px 30px;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
    transition:0.3s;
}

.cart-btn:hover{
    background:#00cc66;
}

</style>

</head>

<body>

<div class="main-container">

<?php include "Header.php"; ?>

<section class="section">

<h2>Our Fashion Products</h2>

<div class="product-grid">

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
?>

<!-- PRODUCT CARD -->

<div class="product-card">

<img src="Products/<?php echo $row['Image']; ?>" alt="">

<h3>
<?php echo $row['ItemName']; ?>
</h3>

<p class="product-description">
<?php echo $row['Description']; ?>
</p>

<p class="product-size">
Size: <?php echo $row['Size']; ?>
</p>

<p class="old-price">
₹<?php echo $row['Price']; ?>
</p>

<p class="discount">
Discount: <?php echo $row['Discount']; ?>%
</p>

<p class="price">
₹<?php echo $row['Total']; ?>
</p>

<!-- ADD TO CART FORM -->

<form method="post" action="add_to_cart.php">

<input type="hidden" name="id"
value="<?php echo $row['ItemId']; ?>">

<input type="hidden" name="name"
value="<?php echo $row['ItemName']; ?>">

<input type="hidden" name="price"
value="<?php echo $row['Total']; ?>">

<input type="hidden" name="image"
value="Products/<?php echo $row['Image']; ?>">

<button type="submit" class="cart-btn">
Add to Cart
</button>

</form>

</div>

<?php
    }
}
else
{
?>

<h1 style="text-align:center; width:100%; color:red;">
No Products Found
</h1>

<?php
}

mysqli_close($con);

?>

</div>

</section>

<section class="products-banner">

    <h1>Premium Fashion Collection</h1>

    <p>
        Upgrade Your Style With Trending Fashion Wear
    </p>

</section>

<?php include "Footer.php"; ?>

</div>

</body>
</html>