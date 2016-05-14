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
	print_r($postData['input_medicine']);
	
	$username = $postData['username'];
	$date = $postData['input_day'];
	$medicine = $postData['input_medicine'];
	$times = $postData['input_times'];
	$pef = $postData['input_pef'];
    $symtom1 = $postData['input_sym1'];
	$symtom2 = $postData['input_sym2'];
	$symtom3 = $postData['input_sym3'];
	$descript = $postData['input_detail'];
	
	$insert_sql = "INSERT INTO `daily_record`(`username`, `date`, `times`, `medicine`, `pef`, `symtom1`, `symtom2`, `symtom3`, `descript`) VALUES ('$username','$date','$times','$medicine','$pef','$symtom1','$symtom2','$symtom3','$descript')";
	
	$process_sql_morning = "INSERT INTO `daily_record_processed`(`username`, `date`, `morning_PEF`, `sym1`, `sym2`, `sym3`) VALUES ('$username','$date','$pef','$symtom1','$symtom2','$symtom3')";
	
	$process_sql_evening = "UPDATE `daily_record_processed` SET `evening_PEF`='$pef',`gap_PEF`= ABS(`morning_PEF`-`evening_PEF`),`sym1`= 'true',`sym2`='true',`sym3`= 'true' WHERE `username`='$username' and `date`= '$date'";
	
	$process_sql_evening_new = "INSERT INTO `daily_record_processed`(`username`, `date`, `evening_PEF`, `sym1`, `sym2`, `sym3`) VALUES ('$username','$date','$pef','$symtom1','$symtom2','$symtom3')";
	
	if(mysql_query($insert_sql)){
	    print_r("insert success");
	    if($times=='morning'){
	        mysql_query($process_sql_morning);
	        print_r("morning processed success");
	    }else{
	        if(mysql_query($process_sql_evening)){
	            print_r("evening update processed success");
	        }else{
	            mysql_query($process_sql_evening_new);
	            print_r("evening create processed success");
	        }
	    }
	    
	}else{
	    print_r("insert failed");
	}
?>