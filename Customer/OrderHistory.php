<?php

session_start();

if(!isset($_SESSION['Customer']))
{
    header("Location: ../Login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Order History</title>

<link rel="stylesheet" href="style.css">

<style>

/* HISTORY PAGE */

.history-container{
    width:90%;
    max-width:1200px;
    margin:60px auto;
    min-height:60vh;
}

.history-title{
    text-align:center;
    font-size:60px;
    font-weight:bold;
    margin-bottom:50px;
    color:#111;
}

.history-empty{
    background:#ffffff;
    padding:60px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.history-empty h2{
    font-size:40px;
    margin-bottom:20px;
    color:#222;
}

.history-empty p{
    font-size:22px;
    color:#666;
}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="history-container">

    <h1 class="history-title">
        Order History
    </h1>

    <div class="history-empty">

        <h2>Your Orders</h2>

        <p>
            Purchased fashion items history will appear here.
        </p>

    </div>

</div>

<?php include "../Footer.php"; ?>

</body>
</html>