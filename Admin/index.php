<?php

session_start();

if(!isset($_SESSION['Admin']))
{
    header("Location: ../Login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<?php include "Header.php"; ?>

<div class="admin-page">

    <div class="dashboard-title">

        <h1>
            Welcome Admin,
            <?php echo $_SESSION['Admin']; ?>
        </h1>

        <p>
            Manage your Lhasa Clothing Store easily.
        </p>

    </div>

    <div class="dashboard-grid">

        <a href="Category.php" class="dashboard-card">

            <h2>📂</h2>

            <h3>Manage Categories</h3>

            <p>Add, Edit & Delete Categories</p>

        </a>

        <a href="Products.php" class="dashboard-card">

            <h2>🛍️</h2>

            <h3>Manage Products</h3>

            <p>Add & Update Product Collection</p>

        </a>

        <a href="Orders.php" class="dashboard-card">

            <h2>📦</h2>

            <h3>View Orders</h3>

            <p>Track Customer Orders</p>

        </a>

        <a href="User.php" class="dashboard-card">

            <h2>👥</h2>

            <h3>Users</h3>

            <p>Manage Registered Users</p>

        </a>

        <a href="Feedback.php" class="dashboard-card">

            <h2>⭐</h2>

            <h3>Customer Feedback</h3>

            <p>View Customer Reviews</p>

        </a>

        <a href="Offers.php" class="dashboard-card">

            <h2>🔥</h2>

            <h3>Offers</h3>

            <p>Manage Special Discounts</p>

        </a>

    </div>

</div>

<?php include "../Footer.php"; ?>

</body>
</html>