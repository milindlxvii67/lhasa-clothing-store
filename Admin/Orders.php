<?php

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Database Connection Failed");
}

/*
CHANGE TABLE NAME IF NEEDED
*/

$table = "shopping_cart_final";
$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $sql = "SELECT * FROM $table
            WHERE OrderId LIKE '%$search%'";
}
else
{
    $sql = "SELECT * FROM $table";
}

$result = mysqli_query($con,$sql);

if(!$result)
{
    die("SQL Error : " . mysqli_error($con));
}

$totalOrders = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Manage Orders</title>

<link rel="stylesheet" href="style.css">

<style>

/* PAGE */

.admin-orders-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.admin-container{
    max-width:1500px;
    margin:auto;
}

/* HEADER */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:40px;
    flex-wrap:wrap;
    gap:20px;
}

.page-title{
    font-size:60px;
    color:#111;
}

/* TOTAL */

.total-orders{
    background:#111;
    color:white;
    padding:15px 30px;
    border-radius:6px;
    font-size:18px;
}

/* SEARCH */

.search-box{
    margin-bottom:40px;
}

.search-form{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.search-form input{
    flex:1;
    padding:15px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:16px;
}

.search-form button{
    background:#111;
    color:white;
    border:none;
    padding:15px 30px;
    border-radius:6px;
    cursor:pointer;
    transition:0.3s;
}

.search-form button:hover{
    background:#00cc66;
}

/* TABLE */

.order-table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* HEAD */

.order-table th{
    background:#111;
    color:white;
    padding:20px;
    font-size:18px;
}

/* BODY */

.order-table td{
    padding:20px;
    text-align:center;
    border-bottom:1px solid #eee;
}

.order-table tr:hover{
    background:#f9f9f9;
}

/* STATUS */

.pending{
    background:orange;
    color:white;
    padding:8px 18px;
    border-radius:20px;
    font-size:14px;
}

/* BUTTONS */

.action-buttons{
    display:flex;
    justify-content:center;
    gap:10px;
    flex-wrap:wrap;
}

.view-btn,
.delete-btn{
    padding:10px 18px;
    border-radius:6px;
    text-decoration:none;
    color:white;
    transition:0.3s;
}

.view-btn{
    background:#111;
}

.view-btn:hover{
    background:#00cc66;
}

.delete-btn{
    background:red;
}

.delete-btn:hover{
    background:#cc0000;
}

/* EMPTY */

.no-orders{
    background:white;
    padding:60px;
    text-align:center;
    border-radius:12px;
    font-size:30px;
    color:#999;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* MOBILE */

@media(max-width:768px){

    .page-title{
        font-size:40px;
    }

    .order-table{
        display:block;
        overflow-x:auto;
    }

}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="admin-orders-page">

    <div class="admin-container">

        <!-- HEADER -->

        <div class="page-header">

            <h1 class="page-title">

                Manage Orders

            </h1>

            <div class="total-orders">

                Total Orders:
                <?php echo $totalOrders; ?>

            </div>

        </div>

        <!-- SEARCH -->

        <div class="search-box">

            <form method="GET" class="search-form">

                <input
                type="text"
                name="search"
                placeholder="Search orders..."
                value="<?php echo $search; ?>">

                <button type="submit">

                    Search

                </button>

            </form>

        </div>

<?php

if($totalOrders > 0)
{
?>

        <!-- TABLE -->

        <table class="order-table">

            <tr>

                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>

            </tr>

<?php

while($row=mysqli_fetch_array($result))
{
?>

            <tr>

                <td>

                    #<?php echo $row['OrderId']; ?>

                </td>

                <td>

                    <?php echo $row['CustomerId']; ?>

                </td>

                <td>

                    <?php echo $row['OrderDate']; ?>

                </td>

                <td>

                    ₹<?php echo $row['TotalAmount']; ?>

                </td>

                <td>

                    <span class="pending">

                        Pending

                    </span>

                </td>

                <td>

                    <div class="action-buttons">

                        <a href="Detail.php?id=<?php echo $row['OrderId']; ?>" class="view-btn">

                            View

                        </a>

                        <a
                        href="DeleteOrder.php?id=<?php echo $row['OrderId']; ?>"
                        class="delete-btn"
                        onclick="return confirm('Delete this order?')">

                            Delete

                        </a>

                    </div>

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

        <!-- EMPTY -->

        <div class="no-orders">

            No Orders Found

        </div>

<?php
}
?>

    </div>

</div>

<?php include "../Footer.php"; ?>

</body>
</html>