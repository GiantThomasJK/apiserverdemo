<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../employees.php';

$database = new Database();
$db = $database->getConnection();
$items = new Employee($db);
$records = $items->getEmployees();
$itemCount = $records->num_rows;


	$employeeArr = array();
	$employeeArr["body"] = array();
	while ($row = $records->fetch_assoc())
		{
			array_push($employeeArr["body"], $row);
		}
	echo json_encode($employeeArr);


?>