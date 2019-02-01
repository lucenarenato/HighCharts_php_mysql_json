<?php 
	
	$dbhost = 'localhost:3306';
	$dbname = 'highcharts';
	$dbuser = 'root';
	$dbpass = 'root';

	try {

		$dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (Exception $e) {
		die($e->getMessage());
	}

	$stmt=$dbcon->prepare("SELECT * FROM highcharts");
	$stmt->execute();
	$json = [];
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		//echo $id;
		//echo $amount;
		//$json[]=[(int)$id, (int)$amount];
		$json[]=[(string)$name, (int)$amount];
	}
	//var_dump($json); exit;
	echo json_encode($json);
	
 ?>