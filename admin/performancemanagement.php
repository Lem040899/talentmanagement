<?php
include('config/dbcon.php');
include('includes/header.php');
?>
<td?php
session_start();
require 'config/dbcon.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Performance Management</h4>
                    <a href="addemployee.php" class="btn btn-primary float-end">
                         <i class="fa-solid fa-plus"></i>
                         Add Employee
                    </a>
                </div>
                <a href="chart.php" class="btn btn-primary float-end" style="margin-left: 950px; margin-top: 10px">
                         <i class="fa-solid fa-eye"></i>
                         View employee chart
                    </a>
                <div class="card-body">
                   <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FULLNAME</th>
                                <th>cnumber</th>
                                <th>EMAIL</th>
                                <th>Performance Average</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $query = "SELECT tmstb.id, tmstb.fullname, tmstb.cnumber, tmstb.email, ratings.Total
                               FROM tmstb
                               JOIN ratings ON tmstb.id = ratings.id";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $employee){
                                        ?>
                                        <tr>
                                            <td><?= $employee['id'];?></td>
                                            <td><?= $employee['fullname'];?></td>
                                            <td><?= $employee['cnumber']; ?></td>
                                            <td><?= $employee['email'];?></td>
                                            <td><b><?php echo number_format($employee['Total'],2)."%" ?></b></td>
                                            <td>
                                                <a href="updateemployeeinfo.php?id=<?= $employee['id']; ?>" class="btn btn-success btn-sm">
                                                     <i class="fa-solid fa-pen-to-square"></i>
                                                     Edit
                                                </a>
                                                <form action="phpcode.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_employee" value="<?= $employee['id']; ?>" class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-trash"></i>
                                                        Delete  
                                                    </button>
                                                </$form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>