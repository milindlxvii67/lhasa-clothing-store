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

   <nav class="customer-nav">

    <a href="/LCS/Customer/index.php">
        Home
    </a>

    <a href="/LCS/Customer/Categories.php">
        Categories
    </a>

    <a href="/LCS/Customer/Products.php">
        Products
    </a>

    <a href="/LCS/Customer/Offers.php">
        Offers
    </a>

    <a href="/LCS/Customer/Cart.php">
        Cart
    </a>

    <a href="/LCS/Customer/OrderHistory.php">
        Orders
    </a>

    <a href="/LCS/Contact.php">
        Contact
    </a>

    <a href="/LCS/Customer/profile.php">
        Profile
    </a>

    <a href="/LCS/Logout.php">
        Logout
    </a>

</nav>

</header>