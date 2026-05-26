<?php

$con = mysqli_connect("localhost","root","","shopping");

$ItemName = $_POST['txtItemName'];
$Description = $_POST['txtDescription'];
$Size = $_POST['txtSize'];
$Price = $_POST['txtPrice'];
$Discount = $_POST['txtDiscount'];
$Total = $_POST['txtTotal'];
$CategoryId = $_POST['cmbCategory'];

$ImageName = $_FILES['txtImage']['name'];
$ImageTmp = $_FILES['txtImage']['tmp_name'];

move_uploaded_file($ImageTmp,"Products/".$ImageName);

$sql = "INSERT INTO item_master
(ItemName, Description, Size, Image, Price, Discount, Total, CategoryId)
VALUES
('$ItemName','$Description','$Size','$ImageName','$Price','$Discount','$Total','$CategoryId')";

mysqli_query($con,$sql);

mysqli_close($con);

echo '<script>alert("Product Added Successfully");window.location="Products.php";</script>';

?>