<?php
$con = mysqli_connect("localhost","root","","shopping");

$sql = "SELECT * FROM Category_Master";

$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Categories</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php include "Header.php"; ?>

<section class="section">

    <h2>Fashion Categories</h2>

    <div class="card-container">

<?php
while($row=mysqli_fetch_array($result))
{
?>

        <a href="Products.php?CategoryId=<?php echo $row['CategoryId']; ?>" class="category-link">

            <div class="card">

                <img src="../Products/<?php echo $row['Image']; ?>">

                <h3><?php echo $row['CategoryName']; ?></h3>

                <p><?php echo $row['Description']; ?></p>

            </div>

        </a>

<?php
}
?>

    </div>

</section>

<?php include "Footer.php"; ?>

</body>
</html>