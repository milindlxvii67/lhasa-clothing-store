<?php

$con = mysqli_connect("localhost","root","","shopping");

$sql = "SELECT * FROM Feedback_Master";

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Customer Feedback</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php include "Header.php"; ?>

<section class="section">

<h2>Customer Feedback</h2>

<div class="offer-grid">

<?php

while($row=mysqli_fetch_array($result))
{
?>

<div class="offer-card">

<h3>

Customer Feedback

</h3>

<p class="offer-detail">

<?php echo $row['Feedback']; ?>

</p>

<a href="DeleteFeedback.php?id=<?php echo $row['FeedbackId']; ?>" class="logout-btn">

Delete

</a>

</div>

<?php
}
?>

</div>

</section>

<?php include "Footer.php"; ?>

</body>
</html>