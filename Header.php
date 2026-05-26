<?php

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lhasa Clothing Store</title>

    <link rel="stylesheet" href="/LCS/style.css">

</head>

<body>

<header class="header">

    <!-- LOGO -->

    <a href="/LCS/index.php" class="logo">

        <img src="/LCS/img/logo.png" alt="Logo">

        <h1>LHASA CLOTHING STORE</h1>

    </a>

    <!-- NAVBAR -->

    <nav class="navbar">

        <a href="/LCS/index.php">Home</a>

        <a href="/LCS/Categories.php">Categories</a>

        <a href="/LCS/Products.php">Products</a>

        <a href="/LCS/AddProduct.php">Add Product</a>

        <a href="/LCS/Offers.php">Offers</a>

        <a href="/LCS/Contact.php">Contact</a>

<?php

if(isset($_SESSION['CustomerId']) || isset($_SESSION['AdminId']))
{
?>

        <a href="/LCS/Profile.php">Profile</a>

        <a href="/LCS/Logout.php">Logout</a>

<?php
}
else
{
?>

        <a href="/LCS/Login.php">Login</a>

        <a href="/LCS/Register.php">Register</a>

<?php
}
?>

    </nav>

</header>