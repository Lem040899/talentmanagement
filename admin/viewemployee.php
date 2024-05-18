<?php
include('config/dbcon.php');
include('includes/header.php');
?>
<?php
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
                            $query = "SELECT tmstb.id, tmstb.fullname, tmstb.cnumber, tmstb.email, tmstb.jobposition, ratings.Total
                            FROM tmstb
                            JOIN ratings ON tmstb.id = ratings.id";
                            $query_run = mysqli_query($con, $query);
                            
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $employee = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Employee Name</label>
                                        <p class="form-control">
                                            <?=$employee['fullname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Contact Number</label>
                                        <p class="form-control">
                                            <?=$employee['cnumber'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email Address</label>
                                        <p class="form-control">
                                            <?=$employee['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Job Position</label>
                                        <p class="form-control">
                                            <?=$employee['jobposition'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Performance Average</label>
                                        <p class="form-control">
                                            <td><b><?php echo number_format($employee['Total'],2)."%" ?></b></td>
                                        </p>
                                    </div>

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