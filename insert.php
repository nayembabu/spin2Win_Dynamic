<?php 
	include 'conn.php';

	$mob_no = $_GET['mob_no'];
	$resul = $_GET['res'];
	$timestamp = time();



    $pdoQuery = "INSERT INTO `store_mobile`(`mob_no`, `win_price`, `spin_time_stamp`) VALUES (:mobile_no,:win_result,:time_stmp)";
    
    $pdoResult = $pdo->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":mobile_no"=>$mob_no,":win_result"=>$resul,":time_stmp"=>$timestamp));



?>