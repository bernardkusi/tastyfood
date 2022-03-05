<?php
session_start();
$message="";
$rating=0;
$messagevalid=$ratingvalid=$loggedin=$rated=false;

if(!isset($_SESSION['tasty-food:user'])){
    $loggedin=false;
}else{
    $loggedin=true;
    function validate($input){
        $input=trim($input);
        $input=stripslashes($input);
        $input=htmlspecialchars($input);
        return $input;
    }

    if(empty($_POST['message'])){
        $messagevalid=false;
    }else{
        $message=validate($_POST["message"]);
        $messagevalid=true;
    }

    if(empty($_POST['rating'])){
        $ratingvalid=false;
    }else{
        $password=validate($_POST["rating"]);
        $ratingvalid=true;
    }

    if($messagevalid==true&&$ratingvalid==true&&$loggedin==true){
        $rated=true;
    }


}




$response= array('rated' =>$rated ,'loggedin' =>$loggedin ,'messagevalid'=>$messagevalid,'ratingvalid'=>$ratingvalid);
$response=json_encode($response);
echo $response;


?>