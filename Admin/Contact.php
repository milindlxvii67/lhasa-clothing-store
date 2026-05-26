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

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
Admin Contact - Lhasa Clothing Store
</title>

<link rel="stylesheet" href="style.css">

<style>

/* =========================
   PAGE SECTION
========================= */

.contact-section{
    width:100%;
    padding:80px 40px;
    background:#f4f4f4;
    min-height:80vh;
}

/* =========================
   CONTACT CONTAINER
========================= */

.contact-container{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
}

/* =========================
   CONTACT BOX
========================= */

.contact-box{
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* =========================
   HEADINGS
========================= */

.contact-box h1{
    font-size:42px;
    margin-bottom:25px;
    color:#111;
}

.contact-box h2{
    color:#d4af37;
    margin-top:30px;
    margin-bottom:15px;
    font-size:24px;
}

/* =========================
   TEXT
========================= */

.contact-box p{
    color:#555;
    line-height:1.8;
    font-size:18px;
}

/* =========================
   FORM
========================= */

form input,
form textarea{
    width:100%;
    padding:16px;
    margin-bottom:20px;
    border:1px solid #ccc;
    border-radius:10px;
    font-size:16px;
    outline:none;
}

form textarea{
    height:160px;
    resize:none;
}

/* =========================
   BUTTON
========================= */

button{
    background:#000;
    color:#fff;
    padding:15px 35px;
    border:none;
    border-radius:10px;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
    font-weight:bold;
}

button:hover{
    background:#d4af37;
    color:#000;
}

/* =========================
   SUPPORT SECTION
========================= */

.footer-top{
    background:#d4af37;
    color:#000;
    text-align:center;
    padding:70px 20px;
}

.footer-top h1{
    font-size:50px;
    margin-bottom:20px;
}

.footer-top p{
    font-size:22px;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:900px)
{
    .contact-container{
        grid-template-columns:1fr;
    }

    .contact-section{
        padding:50px 20px;
    }

    .contact-box h1{
        font-size:34px;
    }

    .footer-top h1{
        font-size:38px;
    }

    .footer-top p{
        font-size:18px;
    }
}

</style>

</head>

<body>

<!-- HEADER -->

<?php include "Header.php"; ?>

<!-- CONTACT SECTION -->

<section class="contact-section">

    <div class="contact-container">

        <!-- LEFT SIDE -->

        <div class="contact-box">

            <h1>
                Admin Contact
            </h1>

            <p>
                For admin support, technical help,
                or business inquiries, contact the
                Lhasa Clothing Store management team.
            </p>

            <h2>
                Office Address
            </h2>

            <p>

                The Dalai Lama Institute for Higher Education

                <br><br>

                Sheshagirihally, Hejjala Post

                <br>

                Bidadi Hobli, Ramanagar Taluk

                <br>

                Bangalore, Karnataka 562109, India

            </p>

            <h2>
                Phone
            </h2>

            <p>
                +91 7676356021
            </p>

            <h2>
                Email
            </h2>

            <p>
                milindbauddhalxvii@gmail.com
            </p>

        </div>

        <!-- RIGHT SIDE -->

        <div class="contact-box">

            <h1>
                Send Message
            </h1>

            <form>

                <input type="text"
                       placeholder="Your Name"
                       required>

                <input type="email"
                       placeholder="Your Email"
                       required>

                <input type="text"
                       placeholder="Subject"
                       required>

                <textarea placeholder="Your Message"></textarea>

                <button type="submit">

                    Send Message

                </button>

            </form>

        </div>

    </div>

</section>

<!-- SUPPORT SECTION -->

<div class="footer-top">

    <h1>
        Need Admin Support?
    </h1>

    <p>
        Our Technical Team Is Ready To Help Anytime
    </p>

</div>

<!-- FOOTER -->

<?php include "../Footer.php"; ?>

</body>
</html>