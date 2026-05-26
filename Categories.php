<?php

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Database Connection Failed");
}

$sql = "SELECT * FROM category_master";

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Categories - Lhasa Clothing Store</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="main-container">

<?php include "Header.php"; ?>

<section class="section">

    <h2>Trending Categories</h2>

    <div class="card-container">

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {

?>

        <!-- CATEGORY CARD -->

        <div class="card">

            <a href="Products.php?CategoryId=<?php echo $row['CategoryId']; ?>" class="category-link">

                <img src="img/<?php echo $row['Image']; ?>" alt="">

                <h3>
                    <?php echo $row['CategoryName']; ?>
                </h3>

                <p>
                    <?php echo $row['Description']; ?>
                </p>

            </a>

        </div>

<?php

    }
}
else
{
?>

        <h1 style="color:red; text-align:center; width:100%;">
            No Categories Found
        </h1>

<?php
}

mysqli_close($con);

?>

    </div>

</section>

<?php include "Footer.php"; ?>

</div>

</body>
</html>