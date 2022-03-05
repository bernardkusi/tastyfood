<?php

session_start();

$fname=$sname=$email=$password="";
$fnamevalid=$snamevalid=$emailvalid=$passvalid=$formvalid=$messagesent=$accountexists=$signedup=$added=false;

if($_SERVER['REQUEST_METHOD']=='POST'){

    function validate($input){
        $input=trim($input);
        $input=stripslashes($input);
        $input=htmlspecialchars($input);
        return $input;
    }

    if(empty($_POST['fname'])){
        $fnamevalid=false;}
        else{
        $fname=validate($_POST["fname"]);
        $fnamevalid=true;
    }

    if(empty($_POST['sname'])){
        $snamevalid=false;
    }else{
        $sname=validate($_POST["sname"]);
        $snamevalid=true;
    }

    if(empty($_POST['email'])){
        $emailvalid=false;
    }else{
        $email=validate($_POST["email"]);
        $emailvalid=true;
    }

    if(empty($_POST['password'])){
        $passvalid=false;
    }else{
        $password=validate($_POST["password"]);
        $passvalid=true;
    }

    $vkey=time();
    // $vkey=md5($vkey);

    if($fnamevalid==true&&$snamevalid==true&&$emailvalid==true&&$passvalid==true){
        $password=md5($password);
        $formvalid=true;
        // echo 'valid';


        require 'connect.php';
    if($conn){
    $sql1='select * from users where email = "'.$email.'"';
    $result1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result1)==1){
        // echo "details exist";
        $accountexists=true;

        
    }else{
        $accountexists=false;
        $sql='insert into users(firstname,surname,email,password,vkey) values("'.$fname.'","'.$sname.'","'.$email.'","'.$password.'",'.$vkey.')';
    if($result=mysqli_query($conn,$sql)){
        
        // echo 'success';
        $added=true;
        $sql2='select * from users where email = "'.$email.'" and password="'.$password.'" limit 1';
            $result2=mysqli_query($conn,$sql2);
            if(mysqli_num_rows($result2)==1){
                $row=mysqli_fetch_assoc($result2);
                if($row['verified']==1){
                    $_SESSION['tasty-food:user']=$row['userid'];
                    $_SESSION['tasty-food:username']=$row['firstname'];

                    // echo "account verified";
                    $signedup=true;
                }

            }
    }else{
        // echo 'error';
        $added=false;
    }
    }
    
    }

    }else{
        $formvalid==false;
        // echo 'invalid';
    }

    
}



$response= array('formvalid' =>$formvalid,'signedup'=>$signedup ,'accountexists'=>$accountexists,'fnamevalid'=>$fnamevalid,'snamevalid'=>$snamevalid,'emailvalid'=>$emailvalid,'passvalid'=>$passvalid,'added'=>$added );
$response=json_encode($response);
echo $response;


?>