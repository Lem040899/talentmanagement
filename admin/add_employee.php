<?php
include('config/dbcon.php');
include('includes/header.php');
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Employee
                        <a href="performancemanagement.php" class="btn btn-danger float-end"> 
                            <i class="fa-solid fa-circle-xmark"></i>
                        </a>
                    </h4>
                    <form action="phpcode.php" method="POST">
                        <div class="mb-3">
                            <label>FULLNAME</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>CONTACTNUMBER</label>
                            <input type="text" name="cnumber" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>EMAIL</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>JOBPOSITION</label>
                            <input type="text" name="jobposition" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_employee" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>