<?php

session_start();

if(!isset($_SESSION['CustomerId']))
{
    header("Location: ../Login.php");
    exit();
}

$CustomerName = $_SESSION['CustomerName'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customer Dashboard</title>

<link rel="stylesheet" type="text/css" href="/LCS/style.css">

</head>

<body>

<?php include "../Header.php"; ?>

<div class="dashboard-container">

    <!-- WELCOME BOX -->

    <div class="welcome-box">

        <h1>
            Welcome,
            <span>
                <?php echo $CustomerName; ?>
            </span>
        </h1>

    </div>

    <!-- DASHBOARD CARDS -->

    <div class="dashboard-grid">

        <!-- PRODUCTS -->

        <div class="dashboard-card">

            <img src="/LCS/img/product.png" alt="Products">

            <h2>Browse Products</h2>

            <p>
                Explore trending fashion collections.
            </p>

            <a href="../Products.php" class="dashboard-btn">
                View Products
            </a>

        </div>

        <!-- CATEGORIES -->

        <div class="dashboard-card">

            <img src="/LCS/img/categories.png" alt="Categories">

            <h2>Shop Categories</h2>

            <p>
                Browse all fashion categories.
            </p>

            <a href="../Categories.php" class="dashboard-btn">
                View Categories
            </a>

        </div>

        <!-- OFFERS -->

        <div class="dashboard-card">

            <img src="/LCS/img/offer.png" alt="Offers">

            <h2>Special Offers</h2>

            <p>
                Get exciting fashion discounts.
            </p>

            <a href="../Offers.php" class="dashboard-btn">
                View Offers
            </a>

        </div>

        <!-- ORDER HISTORY -->

        <div class="dashboard-card">

            <img src="/LCS/img/order.png" alt="Orders">

            <h2>Order History</h2>

            <p>
                Check your previous purchases.
            </p>

            <a href="OrderHistory.php" class="dashboard-btn">
                View Orders
            </a>

        </div>

    </div>

    <!-- LOGOUT -->

    <div class="logout-box">

        <a href="../Logout.php" class="logout-btn">
            Logout
        </a>

    </div>

</div>

<?php include "../Footer.php"; ?>

</body>
</html>