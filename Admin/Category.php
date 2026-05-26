<?php

$con = mysqli_connect("localhost","root","","shopping");

$sql = "SELECT * FROM Category_Master";

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Manage Categories</title>
<link rel="stylesheet" href="style.css">

<style>

/* PAGE */

.admin-category-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.admin-container{
    max-width:1400px;
    margin:auto;
}

/* HEADER */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:50px;
    flex-wrap:wrap;
    gap:20px;
}

.page-title{
    font-size:60px;
    color:#111;
}

/* ADD BUTTON */

.add-category-btn{
    background:#111;
    color:white;
    text-decoration:none;
    padding:15px 30px;
    border-radius:6px;
    transition:0.3s;
    font-size:18px;
}

.add-category-btn:hover{
    background:#00cc66;
}

/* GRID */

.category-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:35px;
}

/* CARD */

.category-card{
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.category-card:hover{
    transform:translateY(-10px);
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* IMAGE */

.category-card img{
    width:100%;
    height:300px;
    object-fit:cover;
}

/* CONTENT */

.category-content{
    padding:30px;
    text-align:center;
}

.category-content h2{
    font-size:38px;
    margin-bottom:15px;
    color:#111;
}

.category-content p{
    color:#666;
    font-size:18px;
    line-height:1.7;
    margin-bottom:30px;
}

/* BUTTONS */

.card-buttons{
    display:flex;
    justify-content:center;
    gap:15px;
    flex-wrap:wrap;
}

.edit-btn,
.delete-btn{
    padding:14px 28px;
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

<div class="admin-category-page">

    <div class="admin-container">

        <!-- HEADER -->

        <div class="page-header">

            <h1 class="page-title">

                Manage Categories

            </h1>

            <a href="InsertCategory.php" class="add-category-btn">

                + Add New Category

            </a>

        </div>

        <!-- GRID -->

        <div class="category-grid">

<?php

while($row=mysqli_fetch_array($result))
{
?>

            <!-- CARD -->

            <div class="category-card">

                <img src="../Products/<?php echo $row['Image']; ?>">

                <div class="category-content">

                    <h2>

                        <?php echo $row['CategoryName']; ?>

                    </h2>

                    <p>

                        <?php echo $row['Description']; ?>

                    </p>

                    <!-- BUTTONS -->

                    <div class="card-buttons">

                        <a href="EditCategory.php?id=<?php echo $row['CategoryId']; ?>" class="edit-btn">

                            Edit

                        </a>

                        <a href="DeleteCategory.php?id=<?php echo $row['CategoryId']; ?>" class="delete-btn">

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

<?php include "Footer.php"; ?>

</body>
</html>