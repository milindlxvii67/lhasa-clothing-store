<?php

session_start();

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Database Connection Failed");
}

$sql = "SELECT * FROM orders ORDER BY OrderId DESC";

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Order History</title>

<link rel="stylesheet" href="../style.css">

<style>

.order-container{
    width:90%;
    margin:60px auto;
    min-height:500px;
}

.order-title{
    text-align:center;
    font-size:45px;
    margin-bottom:40px;
}

.order-table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.order-table th{
    background:black;
    color:white;
    padding:18px;
    font-size:18px;
}

.order-table td{
    padding:18px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

.order-table tr:hover{
    background:#f5f5f5;
}

.no-orders{
    text-align:center;
    color:red;
    font-size:25px;
    margin-top:50px;
}

</style>

</head>

<body>

<div class="main-container">

<!-- HEADER -->

<?php include "../Header.php"; ?>

<div class="order-container">

<h1 class="order-title">
My Orders
</h1>

<?php

if(mysqli_num_rows($result) > 0)
{
?>

<table class="order-table">

<tr>

<th>Order ID</th>
<th>Product Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th>Order Date</th>

</tr>

<?php

while($row = mysqli_fetch_array($result))
{
?>

<tr>

<td>
<?php echo $row['OrderId']; ?>
</td>

<td>
<?php echo $row['ProductName']; ?>
</td>

<td>
₹<?php echo $row['Price']; ?>
</td>

<td>
<?php echo $row['Quantity']; ?>
</td>

<td>
₹<?php echo $row['Total']; ?>
</td>

<td>
<?php echo $row['OrderDate']; ?>
</td>

</tr>

<?php
}
?>

</table>

<?php
}
else
{
?>

<h2 class="no-orders">
No Orders Found
</h2>

<?php
}

mysqli_close($con);

?>

</div>

<!-- FOOTER -->

<?php include "../Footer.php"; ?>

</div>

</body>
</html>