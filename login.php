<?php

session_start();

include __DIR__ . "/config.php";

/* =========================
   AUTO REDIRECT IF LOGGED IN
========================= */

if(isset($_SESSION['Admin']))
{
    header("Location: Admin/index.php");
    exit();
}

if(isset($_SESSION['Customer']))
{
    header("Location: Customer/index.php");
    exit();
}

$error = "";

/* =========================
   LOGIN PROCESS
========================= */

if(isset($_POST['Login']))
{
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);

    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    $Role = $_POST['Role'];

    /* =========================
       ADMIN LOGIN
    ========================= */

    if($Role == "Admin")
    {
        $query = "SELECT * FROM admin
                  WHERE Username='$Username'
                  AND Password='$Password'";

        $result = mysqli_query($conn, $query);

        if(!$result)
        {
            die(mysqli_error($conn));
        }

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['Admin'] = $Username;

            header("Location: Admin/index.php");

            exit();
        }
        else
        {
            $error = "Invalid Admin Login";
        }
    }

    /* =========================
       CUSTOMER LOGIN
    ========================= */

    if($Role == "Customer")
    {
        $query = "SELECT * FROM customer
                  WHERE Username='$Username'
                  AND Password='$Password'";

        $result = mysqli_query($conn, $query);

        if(!$result)
        {
            die(mysqli_error($conn));
        }

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['Customer'] = $Username;

            header("Location: Customer/index.php");

            exit();
        }
        else
        {
            $error = "Invalid Customer Login";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Lhasa Clothing Store</title>

<style>

*
{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body
{
    background:#f4f4f4;
}

/* =========================
   NAVBAR
========================= */

.navbar
{
    width:100%;

    background:black;

    padding:15px 40px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    flex-wrap:wrap;
}

.logo-section
{
    display:flex;
    align-items:center;
    gap:15px;
}

.logo-section img
{
    width:60px;
    height:60px;

    border-radius:50%;
}

.logo-text
{
    color:#d4af37;

    font-size:30px;
    font-weight:bold;
}

.nav-links
{
    display:flex;
    gap:20px;

    flex-wrap:wrap;
}

.nav-links a
{
    color:white;

    text-decoration:none;

    font-weight:bold;

    transition:0.3s;
}

.nav-links a:hover
{
    color:#d4af37;
}

/* =========================
   LOGIN SECTION
========================= */

.login-container
{
    width:100%;

    min-height:85vh;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:40px 20px;
}

.login-card
{
    width:100%;
    max-width:420px;

    background:white;

    padding:40px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,0.2);

    text-align:center;
}

.login-card img
{
    width:100px;
    height:100px;

    border-radius:50%;

    margin:auto auto 15px;
}

.login-card h1
{
    margin-bottom:25px;

    color:#222;
}

.input-box
{
    width:100%;

    padding:14px;

    margin-bottom:18px;

    border:1px solid #ccc;

    border-radius:10px;

    font-size:16px;
}

.role-box
{
    margin-bottom:20px;

    text-align:left;
}

.role-box label
{
    margin-right:20px;

    font-weight:bold;
}

.login-btn
{
    width:100%;

    background:black;

    color:white;

    border:none;

    padding:14px;

    border-radius:10px;

    font-size:16px;

    cursor:pointer;

    transition:0.3s;
}

.login-btn:hover
{
    background:#d4af37;

    color:black;
}

.register-link
{
    margin-top:20px;
}

.register-link a
{
    color:#d4af37;

    text-decoration:none;

    font-weight:bold;
}

.error
{
    color:red;

    margin-bottom:15px;

    font-weight:bold;
}

/* =========================
   FOOTER
========================= */

footer
{
    background:black;

    color:white;

    text-align:center;

    padding:15px;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px)
{
    .navbar
    {
        flex-direction:column;

        gap:20px;

        text-align:center;
    }

    .logo-section
    {
        flex-direction:column;
    }

    .logo-text
    {
        font-size:24px;
    }

    .nav-links
    {
        justify-content:center;
    }
}

</style>

</head>

<body>

<!-- HEADER -->

<div class="navbar">

    <div class="logo-section">

        <img src="img/logo.png">

        <div class="logo-text">
            LHASA CLOTHING STORE
        </div>

    </div>

    <div class="nav-links">

        <a href="index.php">Home</a>

        <a href="Products.php">Products</a>

        <a href="Contact.php">Contact</a>

        <a href="Login.php">Login</a>

    </div>

</div>

<!-- LOGIN -->

<div class="login-container">

    <div class="login-card">

        <img src="img/logo.png">

        <h1>Login</h1>

        <?php
            if($error != "")
            {
                echo "<div class='error'>$error</div>";
            }
        ?>

        <form method="POST">

            <input type="text"
                   name="Username"
                   class="input-box"
                   placeholder="Enter Username"
                   required>

            <input type="password"
                   name="Password"
                   class="input-box"
                   placeholder="Enter Password"
                   required>

            <div class="role-box">

                <label>

                    <input type="radio"
                           name="Role"
                           value="Admin"
                           required>

                    Admin

                </label>

                <label>

                    <input type="radio"
                           name="Role"
                           value="Customer">

                    Customer

                </label>

            </div>

            <button type="submit"
                    name="Login"
                    class="login-btn">

                Login

            </button>

        </form>

        <div class="register-link">

            Don't have an account?

            <a href="Register.php">
                Register Here
            </a>

        </div>

    </div>

</div>

<!-- FOOTER -->

<footer>

    © 2026 Lhasa Clothing Store | All Rights Reserved

</footer>

</body>

</html>