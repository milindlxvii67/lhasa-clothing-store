<?php

session_start();

/* =========================
   LOGIN CHECK
========================= */

if(!isset($_SESSION['Customer']))
{
    header("Location: ../Login.php");
    exit();
}

/* =========================
   DATABASE CONNECTION
========================= */

$con = mysqli_connect(
    "localhost",
    "root",
    "",
    "shopping"
);

if(!$con)
{
    die("Database Connection Failed");
}

/* =========================
   PRODUCT ID CHECK
========================= */

if(!isset($_GET['Id']))
{
    die("Invalid Product ID");
}

$Id = intval($_GET['Id']);

/* =========================
   QUANTITY
========================= */

if(isset($_POST['txtQty']))
{
    $Qty = intval($_POST['txtQty']);
}
else
{
    $Qty = 1;
}

if($Qty <= 0)
{
    $Qty = 1;
}

/* =========================
   FETCH PRODUCT
========================= */

$sql = "SELECT * FROM item_master
        WHERE ItemId='$Id'";

$result = mysqli_query($con, $sql);

if(!$result)
{
    die(mysqli_error($con));
}

if(mysqli_num_rows($result) == 0)
{
    die("Product Not Found");
}

$row = mysqli_fetch_assoc($result);

/* =========================
   PRODUCT DETAILS
========================= */

$ItemName = $row['ItemName'];

$Price = $row['Price'];

$Image = $row['Image'];

$Total = $Price * $Qty;

$CustomerName = $_SESSION['Customer'];

$OrderDate = date("Y-m-d H:i:s");

/* =========================
   INSERT INTO CART
========================= */

$insert = "INSERT INTO shopping_cart
(
    CustomerName,
    ItemName,
    Quantity,
    Price,
    Total,
    OrderDate,
    Image
)

VALUES
(
    '$CustomerName',
    '$ItemName',
    '$Qty',
    '$Price',
    '$Total',
    '$OrderDate',
    '$Image'
)";

$insertResult = mysqli_query($con, $insert);

if(!$insertResult)
{
    die(mysqli_error($con));
}

/* =========================
   SUCCESS
========================= */

echo "

<script>

alert('Item Added To Cart Successfully');

window.location='Products.php';

</script>

";

?>