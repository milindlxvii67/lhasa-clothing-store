<?php

session_start();

if(!isset($_SESSION['CustomerId']))
{
    header("Location: Login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Database Connection Failed");
}

$CustomerId = $_SESSION['CustomerId'];

$sql = "SELECT * FROM customer_registration WHERE CustomerId='$CustomerId'";

$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Profile - Lhasa Clothing Store</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include "Header.php"; ?>

<div class="profile-page">

    <div class="profile-card">

        <h1>My Profile</h1>

        <div class="profile-details">

            <div class="profile-row">
                <span>Customer ID</span>
                <p><?php echo $row['CustomerId']; ?></p>
            </div>

            <div class="profile-row">
                <span>Name</span>
                <p><?php echo $row['CustomerName']; ?></p>
            </div>

            <div class="profile-row">
                <span>Email</span>
                <p><?php echo $row['Email']; ?></p>
            </div>

            <div class="profile-row">
                <span>Mobile</span>
                <p><?php echo $row['Mobile']; ?></p>
            </div>

            <div class="profile-row">
                <span>Address</span>
                <p><?php echo $row['Address']; ?></p>
            </div>

            <div class="profile-row">
                <span>City</span>
                <p><?php echo $row['City']; ?></p>
            </div>

        </div>

        <a href="Logout.php" class="profile-logout-btn">
            Logout
        </a>

    </div>

</div>

<?php include "Footer.php"; ?>

</body>
</html>

<?php

mysqli_close($con);

?>