<?php

session_start();

$email=$password="";
$emailvalid=$passvalid=$formvalid=$signedin=$accountexists=false;
if($_SERVER['REQUEST_METHOD']=='POST'){

    function validate($input){
        $input=trim($input);
        $input=stripslashes($input);
        $input=htmlspecialchars($input);
        return $input;
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

    if($emailvalid==true&&$passvalid==true){
        $password=md5($password);
        $formvalid=true;
        // echo 'valid';
        require 'connect.php';
        if($conn){
            // echo "connected";
            $sql1='select * from users where email = "'.$email.'" and password="'.$password.'" limit 1';
            $result1=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1)==1){
                $accountexists=true;
                $row=mysqli_fetch_assoc($result1);
                if($row['verified']==1){
                    $_SESSION['tasty-food:user']=$row['userid'];
                    $_SESSION['tasty-food:username']=$row['firstname'];
                    

                    // echo "account verified";
                    $signedin=true;
                }else{

                    // echo "not verified";
                    $signedin=false;
                }

            }else{
                // echo "account does not exist";
                $accountexists=false;
            }
        


    }  


}

}

$response= array('formvalid' =>$formvalid ,'accountexists'=>$accountexists,'signedin'=>$signedin,'emailvalid'=>$emailvalid,'passvalid'=>$passvalid);
$response=json_encode($response);
echo $response;


?>