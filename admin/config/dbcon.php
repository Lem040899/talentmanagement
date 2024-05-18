<?php

$host="localhost";
$username="root";
$password="";
$database="epes_db";

$con=mysqli_connect("$host","$username","$password","$database");

if(!$con)
{
    header("Location: ../errors/dberror.php");
    die();
}

?>