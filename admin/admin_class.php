<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
		include('config/dbcon.php');
    
    $this->db = $con;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}
	function save_task(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if($k == 'description')
					$v = htmlentities(str_replace("'","&#x2019;",$v));
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO task_list set $data");
		}else{
			$save = $this->db->query("UPDATE task_list set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_task(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM task_list where id = $id");
		if($delete){
			return 1;
		}
	}
	function save_evaluation(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$data .= ", evaluator_id = {$_SESSION['login_id']} ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO ratings set $data");
		}else{
			$save = $this->db->query("UPDATE ratings set $data where id = $id");
		}
		if($save){
		if(!isset($is_complete))
			return 1;
		}
	}
	function delete_evaluation(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM ratings where id = $id");
		if($delete){
			return 1;
		}
	}
	function get_emp_tasks(){
		extract($_POST);
		if(!isset($task_id))
		$get = $this->db->query("SELECT * FROM task_list where employee_id = $employee_id and status = 2 and id not in (SELECT task_id FROM ratings) ");
		else
		$get = $this->db->query("SELECT * FROM task_list where employee_id = $employee_id and status = 2 and id not in (SELECT task_id FROM ratings where task_id !='$task_id') ");
		$data = array();
		while($row=$get->fetch_assoc()){
			$data[] = $row;
		}
		return json_encode($data);
	}
}