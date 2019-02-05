<?php 
	
	$dbhost = 'localhost:3307';
	$dbname = 'highcharts';
	$dbuser = 'root';
	$dbpass = '';

	try {

		$dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (Exception $e) {
		die($e->getMessage());
	}

	$stmt=$dbcon->prepare("SELECT * FROM vw_eventos");
	$stmt->execute();
	$json = [];
	$json1 = [];
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		//echo $ano;
		//echo $amount;
		
		$json[]=$operacao;
		$json1[]=[$operacao, (int)$jan, (int)$fev, (int)$mar, (int)$abr, (int)$mai, (int)$jun, (int)$jul, (int)$ago, (int)$set, (int)$out, (int)$nov, (int)$dez];
	}
	//var_dump($json); exit;
	//echo json_encode($json);
	//print json_encode($json1, JSON_NUMERIC_CHECK);
	echo json_encode($json1);
	
 ?>
