<?php
	
	include 'conn.php';

	$mob_no = $_GET['mob_no'];

	$stmt = $pdo->prepare('SELECT * FROM store_mobile WHERE mob_no = '.$mob_no); 
	$stmt->execute(); 
	$row = $stmt->fetch();


	echo json_encode($row['mob_no']);


 ?>


