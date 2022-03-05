<?php

session_start();
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
        <a href="order.php" class="cartnum">cart <?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']);}else {
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
            <div class="logout hide" style="height:30px"<?php if(!isset($_SESSION['tasty-food:username'])){ echo 'style="display:none"';}?>><a
                    href="logout.php">logout</a></div>
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

    <div class="myorders">

    

    <?php
    require_once 'connect.php';
    if($conn){
        $sql='select * from orders where userid ='.$_SESSION['tasty-food:user'].';';
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            echo'<h3>Orders Made</h3>
            <table>
                
            <tr>
            <td>Order Date</td>
            <td>Meals Ordered</td>
            <td>Total cost</td>
            </tr>';
            while ($row=mysqli_fetch_assoc($result)){

                echo'<tr>
                <td>'.$row['orderdate'].'</td>
                <td>'.$row['foodlist'].'</td>
                <td>$'.$row['total'].'</td>
                </tr>';
            }

        }else{
            echo '<p class="noorder">No orders have been made for this account</p>';
        }

    }

    
    ?>
    


    </table>
    
    
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
