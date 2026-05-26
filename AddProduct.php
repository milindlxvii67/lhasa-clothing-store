<?php

session_start();

/* ADMIN SECURITY */

if(!isset($_SESSION['Admin']))
{
    header("location:login.php");
    exit();
}

/* DATABASE CONNECTION */

$con = mysqli_connect("localhost","root","","shopping");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>
Admin Panel - Add Product
</title>

<link rel="stylesheet" href="style.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

/* PAGE */

.admin-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:50px 20px;
}

/* CONTAINER */

.admin-container{
    max-width:1300px;
    margin:auto;
    display:flex;
    gap:30px;
    flex-wrap:wrap;
}

/* SIDEBAR */

.admin-sidebar{
    width:260px;
    background:#111;
    border-radius:15px;
    padding:35px 25px;
    color:white;
    height:fit-content;
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

.admin-sidebar h2{
    color:#00cc66;
    margin-bottom:35px;
    text-align:center;
    font-size:32px;
}

.admin-sidebar ul{
    list-style:none;
}

.admin-sidebar ul li{
    margin-bottom:18px;
}

.admin-sidebar ul li a{
    color:white;
    text-decoration:none;
    display:block;
    padding:14px 16px;
    border-radius:8px;
    transition:0.3s;
    font-size:17px;
}

.admin-sidebar ul li a:hover{
    background:#00cc66;
    color:#111;
}

/* MAIN CONTENT */

.admin-content{
    flex:1;
    background:white;
    border-radius:15px;
    padding:45px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.admin-content h1{
    margin-bottom:35px;
    color:#111;
    font-size:48px;
}

/* FORM GRID */

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:25px;
}

/* INPUT GROUP */

.input-group{
    display:flex;
    flex-direction:column;
}

.input-group label{
    margin-bottom:10px;
    font-weight:bold;
    color:#222;
    font-size:17px;
}

.input-group input,
.input-group textarea,
.input-group select{
    padding:15px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
    transition:0.3s;
}

.input-group input:focus,
.input-group textarea:focus,
.input-group select:focus{
    border-color:#00cc66;
    outline:none;
    box-shadow:0 0 5px rgba(0,204,102,0.3);
}

.input-group textarea{
    height:140px;
    resize:none;
}

/* FULL WIDTH */

.full-width{
    grid-column:1 / 3;
}

/* BUTTON */

.add-btn{
    background:#111;
    color:white;
    border:none;
    padding:16px 35px;
    border-radius:8px;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
}

.add-btn:hover{
    background:#00cc66;
    color:#111;
}

/* FILE INPUT */

input[type="file"]{
    background:#fff;
    padding:12px;
}

/* MOBILE */

@media(max-width:900px){

    .admin-container{
        flex-direction:column;
    }

    .admin-sidebar{
        width:100%;
    }

    .form-grid{
        grid-template-columns:1fr;
    }

    .full-width{
        grid-column:1;
    }

    .admin-content h1{
        font-size:36px;
    }

}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="admin-page">

    <div class="admin-container">

        <!-- SIDEBAR -->

        <div class="admin-sidebar">

            <h2>
                Admin Panel
            </h2>

            <ul>

                <li>
                    <a href="index.php">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="Products.php">
                        View Products
                    </a>
                </li>

                <li>
                    <a href="add_product.php">
                        Add Product
                    </a>
                </li>

                <li>
                    <a href="Category.php">
                        Categories
                    </a>
                </li>

                <li>
                    <a href="Offers.php">
                        Offers
                    </a>
                </li>

                <li>
                    <a href="../logout.php">
                        Logout
                    </a>
                </li>

            </ul>

        </div>

        <!-- MAIN CONTENT -->

        <div class="admin-content">

            <h1>
                Add New Product
            </h1>

            <form action="insert_product.php" method="post" enctype="multipart/form-data">

                <div class="form-grid">

                    <!-- PRODUCT NAME -->

                    <div class="input-group">

                        <label>
                            Product Name
                        </label>

                        <input type="text" name="txtItemName" required>

                    </div>

                    <!-- SIZE -->

                    <div class="input-group">

                        <label>
                            Product Size
                        </label>

                        <input type="text" name="txtSize" required>

                    </div>

                    <!-- DESCRIPTION -->

                    <div class="input-group full-width">

                        <label>
                            Description
                        </label>

                        <textarea name="txtDescription" required></textarea>

                    </div>

                    <!-- ORIGINAL PRICE -->

                    <div class="input-group">

                        <label>
                            Original Price
                        </label>

                        <input type="number" name="txtPrice" required>

                    </div>

                    <!-- DISCOUNT -->

                    <div class="input-group">

                        <label>
                            Discount (%)
                        </label>

                        <input type="number" name="txtDiscount" required>

                    </div>

                    <!-- FINAL PRICE -->

                    <div class="input-group">

                        <label>
                            Final Price
                        </label>

                        <input type="number" name="txtTotal" required>

                    </div>

                    <!-- CATEGORY -->

                    <div class="input-group">

                        <label>
                            Select Category
                        </label>

                        <select name="cmbCategory" required>

                            <option value="">
                                Select Category
                            </option>

                            <?php

                            $sql = "SELECT * FROM category_master";

                            $result = mysqli_query($con,$sql);

                            while($row = mysqli_fetch_array($result))
                            {
                            ?>

                            <option value="<?php echo $row['CategoryId']; ?>">

                                <?php echo $row['CategoryName']; ?>

                            </option>

                            <?php
                            }
                            ?>

                        </select>

                    </div>

                    <!-- IMAGE -->

                    <div class="input-group full-width">

                        <label>
                            Upload Product Image
                        </label>

                        <input type="file" name="txtImage" required>

                    </div>

                    <!-- BUTTON -->

                    <div class="full-width">

                        <button type="submit" class="add-btn">

                            Add Product

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<?php include "Footer.php"; ?>

</body>
</html>