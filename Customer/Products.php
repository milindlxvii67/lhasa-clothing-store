<?php

session_start();

if(!isset($_SESSION['Customer']))
{
    header("Location: ../Login.php");
    exit();
}

/* =========================
   DATABASE CONNECTION
========================= */

$con = mysqli_connect(
    "localhost",
    "root",
    "",
    "shopping"
);

if(!$con)
{
    die("Database Connection Failed");
}

/* =========================
   CATEGORY FILTER
========================= */

if(isset($_GET['CategoryId']))
{
    $CategoryId = intval($_GET['CategoryId']);

    $sql = "SELECT * FROM item_master
            WHERE CategoryId='$CategoryId'";
}
else
{
    $sql = "SELECT * FROM item_master";
}

/* =========================
   FETCH PRODUCTS
========================= */

$result = mysqli_query($con, $sql);

if(!$result)
{
    die(mysqli_error($con));
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Products</title>

<link rel="stylesheet"
      href="../style.css">

</head>

<body>

<?php include "Header.php"; ?>

<section class="section">

    <h2 class="section-title">
        Fashion Products
    </h2>

    <div class="product-grid">

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
?>

        <div class="product-card">

            <img src="../Products/<?php echo $row['Image']; ?>"
                 alt="Product Image">

            <h3>
                <?php echo $row['ItemName']; ?>
            </h3>

            <p class="product-description">

                <?php echo $row['Description']; ?>

            </p>

            <p class="price">

                ₹<?php echo $row['Total']; ?>

            </p>

            <!-- ADD TO CART FORM -->

            <form action="InsertCart.php?Id=<?php echo $row['ItemId']; ?>"
                  method="POST">

                <input type="number"
                       name="txtQty"
                       value="1"
                       min="1"
                       class="qty-input"
                       required>

                <button type="submit"
                        class="dashboard-btn">

                    Add To Cart

                </button>

            </form>

        </div>

<?php
    }
}
else
{
?>

        <h3>No Products Found</h3>

<?php
}
?>

    </div>

</section>

<?php include "../Footer.php"; ?>

</body>

</html>