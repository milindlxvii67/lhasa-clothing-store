<?php
session_start();

if(!isset($_SESSION['Admin']))
{
    header("location:../Login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Connection Failed");
}

/* GET CATEGORY ID */

if(isset($_GET['id']))
{
    $Id = $_GET['id'];
}
else
{
    die("Invalid Category ID");
}

/* FETCH CATEGORY */

$sql = "SELECT * FROM category_master WHERE CategoryId='$Id'";

$result = mysqli_query($con,$sql);

if(!$result)
{
    die("SQL Error : ".mysqli_error($con));
}

$row = mysqli_fetch_array($result);

if(!$row)
{
    die("Category Not Found");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Category</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f4f4f4;
}

.container{
    width:100%;
    max-width:600px;
    margin:60px auto;
    background:white;
    padding:40px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h1{
    text-align:center;
    margin-bottom:30px;
}

input,
textarea{
    width:100%;
    padding:14px;
    margin-top:10px;
    margin-bottom:20px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:16px;
}

img{
    width:120px;
    height:120px;
    object-fit:contain;
    margin-bottom:20px;
}

button{
    width:100%;
    padding:15px;
    background:black;
    color:white;
    border:none;
    border-radius:6px;
    font-size:18px;
    cursor:pointer;
}

button:hover{
    background:#00cc66;
    color:black;
}

</style>

</head>

<body>

<div class="container">

<h1>Edit Category</h1>

<form action="UpdateCategory.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="txtId" value="<?php echo $row['CategoryId']; ?>">

<label>Category Name</label>

<input type="text"
name="txtName"
value="<?php echo $row['CategoryName']; ?>"
required>

<label>Description</label>

<textarea name="txtDescription" rows="5"><?php echo $row['Description']; ?></textarea>

<label>Current Image</label>
<br>

<img src="../Category/<?php echo $row['Image']; ?>">

<br><br>

<label>Change Image</label>

<input type="file" name="txtFile">

<button type="submit">

Update Category

</button>

</form>

</div>

</body>

</html>