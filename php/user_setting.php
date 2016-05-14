<?php
	require_once("connect.php");
	if($conn){
		if($seleDB){
			print_r("connect success!");
		}
	}
	
	$rawPostBody = file_get_contents('php://input');
	$postData = json_decode($rawPostBody, true);
	//print_r($rawPostBody);
	print_r($postData);

	$username = $postData['username'];
	$location = $postData['setCity'];
	$allergic = $postData['others'];
	$illed_age = $postData['illTime'];
	$medicine1 = $postData['medicine1'];
	$medicine2 = $postData['medicine2'];
	$medicine3 = $postData['medicine3'];
	$remind_morning = $postData['alertTimeM'];
	$remind_evening = $postData['alertTimeE'];
	
	$check_sql = "SELECT `username`, `location` FROM `set_info` WHERE `username`= '$username'";
	$insert_sql = "INSERT INTO `set_info`(`username`, `location`, `allergic`, `illed_age`, `medicine1`, `medicine2`, `medicine3`, `remind_time_morning`, `remind_time_evening`) VALUES ('$username','$location','$allergic','$illed_age','$medicine1','$medicine2','$medicine3','$remind_morning','$remind_evening')";
	$update_sql = "UPDATE `set_info` SET `location`='$location',`allergic`='$allergic',`illed_age`='$illed_age',`medicine1`='$medicine1',`medicine2`='$medicine2',`medicine3`='$medicine3',`remind_time_morning`='$remind_morning',`remind_time_evening`='$remind_evening' WHERE `username` = '$username'";

	if(mysql_query($check_sql)){
	    if(mysql_query($update_sql)){
	        print_r("update success!");
	    }else{
	        print_r("update failed");
	        print_r($update_sql);
	    }
	}else{
	    if(mysql_query($insert_sql)){
	        print_r("insert success");
	    }else{
	        print_r("insert failed");
	        print_r($insert_sql);
	    }
	}
	
?>