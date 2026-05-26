<?php

session_start();

if(!isset($_SESSION['Customer']))
{
    header("Location: ../Login.php");
    exit();
}

$CustomerName = $_SESSION['Customer'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Fashion Collection</title>

<link rel="stylesheet" href="/LCS/Customer/style.css">

</head>

<body>

<?php include "Header.php"; ?>

<div class="sample-container">

    <h1 class="page-title">
        Welcome, <?php echo $CustomerName; ?>
    </h1>

    <h2 class="sample-heading">
        Trending Fashion Collection
    </h2>

    <div class="sample-grid">

        <!-- JEANS -->

        <div class="sample-card">

            <img src="/LCS/Customer/img/pants.png">

            <h3>Jeans</h3>

            <p>
                Stylish premium denim collection.
            </p>

        </div>

        <!-- BLAZERS -->

        <div class="sample-card">

            <img src="/LCS/Customer/img/suit.png">

            <h3>Blazers</h3>

            <p>
                Elegant formal blazer designs.
            </p>

        </div>

        <!-- TSHIRTS -->

        <div class="sample-card">

            <img src="/LCS/Customer/img/t-shirt.png">

            <h3>T-Shirts</h3>

            <p>
                Comfortable and trendy t-shirts.
            </p>

        </div>

    </div>

</div>

<?php include "../Footer.php"; ?>

</body>
</html>