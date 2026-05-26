<?php

session_start();

if(!isset($_SESSION['Customer']))
{
    header("Location: ../Login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","shopping");

$CustomerName = $_SESSION['Customer'];

$sql = "SELECT * FROM shopping_cart WHERE CustomerName='$CustomerName'";

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>My Cart</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<?php include "Header.php"; ?>

<div class="cart-container">

    <h1 class="cart-title">

        Your Shopping Cart

    </h1>

<?php

if(mysqli_num_rows($result) > 0)
{

?>

    <div class="cart-grid">

<?php

$GrandTotal = 0;

while($row = mysqli_fetch_array($result))
{

    $GrandTotal += $row['Total'];

?>

        <div class="cart-card">

            <img src="../Products/<?php echo $row['Image']; ?>">

            <h2>

                <?php echo $row['ItemName']; ?>

            </h2>

            <p>

                Quantity :
                <?php echo $row['Quantity']; ?>

            </p>

            <p>

                Price :
                ₹<?php echo $row['Price']; ?>

            </p>

            <p class="total-price">

                Total :
                ₹<?php echo $row['Total']; ?>

            </p>

            <a href="DeleteCart.php?id=<?php echo $row['CartId']; ?>"
               class="remove-btn">

                Remove

            </a>

        </div>

<?php
}
?>

    </div>

    <div class="grand-total">

        Grand Total :
        ₹<?php echo $GrandTotal; ?>

    </div>

<?php
}
else
{
?>

    <div class="empty-cart">

        Your cart is empty.

    </div>

<?php
}
?>

</div>

<?php include "Footer.php"; ?>

</body>
</html>