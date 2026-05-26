<?php

$con = mysqli_connect("localhost","root","","shopping");

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
<title>Products</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php include "Header.php"; ?>

<section class="section">

    <h2>Fashion Products</h2>

    <div class="product-grid">

<?php

while($row=mysqli_fetch_array($result))
{
?>

        <div class="product-card">

            <img src="../Products/<?php echo $row['Image']; ?>">

            <h3><?php echo $row['ItemName']; ?></h3>

            <p class="product-description">
                <?php echo $row['Description']; ?>
            </p>

            <p class="price">
                ₹<?php echo $row['Total']; ?>
            </p>

            <a href="InsertCart.php?id=<?php echo $row['ItemId']; ?>" class="dashboard-btn">

                Add To Cart

            </a>

        </div>

<?php
}
?>

    </div>

</section>

<?php include "Footer.php"; ?>

</body>
</html>