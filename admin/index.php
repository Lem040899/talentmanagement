<?php
    include('config/dbcon.php');
    include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Employees</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="employee_list.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Employee of the Month</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        <input type="text" name="" id="" placeholder="Enter Text">
                    </div>
                </div>
            </div>
        </div>
<?php
    include('includes/footer.php');
    include('includes/scripts.php');
?>