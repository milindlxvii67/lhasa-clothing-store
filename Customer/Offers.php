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
<link rel="stylesheet" href="../style.css">

<style>

/* OFFERS PAGE */

.offer-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.offer-container{
    max-width:1300px;
    margin:auto;
}

.offer-title{
    text-align:center;
    font-size:55px;
    margin-bottom:50px;
    color:#111;
}

/* GRID */

.offer-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:30px;
}

/* CARD */

.offer-card{
    background:white;
    border-radius:12px;
    padding:40px 30px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
    position:relative;
    overflow:hidden;
}

.offer-card:hover{
    transform:translateY(-10px);
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* TOP TAG */

.offer-badge{
    position:absolute;
    top:20px;
    right:-40px;
    background:red;
    color:white;
    padding:10px 50px;
    transform:rotate(45deg);
    font-size:14px;
    font-weight:bold;
}

/* TITLE */

.offer-card h2{
    font-size:34px;
    color:#00aa55;
    margin-bottom:20px;
}

/* DETAILS */

.offer-detail{
    color:#555;
    font-size:18px;
    line-height:1.7;
    margin-bottom:25px;
}

/* VALID DATE */

.offer-valid{
    font-weight:bold;
    color:#111;
    margin-bottom:25px;
}

/* BUTTON */

.offer-btn{
    display:inline-block;
    background:#111;
    color:white;
    text-decoration:none;
    padding:14px 30px;
    border-radius:6px;
    transition:0.3s;
}

.offer-btn:hover{
    background:#00cc66;
}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="offer-page">

    <div class="offer-container">

        <h1 class="offer-title">

            Special Offers

        </h1>

        <div class="offer-grid">

<?php

while($row=mysqli_fetch_array($result))
{
?>

            <!-- OFFER CARD -->

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

    </div>

</div>

<?php include "Footer.php"; ?>

</body>
</html>