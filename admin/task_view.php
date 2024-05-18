<?php 
include('config/dbcon.php');
include('includes/header.php');
if(isset($_GET['id'])){
	$qry = $con->query("SELECT t.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name FROM task_list t inner join employee_list e on e.id = t.employee_id  where t.id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Task</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="task_list.php">Task</a></li>
        <li class="breadcrumb-item active">Task View</li>
    </ol>
    <div class="card-tools">
    <div class="card mb-4">
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            View Task
        </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <dl>
                                    <dt><b class="border-bottom border-primary">Task</b></dt>
                                    <dd><?php echo ucwords($task) ?></dd>
                                </dl>
                                <dl>
                                    <dt><b class="border-bottom border-primary">Assign To</b></dt>
                                    <dd><?php echo ucwords($name) ?></dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl>
                                    <dt><b class="border-bottom border-primary">Due Date</b></dt>
                                    <dd><?php echo date("m d,Y",strtotime($due_date)) ?></dd>
                                </dl>
                                <dl>
                                    <dt><b class="border-bottom border-primary">Status</b></dt>
                                    <dd>
                                        <?php 
                                        if($status == 0){
                                            echo "Pending";
                                        }elseif($status == 1){
                                            echo "On-progress";
                                        }elseif($status == 2){
                                            echo "Complete";
                                        }
                                        if(strtotime($due_date) < strtotime(date('Y-m-d'))){
                                            echo "Over-due";
                                        }
                                        ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <dl>
                                <dt><b class="border-bottom border-primary">Description</b></dt>
                                <dd><?php echo ucwords($description) ?></dd>
                            </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>