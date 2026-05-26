<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Feedback - Lhasa Clothing Store</title>
<link rel="stylesheet" href="../style.css">

<style>

/* FEEDBACK PAGE */

.feedback-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.feedback-container{
    max-width:800px;
    margin:auto;
}

/* CARD */

.feedback-card{
    background:white;
    padding:50px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* TITLE */

.feedback-title{
    text-align:center;
    font-size:50px;
    color:#111;
    margin-bottom:20px;
}

.feedback-subtitle{
    text-align:center;
    color:#666;
    margin-bottom:40px;
    font-size:18px;
}

/* FORM */

.input-group{
    margin-bottom:25px;
}

.input-group label{
    display:block;
    margin-bottom:10px;
    font-weight:bold;
    color:#333;
    font-size:18px;
}

.input-group textarea{
    width:100%;
    height:180px;
    padding:15px;
    border:1px solid #ccc;
    border-radius:6px;
    resize:none;
    font-size:16px;
    outline:none;
}

/* BUTTON */

.feedback-btn{
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

.feedback-btn:hover{
    background:#00cc66;
}

/* EXTRA */

.feedback-note{
    margin-top:25px;
    text-align:center;
    color:#666;
}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="feedback-page">

    <div class="feedback-container">

        <div class="feedback-card">

            <h1 class="feedback-title">

                Send Feedback

            </h1>

            <p class="feedback-subtitle">

                Share your shopping experience and help us improve.

            </p>

            <form action="InsertFeedback.php" method="post">

                <div class="input-group">

                    <label>Your Feedback</label>

                    <textarea 
                    name="txtFeedback"
                    placeholder="Write your feedback here..."
                    required></textarea>

                </div>

                <button type="submit" class="feedback-btn">

                    Submit Feedback

                </button>

            </form>

            <p class="feedback-note">

                Your feedback is valuable to us ❤️

            </p>

        </div>

    </div>

</div>

<?php include "Footer.php"; ?>

</body>
</html>