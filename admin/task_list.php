<?php
include('config/dbcon.php');
include('includes/header.php');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Task</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card-tools">
        <a class="btn btn-outline-primary btn-sm" id="new_task" href="task_add.php">Add new task</a>  

    </div>
    <div class="card mb-4">
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            List of Task

        </div>
        <div class="card-body">
            <table class="table table-condensed" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                        <tbody>
                        <?php                   
                        $i=1;
                            $task_list="SELECT * FROM task_list";
                            $task_list_run=mysqli_query($con,$task_list);

                            if(mysqli_num_rows($task_list_run) > 0)
                            {
                                foreach($task_list_run as $list)
                                {
                                    ?>
                                        <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                            <td><?= $list['task']?></td>
                                            <td><?= $list['description']?></td>
                                            <td>
                                            <a class="btn btn-outline-success btn-sm" href="task_view.php?id=<?=$list['id'];?>">View</a>  
                                            <a class="btn btn-outline-danger btn-sm" href="delete_task.php?id=<?=$list['id'];?>">Delete</a>  
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
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>