<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Register - Lhasa Clothing Store</title>
<link rel="stylesheet" href="style.css">

<style>

/* REGISTER PAGE */

.register-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.register-container{
    max-width:700px;
    margin:auto;
}

/* CARD */

.register-card{
    background:white;
    padding:50px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* TITLE */

.register-title{
    text-align:center;
    font-size:50px;
    color:#111;
    margin-bottom:15px;
}

.register-subtitle{
    text-align:center;
    color:#666;
    margin-bottom:40px;
    font-size:18px;
}

/* GRID */

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
    color:#333;
}

.input-group input,
.input-group textarea,
.input-group select{
    width:100%;
    padding:14px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:16px;
    outline:none;
}

.input-group textarea{
    height:120px;
    resize:none;
}

/* FULL WIDTH */

.full-width{
    grid-column:1 / 3;
}

/* BUTTON */

.register-btn{
    width:100%;
    padding:16px;
    background:#111;
    color:white;
    border:none;
    border-radius:6px;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
}

.register-btn:hover{
    background:#00cc66;
}

/* LOGIN LINK */

.login-link{
    margin-top:25px;
    text-align:center;
}

.login-link a{
    color:#00aa55;
    text-decoration:none;
}

.login-link a:hover{
    text-decoration:underline;
}

/* MOBILE */

@media(max-width:768px){

    .form-grid{
        grid-template-columns:1fr;
    }

    .full-width{
        grid-column:1;
    }

}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="register-page">

    <div class="register-container">

        <div class="register-card">

           <div class="register-logo">

    <img src="img/logo.png" alt="Logo">

    <h1>Create Account</h1>

</div>

<p class="register-subtitle">
    Join Lhasa Clothing Store and explore premium fashion.
</p>

            <form action="Insert.php" method="post">

                <div class="form-grid">

                    <!-- FULL NAME -->

                    <div class="input-group">

                        <label>Full Name</label>

                        <input type="text"
                        name="txtName"
                        required>

                    </div>

                    <!-- CITY -->

                    <div class="input-group">

                        <label>City</label>

                        <select name="cmbCity" required>

                            <option value="">
                                Select City
                            </option>

                            <option>Delhi</option>
                            <option>Bangalore</option>
                            <option>Mumbai</option>
                            <option>Dharamshala</option>

                        </select>

                    </div>

                    <!-- ADDRESS -->

                    <div class="input-group full-width">

                        <label>Address</label>

                        <textarea
                        name="txtAddress"
                        required></textarea>

                    </div>

                    <!-- EMAIL -->

                    <div class="input-group">

                        <label>Email</label>

                        <input type="email"
                        name="txtEmail"
                        required>

                    </div>

                    <!-- MOBILE -->

                    <div class="input-group">

                        <label>Mobile Number</label>

                        <input type="text"
                        name="txtMobile"
                        required>

                    </div>

                    <!-- GENDER -->

                    <div class="input-group">

                        <label>Gender</label>

                        <select name="rdGender" required>

                            <option>Male</option>
                            <option>Female</option>

                        </select>

                    </div>

                    <!-- DATE -->

                    <div class="input-group">

                        <label>Birth Date</label>

                        <input type="date"
                        name="txtDate"
                        required>

                    </div>

                    <!-- USERNAME -->

                    <div class="input-group">

                        <label>Username</label>

                        <input type="text"
                        name="txtUserName"
                        required>

                    </div>

                    <!-- PASSWORD -->

                    <div class="input-group">

                        <label>Password</label>

                        <input type="password"
                        name="txtPassword"
                        required>

                    </div>

                    <!-- BUTTON -->

                    <div class="full-width">

                        <button type="submit"
                        class="register-btn">

                            Register Now

                        </button>

                    </div>

                </div>

            </form>

            <div class="login-link">

                Already have an account?

                <a href="admin_login.php">

                    Login Here

                </a>

            </div>

        </div>

    </div>

</div>

<?php include "Footer.php"; ?>

</body>
</html>