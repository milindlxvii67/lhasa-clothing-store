<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>

<html>

<head>

    <title>Customer Dashboard</title>

    <link rel="stylesheet" href="/LCS/Customer/style.css">

</head>

<body>

<header class="customer-header">

    <a href="/LCS/Customer/index.php"
       class="customer-logo">

        <img src="/LCS/img/logo.png">

        <h1>LHASA CLOTHING STORE</h1>

    </a>

  <nav>

    <ul class="nav-links">

        <li><a href="index.php">Dashboard</a></li>

        <li><a href="Products.php">Products</a></li>

        <li><a href="Categories.php">Categories</a></li>

        <li><a href="Offers.php">Offers</a></li>

        <li><a href="Cart.php">Cart</a></li>

        <li><a href="OrderHistory.php">Orders</a></li>

        <li><a href="Feedback.php">Feedback</a></li>

        <li><a href="History.php">History</a></li>

        <li><a href="Insert.php">Add to Cart</a></li>

        <li><a href="Sample.php">Sample</a></li>

        <li><a href="Logout.php">Logout</a></li>

    </ul>

</nav>

</header>