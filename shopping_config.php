<?php

$shopping_conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "shopping"
);

if(!$shopping_conn)
{
    die("Shopping Database Connection Failed");
}

?>