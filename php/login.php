<?php
require_once("connect.php");
	if($conn){
		if($seleDB){
		   $username = $_GET['username'];
		   $password = $_GET['pwd'];
		   
		   $select = "'SELECT `password` FROM `user` WHERE `username` = '$username'";
		   $result = mysql_query($select);
		   $row = mysql_fetch_assoc($result);
		   if($row['password']==$password){
		       print_r("success");
		   }else{
		       print_r("failed");
		   }
		}
	}


?>