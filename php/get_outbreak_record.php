<?php
	require_once("connect.php");
	if($conn){
		if($seleDB){
			print_r("connect success!");
			$username = $_GET['username'];
			
			$arr = array();
			
			$select = "SELECT `username`, `datetime`, `weather`, `medicine`, `recovertime`, `treatment`, `description`, `img` FROM `outbreak_record` WHERE `username`= 'test4' ORDER BY `datetime`";
			$result = mysql_query($select);
			while($row = mysql_fetch_assoc($result)){
			    array_push($arr, $row);
			}
			
			print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));
		}
	}
	

?>