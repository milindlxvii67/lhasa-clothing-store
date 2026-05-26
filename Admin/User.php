<?php

$con = mysqli_connect("localhost","root","","shopping");

$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $sql = "SELECT * FROM Customer_Registration
            WHERE CustomerName LIKE '%$search%'
            OR Email LIKE '%$search%'
            OR City LIKE '%$search%'";
}
else
{
    $sql = "SELECT * FROM Customer_Registration";
}

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Manage Users</title>
<link rel="stylesheet" href="style.css">

<style>

/* PAGE */

.admin-users-page{
    min-height:100vh;
    background:#f4f4f4;
    padding:60px 20px;
}

.admin-container{
    max-width:1450px;
    margin:auto;
}

/* HEADER */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:40px;
    flex-wrap:wrap;
    gap:20px;
}

.page-title{
    font-size:60px;
    color:#111;
}

/* TOTAL USERS */

.total-users{
    background:#111;
    color:white;
    padding:15px 30px;
    border-radius:6px;
    font-size:18px;
}

/* SEARCH */

.search-box{
    margin-bottom:40px;
}

.search-form{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.search-form input{
    flex:1;
    padding:15px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:16px;
}

.search-form button{
    background:#111;
    color:white;
    border:none;
    padding:15px 30px;
    border-radius:6px;
    cursor:pointer;
    transition:0.3s;
}

.search-form button:hover{
    background:#00cc66;
}

/* TABLE */

.user-table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* HEAD */

.user-table th{
    background:#111;
    color:white;
    padding:20px;
    font-size:18px;
}

/* BODY */

.user-table td{
    padding:20px;
    text-align:center;
    border-bottom:1px solid #eee;
}

.user-table tr:hover{
    background:#f9f9f9;
}

/* STATUS */

.active-status{
    background:#00cc66;
    color:white;
    padding:8px 16px;
    border-radius:20px;
    font-size:14px;
}

/* BUTTONS */

.action-buttons{
    display:flex;
    justify-content:center;
    gap:10px;
    flex-wrap:wrap;
}

.edit-btn,
.delete-btn{
    padding:10px 18px;
    border-radius:6px;
    text-decoration:none;
    color:white;
    transition:0.3s;
}

.edit-btn{
    background:#111;
}

.edit-btn:hover{
    background:#00cc66;
}

.delete-btn{
    background:red;
}

.delete-btn:hover{
    background:#cc0000;
}

/* MOBILE */

@media(max-width:768px){

    .page-title{
        font-size:40px;
    }

    .user-table{
        display:block;
        overflow-x:auto;
    }

}

</style>

</head>

<body>

<?php include "Header.php"; ?>

<div class="admin-users-page">

    <div class="admin-container">

        <!-- HEADER -->

        <div class="page-header">

            <h1 class="page-title">

                Registered Users

            </h1>

            <div class="total-users">

                Total Users:
                <?php echo mysqli_num_rows($result); ?>

            </div>

        </div>

        <!-- SEARCH -->

        <div class="search-box">

            <form method="GET" class="search-form">

                <input
                type="text"
                name="search"
                placeholder="Search users..."
                value="<?php echo $search; ?>">

                <button type="submit">

                    Search

                </button>

            </form>

        </div>

        <!-- TABLE -->

        <table class="user-table">

            <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Status</th>
                <th>Actions</th>

            </tr>

<?php

while($row=mysqli_fetch_array($result))
{
?>

            <tr>

                <td>

                    <?php echo $row['CustomerId']; ?>

                </td>

                <td>

                    <?php echo $row['CustomerName']; ?>

                </td>

                <td>

                    <?php echo $row['Email']; ?>

                </td>

                <td>

                    <?php echo $row['Mobile']; ?>

                </td>

                <td>

                    <?php echo $row['City']; ?>

                </td>

                <td>

                    <span class="active-status">

                        Active

                    </span>

                </td>

                <td>

                    <div class="action-buttons">

                        <a href="EditUser.php?id=<?php echo $row['CustomerId']; ?>" class="edit-btn">

                            Edit

                        </a>

                        <a
                        href="DeleteUser.php?id=<?php echo $row['CustomerId']; ?>"
                        class="delete-btn"
                        onclick="return confirm('Delete this user?')">

                            Delete

                        </a>

                    </div>

                </td>

            </tr>

<?php
}
?>

        </table>

    </div>

</div>

<?php include "../Footer.php"; ?>

</body>
</html>