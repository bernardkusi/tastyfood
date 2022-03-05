<?php

$name=$email=$message="";
$emailvalid=$namevalid=$messagevalid=$formvalid=$messagesent=false;
if($_SERVER['REQUEST_METHOD']=='POST'){

    function validate($input){
        $input=trim($input);
        $input=stripslashes($input);
        $input=htmlspecialchars($input);
        return $input;
    }

    if(empty($_POST['name'])){
        $namevalid=false;}
        else{
        $name=validate($_POST["name"]);
        $namevalid=true;
    }

    if(empty($_POST['email'])){
        $emailvalid=false;
    }else{
        $email=validate($_POST["email"]);
        $emailvalid=true;
    }

    if(empty($_POST['message'])){
        $messagevalid=false;
    }else{
        $message=validate($_POST["message"]);
        $messagevalid=true;
    }

    if($emailvalid==true&&$namevalid==true&&$messagevalid==true){
        
        $to="bernardkusi25@gmail.com";
        $subject="Tasty Dish message";
        $message=$message;
        $header="From:".$email."\r\n";
        $header.="MINI-Version:1.0\r\n";
        $header.="Content-typr:text/html\r\n";
        if(mail($to,$subject,$message,$header)){
            $messagesent=true;

        }else{
            $messagesent=false;

           
        }

    }

    $response= array('messagesent' =>$messagesent,'namevalid'=>$namevalid,'messagevalid'=>$messagevalid,'emailvalid'=>$emailvalid );
$response=json_encode($response);
echo $response;



}
?>