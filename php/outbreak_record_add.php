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
    
    $username = $postData['username'];
    $datetime = $postData['input_day'];
    $medicine = $postData['input_medicine'];
    $datetime = $postData['input_day'];
    $recovertime = $postData['input_ReTime'];
    $treatment = $postData['input_treatment'];
    $details = $postData['input_detail'];
    
    
    $insert_sql = "INSERT INTO `outbreak_record`(`username`, `datetime`, `medicine`, `recovertime`, `treatment`, `description`) VALUES ('$username','$datetime','$medicine','$recovertime','$treatment','$details')";
    
    if(mysql_query($insert_sql)){
        print_r("insert_success!");
    }else{
        print_r("insert failed");
    }

?>