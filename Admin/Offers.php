<?php

$con = mysqli_connect("localhost","root","","shopping");

$sql = "SELECT * FROM Offer_Master";

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Manage Offers</title>
<link rel="stylesheet" href="../style.css">

<style>

/* PAGE */

.admin-offers-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.admin-container{
    max-width:1400px;
    margin:auto;
}

/* HEADER */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:50px;
    flex-wrap:wrap;
    gap:20px;
}

.page-title{
    font-size:60px;
    color:#111;
}

/* ADD BUTTON */

.add-offer-btn{
    background:#111;
    color:white;
    text-decoration:none;
    padding:15px 30px;
    border-radius:6px;
    transition:0.3s;
    font-size:18px;
}

.add-offer-btn:hover{
    background:#00cc66;
}

/* GRID */

.offer-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(350px,1fr));
    gap:35px;
}

/* CARD */

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

/* OFFER TITLE */

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

/* DATE */

.offer-valid{
    font-weight:bold;
    margin-bottom:30px;
    color:#111;
}

/* BUTTONS */

.card-buttons{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.edit-btn,
.delete-btn{
    padding:14px 28px;
    border-radius:6px;
    color:white;
    text-decoration:none;
    transition:0.3s;
}

.edit-btn{
    background:#111;
}

.edit-btn:hover{
    background:#00cc66;
}

.delete-btn{
    background:red;
}

.delete-btn:hover{
    background:#cc0000;
}

/* MOBILE */

@media(max-width:768px){

    .page-title{
        font-size:40px;
    }

}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="admin-offers-page">

    <div class="admin-container">

        <!-- HEADER -->

        <div class="page-header">

            <h1 class="page-title">

                Manage Offers

            </h1>

            <a href="InsertOffer.php" class="add-offer-btn">

                + Add New Offer

            </a>

        </div>

        <!-- GRID -->

        <div class="offer-grid">

<?php

while($row=mysqli_fetch_array($result))
{
?>

            <!-- CARD -->

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

                <!-- BUTTONS -->

                <div class="card-buttons">

                    <a href="EditOffer.php?id=<?php echo $row['OfferId']; ?>" class="edit-btn">

                        Edit

                    </a>

                    <a href="DeleteOffer.php?id=<?php echo $row['OfferId']; ?>" class="delete-btn">

                        Delete

                    </a>

                </div>

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