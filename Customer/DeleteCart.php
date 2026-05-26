<?php

session_start();

if(!isset($_SESSION['Customer']))
{
    header("Location: ../Login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Database Connection Failed");
}

/* =========================
   CHECK ID
========================= */

if(!isset($_GET['id']))
{
    die("Invalid Cart ID");
}

$CartId = intval($_GET['id']);

/* =========================
   DELETE ITEM
========================= */

$sql = "DELETE FROM shopping_cart WHERE CartId='$CartId'";

$result = mysqli_query($con,$sql);

if(!$result)
{
    die(mysqli_error($con));
}

/* =========================
   SUCCESS
========================= */

echo "

<script>

alert('Item Deleted Successfully');

window.location='Cart.php';

</script>

";

?>