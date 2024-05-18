<?php
session_start();
require 'config/dbcon.php';
if(isset($_POST['save_employee'])){
    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $cnumber = mysqli_real_escape_string($con, $_POST['cnumber']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $Jposition = mysqli_real_escape_string($con, $_POST['jobposition']);

    $query = "INSERT INTO tmstb (fullname,cnumber,email,jobposition) VALUES ('$name', '$cnumber', '$email', '$Jposition')";

    $query_run = mysqli_query($con, $query);

    if($query_run){
        header("Location: Performancemanagement.php");
        exit(0);
    }
    else{
        echo'<script>alert("Data not inserted")</script>';
        exit(0);
        }
}

if(isset($_POST['update_employee'])){
    $employee_id = mysqli_real_escape_string($con, $_POST['id']);

    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $cnumber = mysqli_real_escape_string($con, $_POST['cnumber']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $jpos = mysqli_real_escape_string($con, $_POST['jobposition']);

    $query = "UPDATE tmstb SET fullname='$name', cnumber='$cnumber', email='$email', jobposition='$jpos' WHERE id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        header("Location: performancemanagement.php");
        exit(0);
    }
    else{
        echo "Failed to Update data";
        exit(0);
    }
}

if(isset($_POST['delete_employee'])){
    $employee_id = mysqli_real_escape_string($con, $_POST['delete_employee']);

    $query = "DELETE FROM tmstb WHERE id='$employee_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        header("Location: performancemanagement.php");
        exit(0);
    }
    else{
        echo "the file cannot delete";
        header("Location: performancemanagement.php");
        exit(0);
    }
}
?>