<?php

$con = mysqli_connect("localhost","root","","shopping");

$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $sql = "SELECT * FROM item_master 
            WHERE ItemName LIKE '%$search%'";
}
else
{
    $sql = "SELECT * FROM item_master";
}

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Manage Products</title>
<link rel="stylesheet" href="style.css">

<style>

/* PAGE */

.admin-products-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.admin-container{
    max-width:1450px;
    margin:auto;
}

/* HEADER */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:20px;
    margin-bottom:40px;
}

.page-title{
    font-size:60px;
    color:#111;
}

/* ADD BUTTON */

.add-product-btn{
    background:#111;
    color:white;
    text-decoration:none;
    padding:15px 30px;
    border-radius:6px;
    transition:0.3s;
    font-size:18px;
}

.add-product-btn:hover{
    background:#00cc66;
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

/* GRID */

.product-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:35px;
}

/* CARD */

.product-card{
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.product-card:hover{
    transform:translateY(-10px);
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* IMAGE */

.product-card img{
    width:100%;
    height:320px;
    object-fit:cover;
}

/* CONTENT */

.product-content{
    padding:30px;
}

.product-content h2{
    font-size:34px;
    margin-bottom:15px;
    color:#111;
}

.product-description{
    color:#666;
    line-height:1.7;
    margin-bottom:20px;
}

/* PRICE */

.price-box{
    margin-bottom:20px;
}

.old-price{
    text-decoration:line-through;
    color:red;
    margin-right:10px;
}

.new-price{
    color:#00aa55;
    font-size:26px;
    font-weight:bold;
}

/* STOCK */

.stock{
    display:inline-block;
    background:#00cc66;
    color:white;
    padding:8px 18px;
    border-radius:20px;
    margin-bottom:25px;
}

/* BUTTONS */

.card-buttons{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.edit-btn,
.delete-btn{
    flex:1;
    text-align:center;
    padding:14px;
    border-radius:6px;
    text-decoration:none;
    color:white;
    transition:0.3s;
}

.edit-btn{
    background:#111;
}

.edit-btn:hover{
    background:#00cc66;
}

.delete-btn{
    background:red;
}

.delete-btn:hover{
    background:#cc0000;
}

/* MOBILE */

@media(max-width:768px){

    .page-title{
        font-size:40px;
    }

}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="admin-products-page">

    <div class="admin-container">

        <!-- HEADER -->

        <div class="page-header">

            <h1 class="page-title">

                Manage Products

            </h1>

            <a href="Insertproduct.php" class="add-product-btn">

                + Add Product

            </a>

        </div>

        <!-- SEARCH -->

        <div class="search-box">

            <form method="GET" class="search-form">

                <input 
                type="text"
                name="search"
                placeholder="Search products..."
                value="<?php echo $search; ?>">

                <button type="submit">

                    Search

                </button>

            </form>

        </div>

        <!-- PRODUCT GRID -->

        <div class="product-grid">

<?php

while($row=mysqli_fetch_array($result))
{
?>

            <!-- PRODUCT CARD -->

            <div class="product-card">

                <img src="../Products/<?php echo $row['Image']; ?>">

                <div class="product-content">

                    <h2>

                        <?php echo $row['ItemName']; ?>

                    </h2>

                    <p class="product-description">

                        <?php echo $row['Description']; ?>

                    </p>

                    <!-- PRICE -->

                    <div class="price-box">

                        <span class="old-price">

                            ₹<?php echo $row['Price']; ?>

                        </span>

                        <span class="new-price">

                            ₹<?php echo $row['Total']; ?>

                        </span>

                    </div>

                    <!-- STOCK -->

                    <div class="stock">

                        In Stock

                    </div>

                    <!-- BUTTONS -->

                    <div class="card-buttons">

                        <a href="EditProduct.php?id=<?php echo $row['ItemId']; ?>" class="edit-btn">

                            Edit

                        </a>

                        <a 
                        href="DeleteProduct.php?id=<?php echo $row['ItemId']; ?>"
                        class="delete-btn"
                        onclick="return confirm('Delete this product?')">

                            Delete

                        </a>

                    </div>

                </div>

            </div>

<?php
}
?>

        </div>

    </div>

</div>

<?php include "../Footer.php"; ?>

</body>
</html>