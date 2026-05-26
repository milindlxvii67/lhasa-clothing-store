<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Login - Lhasa Clothing Store</title>
<link rel="stylesheet" href="style.css">

<style>

.login-page{
    min-height:100vh;
    background:#f4f4f4;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;
}

.login-container{
    width:500px;
    background:white;
    border-radius:12px;
    padding:40px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.login-container h1{
    text-align:center;
    margin-bottom:30px;
    color:#111;
    font-size:40px;
}

.input-group{
    margin-bottom:20px;
}

.input-group label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
}

.input-group input{
    width:100%;
    padding:14px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:16px;
}

/* USER TYPE */

.user-type{
    margin-bottom:25px;
}

.user-type label{
    font-weight:bold;
    margin-right:20px;
    font-size:16px;
}

/* BUTTON */

.login-btn{
    width:100%;
    padding:15px;
    background:#111;
    color:white;
    border:none;
    border-radius:6px;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
}

.login-btn:hover{
    background:#00cc66;
}

/* EXTRA LINKS */

.extra-links{
    margin-top:20px;
    text-align:center;
}

.extra-links a{
    color:#00aa55;
    text-decoration:none;
}

.extra-links a:hover{
    text-decoration:underline;
}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="login-page">

    <div class="login-container">

        <h1>Login</h1>

        <form action="login.php" method="post">

            <div class="input-group">

                <label>Username</label>

                <input type="text" name="txtUserName" required>

            </div>

            <div class="input-group">

                <label>Password</label>

                <input type="password" name="txtPassword" required>

            </div>

            <!-- USER TYPE -->

            <div class="user-type">

                <label>
                    <input type="radio" name="rdType" value="Admin" required>
                    Admin
                </label>

                <label>
                    <input type="radio" name="rdType" value="Customer">
                    Customer
                </label>

            </div>

            <button type="submit" class="login-btn">

                Login

            </button>

        </form>

        <div class="extra-links">

            <p>
                New User?
                <a href="Register.php">
                    Create Account
                </a>
            </p>

        </div>

    </div>

</div>

<?php include "Footer.php"; ?>

</body>
</html>