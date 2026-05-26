<?php

session_start();

include "../config.php";

/* =========================
   LOGIN CHECK
========================= */

if(!isset($_SESSION['Customer']))
{
    header("Location: ../Login.php");
    exit();
}

/* =========================
   PRODUCT ID CHECK
========================= */

if(!isset($_GET['Id']))
{
    header("Location: Products.php");
    exit();
}

$Id = intval($_GET['Id']);

/* =========================
   QUANTITY CHECK
========================= */

if(!isset($_POST['txtQty']))
{
    die("Quantity Missing");
}

$Qty = intval($_POST['txtQty']);

if($Qty <= 0)
{
    die("Invalid Quantity");
}

/* =========================
   FETCH PRODUCT
========================= */

$query = "SELECT * FROM products WHERE Id='$Id'";

$result = mysqli_query($conn, $query);

if(!$result)
{
    die(mysqli_error($conn));
}

if(mysqli_num_rows($result) == 0)
{
    die("Product Not Found");
}

$row = mysqli_fetch_assoc($result);

/* =========================
   PRODUCT DATA
========================= */

$ProductName = $row['ProductName'];

$Price = $row['Price'];

$Image = $row['Image'];

$Total = $Price * $Qty;

$OrderDate = date("Y-m-d H:i:s");

$CustomerName = $_SESSION['Customer'];

/* =========================
   INSERT INTO CART
========================= */

$insert = "INSERT INTO cart
(
    CustomerName,
    ProductName,
    Quantity,
    Price,
    Total,
    OrderDate,
    Image
)

VALUES
(
    '$CustomerName',
    '$ProductName',
    '$Qty',
    '$Price',
    '$Total',
    '$OrderDate',
    '$Image'
)";

$insertResult = mysqli_query($conn, $insert);

if(!$insertResult)
{
    die(mysqli_error($conn));
}

/* =========================
   SUCCESS
========================= */

echo "
<script>

alert('Item Added To Cart Successfully');

window.location='../Products.php';

</script>
";

?>