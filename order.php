<?php
session_start();

$total=0;
if(!isset($_SESSION['tasty-food:user'])){
    header("location:index.php?errormessage=Please log in to order");
}else if(isset($_POST['order'])){
    if(isset($_SESSION['cart'])){
        $cartitems=array_column($_SESSION['cart'],'id');
        if(in_array($_POST['foodid'],$cartitems)){
            echo "product exists";
        }else{
              $counter=count($_SESSION['cart']);
              $item=array('id' =>$_POST['foodid']);
              $_SESSION['cart'][]=$item;
              
        }

            
    }else{
        $item=array('id' =>$_POST['foodid'] );
        $_SESSION['cart'][0]=$item;
    }

    
header("location:index.php#menu");   
}

if(isset($_POST['remove'])){
    
    foreach ($_SESSION['cart'] as $key => $value) {
        if($_POST['foodid']==$value['id']){
            unset($_SESSION['cart'][$key]);
            
        }
        
    }

}


?>

<?php


if(isset($_POST['insertorder'])){
    $food="";
    if(isset($_SESSION['cart'])){
       if(count($_SESSION['cart'])>0){
        $cartitems=array_column($_SESSION['cart'],'id');
        for($a=0;$a<count($cartitems);$a++){
            require 'connect.php';
            if($conn){
              $sql='select * from menu where foodid='.$cartitems[$a].';';
              if($result=mysqli_query($conn,$sql)){
                  while($row=mysqli_fetch_assoc($result)){
                      $total+=$row['foodprice'];
                      $food.=$row['foodname']." at $".$row['foodprice'].",";
                      
                      }
                     

                  }
              }
            }

        
        
          $sql3='insert into orders(userid,foodlist,total) values('.$_SESSION['tasty-food:user'].',"'.$food.'",'.$total.')';
          if($result3=mysqli_query($conn,$sql3)){      
            unset($_SESSION['cart']);
            echo '<script>window.location.href="index.php?cartmessage=Order made successfully"</script>';
        }

       }else{
        echo '<script>window.location.href="index.php?cartmessage=No items in cart"</script>';
       }
    }else{
        echo '<script>window.location.href="index.php?cartmessage=No items in cart"</script>';
       }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Italianno&family=Mulish:wght@200;300;400;500&family=Quicksand:wght@300;400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<?php
if(isset($_SESSION['tasty-food:user'])){
    // echo"<script>alert('".$_SESSION['tasty-food:user']."')</script>";
}


?>


<body>


    <div class="nav" style="background:#224122;">
        <a href="#" class="cartnum">cart <?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']);}else {
        echo 0;
    }?></a>

        <ul>
            <li class="link"><a href="index.php#home">Home</a></li>
            <li class="link"><a href="#about">About Us</a></li>
            <li class="link"><a href="#menu">Our Menu</a></li>
            <li class="link"><a href="#reviews">Reviews</a></li>
            <li class="link"><a href="#contact">Contact Us</a></li>
        </ul>

        <div class="navi">
            <div class="bar"></div>
        </div>

        <div class="account <?php if(isset($_SESSION['tasty-food:user'])){echo 'show';}?>"><i class="fa fa-user"></i>
            <p class="text"><?php if(isset($_SESSION['tasty-food:username'])){ echo $_SESSION['tasty-food:username'];}else{echo "login";} ?></p>
            <div class="logout hide" <?php if(!isset($_SESSION['tasty-food:username'])){ echo 'style="display:none"';}?>><a
                    href="logout.php">logout</a><br><a href="orders.php">My Orders</a></div>
        </div>

        <div class="social">
            <div class="icon">
                <i class="fab fa-facebook"></i>
            </div>
            <div class="icon">
                <i class="fab fa-instagram"></i>
            </div>
            <div class="icon">
                <i class="fab fa-whatsapp"></i>
            </div>
        </div>
    </div>

    <div class="orders">
        <div class="list">

            <p class="top">Meals To Order</p>

            <!-- <div class="orderitem">
    <div class="picture"></div>
    <div class="content">
        <p class="oname">foodname</p>
        <p class="odescribe">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sequi vero ipsam.</p>
        <p class="oprice">price</p>
         
    </div>
    <button></button>
    </div>
    <hr> -->


            <?php
      if(isset($_SESSION['cart'])){
          
$cartitems=array_column($_SESSION['cart'],'id');
for($a=0;$a<count($cartitems);$a++){
    require 'connect.php';
    if($conn){
      $sql='select * from menu where foodid='.$cartitems[$a].';';
      if($result=mysqli_query($conn,$sql)){
          while($row=mysqli_fetch_assoc($result)){
              $total+=$row['foodprice'];
              echo '
              
              

    <div class="orderitem">
    <div class="picture"><img src="'.$row['foodimage'].'"></div>
    <div class="content">
        <p class="oname">'.$row['foodname'].'</p>
        <p class="odescribe">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sequi vero ipsam.</p>
        <p class="oprice">$'.$row['foodprice'].'</p>
        <form method="POST" action="">
        <input type="hidden" name="foodid" value="'.$row['foodid'].'">   
    </div>
    <button name="remove" value="removed">Remove</button>
    </div>
    </form>
    <hr>';
          }
          
      }
    }
    
}
      }


    ?>
            <div class="orderitem">
                <p class="oprice" style="padding-left:2rem">Items ordered:&nbsp;<?php if(isset($_SESSION['cart'])){
            echo count($_SESSION['cart']);            
        }else{ echo 0;}?></p>
                <p class="odescribe" style="padding-left:2rem">delivery:$0</p>
                <p class="oname" style="text-align:right;padding-right:2rem">Total:&nbsp;$<?php echo $total;?></p>
                <form method="POST" action="">
                    <button name="insertorder" value="insertorder">Order now</button>
                </form>

            </div>
        </div>



    </div>


    <div class="footer">
        <div class="social" style="right: auto;left: 30px;top: 10px;display: flex;">
            <div class="icon">
                <i class="fab fa-facebook"></i>
            </div>
            <div class="icon">
                <i class="fab fa-instagram"></i>
            </div>
            <div class="icon">
                <i class="fab fa-whatsapp"></i>
            </div>
        </div>

        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dicta neque optio, delectus
            quaerat dolorem accusantium? Aspernatur, odit delectus ab quas corrupti, ducimus, omnis amet eligendi cumque
            itaque animi voluptate?</p>

        <div class="info">
            <p class="work1">Working&nbsp;Hours <span class="work2"></span></p>
            <p class="work">Weekdays &nbsp;&nbsp;<span class="work2">7:00am-9:00pm</span></p>
            <p class="work">Fridays&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span class="work2">7:00am-9:00pm</span>
            </p>
            <p class="work">Saturdays &nbsp;&nbsp;<span class="work2">7:00am-9:00pm</span></p>
            <p class="work">Sundays &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="work2">7:00am-9:00pm</span></p>
            <p class="work">Holidays&nbsp;&nbsp;&nbsp;&nbsp; <span class="work2">7:00am-9:00pm</span></p>

        </div>

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4456.659146017133!2d-0.19809775558924458!3d5.650492153519462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9c7ebaeabe93%3A0xd78257e67498c1a0!2sUniversity%20of%20Ghana!5e0!3m2!1sen!2sgh!4v1630226225683!5m2!1sen!2sgh"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <p class="copy">copyright &copy;BernardDwumfour 2022 </p>
    </div>
    <script src="script.js">

    </script>
</body>

</html>