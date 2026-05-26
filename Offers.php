<?php

$con = mysqli_connect("localhost","root","","shopping");

$sql = "SELECT * FROM Offer_Master";

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Offers - Lhasa Clothing Store</title>
<link rel="stylesheet" href="style.css">

<style>

/* OFFERS PAGE */

.offers-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.offers-container{
    max-width:1300px;
    margin:auto;
}

/* TITLE */

.offers-title{
    text-align:center;
    font-size:60px;
    margin-bottom:60px;
    color:#111;
}

/* GRID */

.offer-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(350px,1fr));
    gap:35px;
}

/* OFFER CARD */

.offer-card{
    background:white;
    border-radius:15px;
    padding:40px 35px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
    position:relative;
    overflow:hidden;
}

.offer-card:hover{
    transform:translateY(-10px);
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* BADGE */

.offer-badge{
    position:absolute;
    top:20px;
    right:-45px;
    background:red;
    color:white;
    padding:10px 55px;
    transform:rotate(45deg);
    font-size:14px;
    font-weight:bold;
}

/* TITLE */

.offer-card h2{
    font-size:36px;
    color:#00aa55;
    margin-bottom:20px;
}

/* DETAILS */

.offer-detail{
    color:#555;
    font-size:19px;
    line-height:1.7;
    margin-bottom:25px;
}

/* VALID */

.offer-valid{
    font-weight:bold;
    margin-bottom:30px;
    color:#111;
}

/* BUTTON */

.offer-btn{
    display:inline-block;
    background:#111;
    color:white;
    text-decoration:none;
    padding:14px 32px;
    border-radius:6px;
    transition:0.3s;
}

.offer-btn:hover{
    background:#00cc66;
}

/* EXTRA SECTION */

.sale-section{
    margin-top:80px;
    background:#00cc66;
    padding:80px 20px;
    border-radius:15px;
    text-align:center;
    color:white;
}

.sale-section h1{
    font-size:60px;
    margin-bottom:20px;
}

.sale-section p{
    font-size:24px;
}

/* MOBILE */

@media(max-width:768px){

    .offers-title{
        font-size:40px;
    }

    .sale-section h1{
        font-size:40px;
    }

}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="offers-page">

    <div class="offers-container">

        <!-- TITLE -->

        <h1 class="offers-title">

            Latest Fashion Offers

        </h1>

        <!-- OFFERS -->

        <div class="offer-grid">

<?php

while($row=mysqli_fetch_array($result))
{
?>

            <div class="offer-card">

                <div class="offer-badge">

                    SALE

                </div>

                <h2>

                    <?php echo $row['Offer']; ?>

                </h2>

                <p class="offer-detail">

                    <?php echo $row['Detail']; ?>

                </p>

                <p class="offer-valid">

                    Valid Till:
                    <?php echo $row['Valid']; ?>

                </p>

                <a href="Products.php" class="offer-btn">

                    Shop Now

                </a>

            </div>

<?php
}
?>

        </div>

        <!-- EXTRA SECTION -->

        <div class="sale-section">

            <h1>Big Fashion Sale</h1>

            <p>
                Get Exciting Discounts On Trending Fashion Collections
            </p>

        </div>

    </div>

</div>

<?php include "Footer.php"; ?>

</body>
</html>