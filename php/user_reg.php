<?php
	require_once("connect.php");
	if($conn){
		if($seleDB){
			print_r("connect success!");
		}
	}
	//$data_ori = file_get_contents("php://input");
	//$data = $_POST;
	//print_r($data_ori);
	//print_r($data);
	$rawPostBody = file_get_contents('php://input');
	$postData = json_decode($rawPostBody, true);
	//print_r($rawPostBody);
	print_r($postData);
	
	$username = $postData['account'];
	$password = $postData['password'];
	$email = $postData['email'];
	
	mysql_query("SET NAMES 'utf8'");
	$insert_sql = "INSERT INTO `user`(`username`, `password`, `email`) VALUES ('$username','$password','$email')";
	if(mysql_query($insert_sql)){
	    print_r("insert success");
	}else{
	    print_r("insert failed");
	}
?>