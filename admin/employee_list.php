<?php
include('config/dbcon.php');
include('includes/header.php');
?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Employee</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <div class="card-tools">
                <button class="btn btn-block btn-sm btn-default btn-flat " id="new_task"><i class="fa fa-plus"></i> Add New Employee</button>
            </div>
            <div class="card mb-4">
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List of Employee
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                                <tbody>
                                <?php                   
                                    $employee_list="SELECT * FROM employee_list";
                                    $employee_list_run=mysqli_query($con,$employee_list);

                                    if(mysqli_num_rows($employee_list_run) > 0)
                                    {
                                        foreach($employee_list_run as $list)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $list['id']?></td>
                                                <td><?= $list['firstname']?></td>
                                                <td><?= $list['middlename']?></td>
                                                <td><?= $list['lastname']?></td>
                                                <td><?= $list['email']?></td>
                                                <td><?= $list['department_id']?></td>
                                                <td><?= $list['designation_id']?></td>
                                                <td>
                                                <button type="button" class="btn btn-outline-primary btn-sm">View</button>
                                                <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
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
    </main>
<?php

include('includes/footer.php');
include('includes/scripts.php');

?>