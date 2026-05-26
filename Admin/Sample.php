<?php

session_start();

if(!isset($_SESSION['Admin']))
{
    header("location:../Login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Admin Sample
    </title>

    <link rel="stylesheet" href="style.css">

    <style>

    .sample-page{
        padding:60px 40px;
        background:#f4f4f4;
        min-height:80vh;
    }

    .sample-title{
        text-align:center;
        margin-bottom:50px;
    }

    .sample-title h1{
        font-size:48px;
        color:#111;
    }

    .sample-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
        gap:35px;
    }

    .sample-card{
        background:#fff;
        border-radius:20px;
        padding:25px;
        text-align:center;
        box-shadow:0 5px 15px rgba(0,0,0,0.1);
        transition:0.3s;
    }

    .sample-card:hover{
        transform:translateY(-8px);
    }

    .sample-card img{
        width:100%;
        height:250px;
        object-fit:contain;
        background:#fff;
        padding:20px;
        margin-bottom:20px;
    }

    .sample-card h2{
        font-size:30px;
        margin-bottom:15px;
        color:#111;
    }

    .sample-card p{
        color:#666;
        font-size:17px;
        line-height:1.7;
    }

    </style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="sample-page">

    <div class="sample-title">

        <h1>
            Welcome Administrator
        </h1>

    </div>

    <div class="sample-grid">

        <!-- CARD 1 -->

        <div class="sample-card">

            <img src="../img/Jeans.jpg"
                 alt="Jeans">

            <h2>
                Jeans
            </h2>

            <p>
                Premium denim jeans collection
                for stylish casual fashion.
            </p>

        </div>

        <!-- CARD 2 -->

        <div class="sample-card">

            <img src="../img/asd.jpg"
                 alt="Blazers">

            <h2>
                Blazers
            </h2>

            <p>
                Elegant blazer collection
                for modern formal fashion.
            </p>

        </div>

        <!-- CARD 3 -->

        <div class="sample-card">

            <img src="../img/images.jpg"
                 alt="T-Shirts">

            <h2>
                T-Shirts
            </h2>

            <p>
                Comfortable and trendy t-shirts
                for everyday style.
            </p>

        </div>

        <!-- CARD 4 -->

        <div class="sample-card">

            <img src="../img/traditional.jpg"
                 alt="Traditional Wear">

            <h2>
                Traditional Wear
            </h2>

            <p>
                Tibetan traditional wear collection
                with premium cultural designs.
            </p>

        </div>

    </div>

</div>

<?php include "Footer.php"; ?>

</body>
</html>