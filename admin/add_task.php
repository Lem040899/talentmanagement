 <?php
include('config/dbcon.php');
if (isset($_GET['id'])) {  
    $task_id = $_GET['id'];  
    $query = "INSERT INTO `task_list` WHERE id = '$task_id'";  
    $task_run = mysqli_query($con,$query);  
    if ($task_run) {  
         header('location:task_list.php');  
    }else{  
         echo "Error: ".mysqli_error($con);  
    }  
}
?>