<?php

session_start();

if(!isset($_SESSION['Customer']))
{
    header("Location: ../Login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","shopping");

if(!isset($_GET['id']))
{
    die("Invalid Order");
}

$OrderId = intval($_GET['id']);

$sql = "UPDATE orders

SET

Status='Cancelled',

Tracking='Order Cancelled By Customer'

WHERE OrderId='$OrderId'";

mysqli_query($con,$sql);

?>

<script>

alert("Order Cancelled Successfully");

window.location="OrderHistory.php";

</script>