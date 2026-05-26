<?php
session_start();

if(!isset($_SESSION['ID']))
{
    header("Location: Login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","shopping");

$total = 0;

if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $item)
    {
        $total += $item['price'];
    }
}

if(isset($_POST['btnPlace']))
{
    foreach($_SESSION['cart'] as $item)
    {
        $pid = $item['id'];
        $pname = $item['name'];
        $price = $item['price'];
        $qty = 1;
        $totalprice = $price * $qty;

        $cid = $_SESSION['ID'];

        mysqli_query($con,"
        INSERT INTO orders
        (CustomerId, ProductId, ProductName, Price, Quantity, Total)

        VALUES

        ('$cid','$pid','$pname','$price','$qty','$totalprice')
        ");
    }

    unset($_SESSION['cart']);

    echo "<script>
    alert('Order Placed Successfully');
    window.location='Customer/OrderHistory.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Checkout</title>

<style>

body{
    background:#f4f4f4;
    font-family:Arial;
}

.checkout-box{
    width:500px;
    margin:auto;
    margin-top:100px;
    background:white;
    padding:40px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 5px 10px rgba(0,0,0,0.1);
}

h1{
    margin-bottom:30px;
}

.total{
    font-size:30px;
    color:green;
    margin-bottom:30px;
}

button{
    background:black;
    color:white;
    border:none;
    padding:15px 30px;
    border-radius:5px;
    font-size:18px;
    cursor:pointer;
}

</style>

</head>

<body>

<div class="checkout-box">

<h1>Checkout</h1>

<div class="total">
Total Amount: ₹<?php echo $total; ?>
</div>

<form method="post">

<button type="submit" name="btnPlace">
Place Order
</button>

</form>

</div>

</body>
</html>