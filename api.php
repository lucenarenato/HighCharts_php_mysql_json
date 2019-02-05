<?php

$username = 'root';
$password = 'root';
$database = 'highcharts';
$hostname = 'localhost:3306';

// name of the animal to get data for
$animal_name = 'wombat';
$dbh = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
$stmt = "SELECT * FROM animals WHERE name=:name";
$stmt->bindParam( ':name', $animal_name, PDO::PARAM_STR );
$stmt->execute();
$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
echo json_encode( $result );
?>