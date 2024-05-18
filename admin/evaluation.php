<?php
include('config/dbcon.php');
include('includes/header.php');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Evaluation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card-tools">
        <button class="btn btn-block btn-sm btn-default btn-flat " id="new_task"><i class="fa fa-plus"></i> Add New Evaluation</button>
    </div>
    <div class="card mb-4">
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            List of Evaluation

        </div>
        <div class="card-body">
            <table class="table table-condensed" id="datatablesSimple">
            <thead>
					<tr>
						<th class="text-center">#</th>
						<th>Task</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$where = "";
					$qry = $con->query("SELECT r.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,t.task,((((r.efficiency + r.timeliness + r.quality + r.accuracy)/4)/5) * 100) as pa FROM ratings r inner join employee_list e on e.id = r.employee_id inner join task_list t on t.id = r.task_id inner join evaluator_list ev on ev.id = r.evaluator_id $where order by concat(e.lastname,', ',e.firstname,' ',e.middlename) asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ($row['task']) ?></b></td>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td>
                            <button type="button" class="btn btn-outline-primary btn-sm">View</button>
                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                            <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
            </table>
        </div>
    </div>
</div>
<style>
</style>
<?php

include('includes/footer.php');
include('includes/scripts.php');

?>