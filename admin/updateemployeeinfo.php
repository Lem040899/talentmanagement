<?php
include('config/dbcon.php');
include('includes/header.php');
?>
<?php
session_start();
require 'config/dbcon.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>View Employee Info</h4>
                    <a href="performancemanagement.php" class="btn btn-danger float-end">Close</a>
                </div>
                <div class="card-body">
                <?php
                        if(isset($_GET['id']))
                        {
                            $employee_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM tmstb WHERE id='$employee_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $employee = mysqli_fetch_array($query_run);
                                ?>
                                <form action="phpcode.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $employee['id']; ?>">
                               
                                    <div class="mb-3">
                                        <label>Employee Name</label>
                                        <input type="text" name="fullname" value="<?= $employee['fullname']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Contact Number</label>
                                        <input type="text" name="cnumber" value="<?= $employee['cnumber']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email Address</label>
                                        <input type="email" name="email" value="<?= $employee['email']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Job Position</label>
                                        <input type="text" name="jobposition" value="<?= $employee['jobposition']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_employee" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>