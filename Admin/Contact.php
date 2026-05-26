<?php
session_start();

if(!isset($_SESSION['Admin']))
{
    header("location:../Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Contact - Lhasa Clothing Store</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f4f4f4;
}

/* HEADER */

header{
    width:100%;
    background:black;
    padding:20px 60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    color:#00e676;
    font-size:22px;
    font-weight:bold;
}

nav ul{
    display:flex;
    list-style:none;
    gap:30px;
}

nav ul li a{
    text-decoration:none;
    color:white;
    font-size:16px;
    transition:0.3s;
}

nav ul li a:hover{
    color:#00e676;
}

/* CONTACT SECTION */

.contact-section{
    width:100%;
    padding:80px 40px;
}

.contact-container{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
}

.contact-box{
    background:white;
    padding:40px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.contact-box h1{
    font-size:48px;
    margin-bottom:25px;
}

.contact-box h2{
    color:#00cc66;
    margin-top:30px;
    margin-bottom:15px;
}

.contact-box p{
    color:#555;
    line-height:1.8;
    font-size:18px;
}

form input,
form textarea{
    width:100%;
    padding:16px;
    margin-bottom:20px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
}

form textarea{
    height:150px;
    resize:none;
}

button{
    background:black;
    color:white;
    padding:15px 35px;
    border:none;
    border-radius:8px;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#00cc66;
    color:black;
}

/* FOOTER */

.footer-top{
    background:#00cc66;
    color:white;
    text-align:center;
    padding:60px 20px;
}

.footer-top h1{
    font-size:60px;
    margin-bottom:20px;
}

.footer-top p{
    font-size:24px;
}

footer{
    background:black;
    color:white;
    text-align:center;
    padding:25px;
    font-size:18px;
}

/* RESPONSIVE */

@media(max-width:900px)
{
    .contact-container{
        grid-template-columns:1fr;
    }

    header{
        flex-direction:column;
        gap:20px;
    }

    nav ul{
        flex-wrap:wrap;
        justify-content:center;
    }
}

</style>

</head>

<body>

<!-- HEADER -->

<header>

<div class="logo">
LHASA ADMIN PANEL
</div>

<nav>

<ul>

<li><a href="index.php">Dashboard</a></li>

<li><a href="Products.php">Products</a></li>

<li><a href="Category.php">Categories</a></li>

<li><a href="Offers.php">Offers</a></li>

<li><a href="User.php">Users</a></li>

<li><a href="Feedback.php">Feedback</a></li>

<li><a href="Orders.php">Orders</a></li>

<li><a href="logout.php">Logout</a></li>

</ul>

</nav>

</header>

<!-- CONTACT SECTION -->

<section class="contact-section">

<div class="contact-container">

<!-- LEFT SIDE -->

<div class="contact-box">

<h1>Admin Contact</h1>

<p>
For admin support, technical help, or business inquiries,
contact the Lhasa Clothing Store management team.
</p>

<h2>Office Address</h2>

<p>
The Dalai Lama Institute for Higher Education<br><br>

Sheshagirihally, Hejjala Post<br>

Bidadi Hobli, Ramanagar Taluk<br>

Bangalore, Karnataka 562109, India
</p>

<h2>Phone</h2>

<p>
+91 7676356021
</p>

<h2>Email</h2>

<p>
milindbauddhalxvii@gmail.com
</p>

</div>

<!-- RIGHT SIDE -->

<div class="contact-box">

<h1>Send Message</h1>

<form>

<input type="text" placeholder="Your Name" required>

<input type="email" placeholder="Your Email" required>

<input type="text" placeholder="Subject" required>

<textarea placeholder="Your Message"></textarea>

<button type="submit">

Send Message

</button>

</form>

</div>

</div>

</section>

<!-- FOOTER TOP -->

<div class="footer-top">

<h1>Need Admin Support?</h1>

<p>
Our Technical Team Is Ready To Help Anytime
</p>

</div>

<!-- FOOTER -->

<footer>

© 2026 Lhasa Clothing Store Admin Panel | All Rights Reserved

</footer>

</body>
</html>