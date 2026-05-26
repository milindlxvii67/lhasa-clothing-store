<?php
session_start();

/* CUSTOMER LOGIN CHECK */

if(
    !isset($_SESSION['CustomerId'])
    ||
    !isset($_SESSION['Role'])
    ||
    $_SESSION['Role'] != "Customer"
)
{
    header("Location: Login.php");
    exit();
}

/* DATABASE CONNECTION */

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Database Connection Failed");
}

/* DELETE ITEM */

if(isset($_GET['delete']))
{
    $CartId = $_GET['delete'];

    mysqli_query($con,
    "DELETE FROM shopping_cart WHERE CartId='$CartId'");

    header("Location: cart.php");
    exit();
}

/* FETCH CART ITEMS */

$sql = "SELECT * FROM shopping_cart";

$result = mysqli_query($con,$sql);

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Shopping Cart</title>

<link rel="stylesheet" href="style.css">

<style>

/* CART PAGE */

.cart-section{
    width:90%;
    margin:50px auto;
}

.cart-section h1{
    text-align:center;
    margin-bottom:40px;
    font-size:50px;
}

/* CART CARD */

.cart-card{
    background:white;

    padding:25px;

    border-radius:15px;

    margin-bottom:25px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.cart-left{
    display:flex;
    align-items:center;
    gap:25px;
}

.cart-left img{
    width:110px;
    height:110px;

    object-fit:contain;

    border-radius:10px;
}

.cart-details h2{
    font-size:36px;
    margin-bottom:15px;
}

.cart-price{
    color:#00aa55;
    font-size:28px;
    font-weight:bold;
}

/* DELETE BUTTON */

.delete-btn{
    background:red;
    color:white;

    padding:12px 20px;

    text-decoration:none;

    border-radius:8px;

    font-size:16px;

    transition:0.3s;
}

.delete-btn:hover{
    background:darkred;
}

/* TOTAL SECTION */

.total-section{
    text-align:right;
    margin-top:30px;
}

.total-section h2{
    font-size:42px;
    margin-bottom:20px;
}

.checkout-btn{
    background:#111;
    color:white;

    padding:15px 35px;

    border-radius:8px;

    text-decoration:none;

    font-size:18px;

    transition:0.3s;
}

.checkout-btn:hover{
    background:#00aa55;
}

/* EMPTY CART */

.empty-cart{
    text-align:center;
    font-size:30px;
    color:red;
    margin-top:50px;
}

</style>

</head>

<body>

<div class="main-container">

<!-- HEADER -->

<?php include "Header.php"; ?>

<!-- CART SECTION -->

<section class="cart-section">

    <h1>Your Shopping Cart</h1>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $total += $row['Price'];
?>

    <div class="cart-card">

        <div class="cart-left">

            <img src="Products/<?php echo $row['Image']; ?>">

            <div class="cart-details">

                <h2>
                    <?php echo $row['ProductName']; ?>
                </h2>

                <div class="cart-price">
                    ₹<?php echo $row['Price']; ?>
                </div>

            </div>

        </div>

        <!-- DELETE BUTTON -->

        <a href="cart.php?delete=<?php echo $row['CartId']; ?>"
           class="delete-btn"
           onclick="return confirm('Remove item from cart?')">

            Delete

        </a>

    </div>

<?php
    }
?>

    <!-- TOTAL -->

    <div class="total-section">

        <h2>
            Total: ₹<?php echo $total; ?>
        </h2>

        <a href="checkout.php"
           class="checkout-btn">

            Proceed to Checkout

        </a>

    </div>

<?php
}
else
{
?>

    <div class="empty-cart">

        Your Cart is Empty

    </div>

<?php
}

mysqli_close($con);

?>

</section>

<!-- FOOTER -->

<?php include "Footer.php"; ?>

</div>

</body>
</html>