<?php
	require_once("connect.php");
	if($conn){
		if($seleDB){
		    //print_r($_GET);
			$username = $_GET['username'];
	        
	        $arr = array();
	        $result = mysql_query("SELECT `date`,`morning_PEF`,`evening_PEF` FROM `daily_record_processed` WHERE `username` = '$username' AND `date` BETWEEN '$startDate' AND '$endDate' ORDER BY `date`");
	        
	        while($row = mysql_fetch_assoc($result)){
	            array_push($arr, $row);
	        }
	        
	        //print_r($arr);
	        print_r(json_encode($arr));
		}
	}
	
	//print_r($_GET);
	
	//$arr_morning = array();
	//$arr_evening = array();
	
	//$select_morning = mysql_query("SELECT `pef` FROM `daily_record` WHERE `username`='$username' and `times`='morning' and `date` between '$startDate' and '$endDate'");
	
	
	
	
	
	
	//print_r($select_morning);
	
	//$select_evening= mysql_query("SELECT `pef` FROM `daily_record` WHERE `username`='$unsername' and `times`='evening' and `date` between '$startDate' and '$endDate'");
	//$select_date= mysql_query("SELECT `date` FROM `daily_record` WHERE `username`='$unsername' and `date` between '$startDate' and '$endDate'");
	//$result_morning = mysql_fetch_array(mysql_query($select_morning));
	
	//print_r($result_morning);
	

	//print_r($arr_morning);
	//$json = json_encode($arr_morning);
	
    
	
	
	
	//if(mysql_query($select_morning)){    
	//print_r("select success");
	//}else{
	    //print_r("select failed"+mysql_error());
	//}
	
	//$result_evening = mysql_fetch_array($select_evening);
	//$result_date = mysql_fetch_array($select_date);
	
	
	
?>