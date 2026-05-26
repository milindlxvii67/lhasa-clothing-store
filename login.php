<?php

session_start();

/* DATABASE CONNECTION */

$con = mysqli_connect("localhost","root","","shopping");

if(!$con)
{
    die("Database Connection Failed");
}

/* =========================
   ALREADY LOGGED IN
========================= */

if(isset($_SESSION['Admin']))
{
    header("Location: /LCS/Admin/index.php");
    exit();
}

if(isset($_SESSION['Customer']))
{
    header("Location: /LCS/Customer/index.php");
    exit();
}

/* =========================
   LOGIN PROCESS
========================= */

if(isset($_POST['btnLogin']))
{
    $Username = mysqli_real_escape_string(
        $con,
        $_POST['Username']
    );

    $Password = mysqli_real_escape_string(
        $con,
        $_POST['Password']
    );

    $Role = $_POST['Role'];

    /* =========================
       ADMIN LOGIN
    ========================= */

    if($Role == "Admin")
    {
        $sql = "SELECT * FROM admin_master
                WHERE Username='$Username'
                AND Password='$Password'";

        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);

            /* IMPORTANT FIX */

            $_SESSION['Admin']
            = $row['Username'];

            $_SESSION['AdminId']
            = $row['AdminId'];

            header("Location: /LCS/Admin/index.php");
            exit();
        }
        else
        {
            echo "<script>
            alert('Invalid Admin Login');
            </script>";
        }
    }

    /* =========================
       CUSTOMER LOGIN
    ========================= */

    if($Role == "Customer")
    {
        $sql = "SELECT * FROM customer_registration
                WHERE Username='$Username'
                AND Password='$Password'";

        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);

            /* IMPORTANT FIX */

            $_SESSION['Customer']
            = $row['Name'];

            $_SESSION['CustomerId']
            = $row['CustomerId'];

            header("Location: /LCS/Customer/index.php");
            exit();
        }
        else
        {
            echo "<script>
            alert('Invalid Customer Login');
            </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
    Login - Lhasa Clothing Store
</title>

<link rel="stylesheet"
      href="style.css">

</head>

<body>

<?php include "Header.php"; ?>

<section class="login-section">

    <div class="login-box">

        <div class="login-logo">

            <img src="img/logo.png"
                 alt="Logo">

            <h1>Login</h1>

        </div>

        <form method="POST">

            <div class="form-group">

                <label>Username</label>

                <input type="text"
                       name="Username"
                       required>

            </div>

            <div class="form-group">

                <label>Password</label>

                <input type="password"
                       name="Password"
                       required>

            </div>

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
                    name="btnLogin"
                    class="login-btn">

                Login

            </button>

        </form>

        <div class="register-text">

            Don't have an account?

            <a href="Register.php">

                Register Here

            </a>

        </div>

    </div>

</section>

<?php include "Footer.php"; ?>

</body>
</html>