<?php 
include('config/dbcon.php');
include('includes/header.php');
$msg="";  
if (isset($_POST['add_task'])) {  
     $task=$_POST['task'];  
     $description=$_POST['description'];  
     $due_date=$_POST['due_date'];  

     $query= "INSERT INTO `task_list`(`task`, `description`, `due_date`) VALUES ('$task','$description','$due_date')";  
     $data=mysqli_query($con,$query);  
     if ($data) {  
          $msg="Your data inserted successfully";  
          
     }else{  
          $msg="Try after some time !";  
     }  
}  
?>  
<div class="container-fluid px-4">
    <h1 class="mt-4">Task</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="task_list.php">Task</a></li>
        <li class="breadcrumb-item active">New Task</li>
    </ol>
    <div class="card-tools">
    <div class="card mb-4">
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            New Task
        </div>
            <div class="card-body">
                <div class="container-fluid">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Task</label>
                                        <input type="text" class="form-control form-control-sm" name="task" required>
            
                                    </div>
                                    <div class="form-group">
                                        <label for="">Assign To</label>
                                        <select name="employee_id" id="employee_id" class="form-control form-control-sm" required="">
                                            <option value=""></option>
                                            <?php 
                                            $employees = $con->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM employee_list order by concat(lastname,', ',firstname,' ',middlename) asc");
                                            while($row=$employees->fetch_assoc()):
                                            ?>
                                            <option value="<?php echo $row['id'] ?>" <?php echo isset($employee_id) && $employee_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Due Date</label>
                                        <input type="date" class="form-control form-control-sm" name="due_date" required>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">
                                        </textarea>
                                    </div>

                                </div>
                                <div class="mb-3">
                                <input type="submit" name="insert" value="Insert Data" class="btn">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>