<?php

session_start();

if(!isset($_SESSION['Admin']))
{
    header("Location: ../Login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="../style.css">

</head>

<body>

<div class="main-container">

<?php include "../Header.php"; ?>

<section class="dashboard-section">

    <div class="dashboard-box">

        <h1>
            Welcome Admin,
            <?php echo $_SESSION['Admin']; ?>
        </h1>

        <div class="dashboard-cards">

            <a href="Category.php" class="dashboard-card">
                <h2>Manage Categories</h2>
            </a>

            <a href="Products.php" class="dashboard-card">
                <h2>Manage Products</h2>
            </a>

            <a href="Orders.php" class="dashboard-card">
                <h2>View Orders</h2>
            </a>

            <a href="Contact.php" class="dashboard-card">
                <h2>Customer Feedback</h2>
            </a>

        </div>

        <a href="../logout.php" class="logout-btn">
            Logout
        </a>

    </div>

</section>

<?php include "../Footer.php"; ?>

</div>

</body>
</html>