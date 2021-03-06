<?php
session_start();
if(isset($_SESSION['tasty-food:user'])){
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Dish</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Italianno&family=Mulish:wght@200;300;400;500&family=Quicksand:wght@300;400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>




<body>
    <!-- <div class="cover"></div> -->

    <div  style="top:7.5rem;" class=" <?php if(isset($_SESSION['tasty-food:username'])){ echo'off"';}else{echo 'signupform"';}?>>
        <div class="close"><i class="fa fa-times"></i></div>
        <h4 class="label">Create a new account.</h4>
        <p class="errormessage"> </p>
        <label for="fname">Type in your first name</label>
        <input type="text" id="fname" name="fname">
        <small class="error">error</small>
        <label for="lname">Type in your Surname</label>
        <input type="text" id="sname" name="sname">
        <small class="error">error</small>
        <label for="email">Type in your email</label>
        <input type="text" id="email" name="email">
        <small class="error">error</small>
        <label for="password">Type in your Password</label>
        <input type="password" id="password" name="password">
        <small class="error">error</small>
        <label for="cpassword">Please confirm your password</label>
        <input type="password" id="cpassword" name="cpassword">
        <small class="error">error</small>
        <p class="switch"> Already have an account? <br> <span class="change">Click Here</span> to sign in</p>
        <button id="signup">Sign Up</button>
    </div>

    <div class=" <?php if(isset($_SESSION['tasty-food:username'])){ echo'off"';}else{echo 'signinform"';}?> <?php if(isset($_GET['errormessage'])){ if(!isset($_SESSION['tasty-food:user'])){echo'style="display:block;opacity:1"';}}?>>
        <div class="close"><i class="fa fa-times"></i></div>
        <h4 class="label">Log in to my account.</h4>
        <p class="errormessage"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage'];}?></p>
        <label for="email2">Type in your email</label>
        <input type="text" id="email2" name="email2">
        <small class="error">error</small>
        <label for="password2">Type in your Password</label>
        <input type="password" id="password2" name="password2">
        <small class="error">error</small>
        <p class="switch"> Dont have an account? <br><span class="change">Click Here</span> to sign up</p>
        <button id="signin">Sign in</button>
    </div>

    <div class="nav">

    <a href="order.php" class="cartnum">cart <?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']);}else {
        echo 0;
    }?></a>

        <ul>
            <li class="link"><a href="#home">Home</a></li>
            <li class="link"><a href="#about">About Us</a></li>
            <li class="link"><a href="#menu">Our Menu</a></li>
            <li class="link"><a href="#reviews">Reviews</a></li>
            <li class="link"><a href="#contact">Contact Us</a></li>
        </ul>

        <div class="navi">
            <div class="bar"></div>
        </div>

        <div class="account <?php if(isset($_SESSION['tasty-food:user'])){echo 'show';}?>" onclick="<?php if(!isset($_SESSION['tasty-food:user'])){echo 'showsignintop()';}?>"><i class="fa fa-user"></i>
            <p class="text"><?php if(isset($_SESSION['tasty-food:username'])){ echo $_SESSION['tasty-food:username'];}else{echo "login";} ?></p>
            <div class="logout hide" <?php if(!isset($_SESSION['tasty-food:username'])){ echo 'style="display:none"';}?>><a href="logout.php">logout</a><br><a href="orders.php">My Orders</a></div>
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
    <div id="home" class="page">

        <h1 class="intro">Tasty<span class="green">Dish</span></h1>
        <p class="intro2">Feel The Taste Of Home.</p>
        <button class="order"><a href="tel:0592724408">Order now</a></button>
    </div>
    <div id="about" class="page">
        <h1 class="heading">Here's a little to know about us</h1>

        <p class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, fugiat dolores! Deleniti nisi
            sapiente aliquam necessitatibus reiciendis aspernatur reprehenderit neque, atque, quibusdam sit voluptates
            inventore. Consectetur labore quasi nisi excepturi ad! Tenetur expedita veniam dolorum adipisci animi non
            nam neque? Exercitationem ea itaque aliquid atque nihil eligendi reiciendis quasi nisi! Lorem ipsum dolor,
            sit amet consectetur adipisicing elit. A, molestias ullam itaque maiores saepe odio esse ipsam possimus!
            Dignissimos, nam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos a maxime placeat tempore
            porro, voluptates adipisci illo reiciendis quae itaque! Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Assumenda id esse reiciendis expedita sunt porro quaerat minima aperiam harum cupiditate.
        </p> <br><br>

        <h1 class="heading">We offer the following services</h1>
        <div class="servicebox">
            <div class="box">
                <p class="main">Large Occasions</p>
                <img src="party-people (1).png" alt="Delivery">
                <p class="describe">We accept large orders for various occations</p>
            </div>
            <div class="box">
                <p class="main">Delivery service</p>
                <img src="delivery (2).png" alt="Delivery">
                <p class="describe">Get your meals delivered to any location within the shortest time possible</p>
            </div>
            <div class="box">
                <p class="main">Booking/reservation</p>
                <img src="hotel-booking-date.png" alt="Delivery">
                <p class="describe">Have a table specially reserved for you on request.</p>
            </div>
            <div class="box">
                <p class="main">Delivery service</p>
                <img src="love-dinner.png" alt="Delivery">
                <p class="describe">Get your meals delivered to any location within the shortest time possible</p>
            </div>
        </div>
    </div>

    <div id="menu" class="page">
        <h1 class="heading">Meals on our menu</h1>
        <div class="menubox">
            <!-- <div class="food">
                <div class="pic">
                    <img src="food3.jpg" alt="burger-pic">
                </div>
                <p class="name">Food name</p>
                <p class="price">Starts at: <span>$3</span></p>
                <button class="order2">Order meal</button>
            </div>
            <div class="food">
                <div class="pic">
                    <img src="food3.jpg" alt="burger-pic">
                </div>
                <p class="name">Food name</p>
                <p class="price">Starts at: <span>$3</span></p>
                <button class="order2">Order meal</button>
            </div> -->
            <?php
            
            require_once 'menu.php';

            ?>
            <!-- <div class="food">
                <div class="pic">
                    <img src="food3.jpg" alt="burger-pic">
                </div>
                <p class="name">Food name</p>
                <p class="price">Starts at: <span>$3</span></p>
                <button class="order2">Order meal</button>
            </div>
            <div class="food">
                <div class="pic">
                    <img src="food3.jpg" alt="burger-pic">
                </div>
                <p class="name">Food name</p>
                <p class="price">Starts at: <span>$3</span></p>
                <button class="order2">Order meal</button>
            </div>
            <div class="food">
                <div class="pic">
                    <img src="food3.jpg" alt="burger-pic">
                </div>
                <p class="name">Food name</p>
                <p class="price">Starts at: <span>$3</span></p>
                <button class="order2">Order meal</button>
            </div>
            <div class="food">
                <div class="pic">
                    <img src="food3.jpg" alt="burger-pic">
                </div>
                <p class="name">Food name</p>
                <p class="price">Starts at: <span>$3</span></p>
                <button class="order2">Order meal</button>
            </div>
            <div class="food">
                <div class="pic">
                    <img src="food3.jpg" alt="burger-pic">
                </div>
                <p class="name">Food name</p>
                <p class="price">Starts at: <span>$3</span></p>
                <button class="order2">Order meal</button>
            </div> -->
        </div>
    </div>

    <div id="reviews" class="page">
        <h1 class="heading" style="color: rgb(34, 65, 34);">What people say about us</h1>
        <div class="contain">
            <p class="commentor">Ernest Ghansah</p>
            <p class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum saepe quasi consectetur
                maxime esse modi
                doloribus error ducimus suscipit eligendi!</p>
            <div class="rating">
                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i>
            </div>
        </div>
        <div class="contain">
            <p class="commentor">Ernest Ghansah</p>
            <p class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum saepe quasi consectetur
                maxime esse modi
                doloribus error ducimus suscipit eligendi!</p>
            <div class="rating">
                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
            </div>
        </div>
        <div class="contain">
            <p class="commentor">Ernest Ghansah</p>
            <p class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum saepe quasi consectetur
                maxime esse modi
                doloribus error ducimus suscipit eligendi!</p>
            <div class="rating">
                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                        class="fa fa-star"></i> <i class="fa fa-star"></i></div>
            </div>
        </div>
        <div class="contain">
            <p class="commentor">Ernest Ghansah</p>
            <p class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum saepe quasi consectetur
                maxime esse modi
                doloribus error ducimus suscipit eligendi!</p>
            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i></div>
        </div>
        <div class="contain">
            <p class="commentor">Ernest Ghansah</p>
            <p class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum saepe quasi consectetur
                maxime esse modi
                doloribus error ducimus suscipit eligendi!</p>
            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i> <i class="fa fa-star"></i></div>
        </div>

    </div>

    <div id="contact" class="page">

        <h1 class="heading" style="color: #ffffff;">Contact Us</h1>

        <div class="container">

            <div class="contactbox">
                <div class="form">
                    <h4 class="label">Send Us A Message</h4>
                    <label for="name">Type in your name</label>
                    <input type="text" id="name" name="name">
                    <small class="error">error</small>
                    <label for="email1">Type in your email</label>
                    <input type="text" id="email1" name="email1">
                    <small class="error">error</small>
                    <label for="message">Your message here</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    <small class="error">error</small>
                    <button id="sendmessage">Send message</button>
                </div>
            </div>

            <div class="contactbox">
                <div class="form2">
                    <h4 class="label">Add my review</h4>
                    <label for="message2">Your review here</label>
                    <textarea name="message2" id="message2" cols="30" rows="10"></textarea>
                    <small class="error">error</small>
                    <label for="message2">Rate us</label>
                    <input type="radio" class="rating" name="rating" id="star1" value="1">
                    <label for="star1" class="fa fa-star"></label>
                    <input type="radio" class="rating" name="rating" id="star2" value="2">
                    <label for="star2" class="fa fa-star"></label>                    
                    <input type="radio" class="rating" name="rating" id="star3" value="3">
                    <label for="star3" class="fa fa-star"></label>
                    <input type="radio" class="rating" name="rating" id="star4" value="4">
                    <label for="star4" class="fa fa-star"></label>
                    <input type="radio" class="rating" name="rating" id="star5" value="5">
                    <label for="star5" class="fa fa-star"></label>
                    <small class="error">error</small>
                    <button id="sendreview">Submit Review</button>
                </div>

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

            <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4456.659146017133!2d-0.19809775558924458!3d5.650492153519462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9c7ebaeabe93%3A0xd78257e67498c1a0!2sUniversity%20of%20Ghana!5e0!3m2!1sen!2sgh!4v1630226225683!5m2!1sen!2sgh"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="info">
            <p class="work1">Working&nbsp;Hours <span class="work2"></span></p>
            <p class="work">Weekdays &nbsp;&nbsp;<span class="work2">7:00am-9:00pm</span></p>
            <p class="work">Fridays&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span class="work2">7:00am-9:00pm</span></p>
            <p class="work">Saturdays &nbsp;&nbsp;<span class="work2">7:00am-9:00pm</span></p>
            <p class="work">Sundays &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="work2">7:00am-9:00pm</span></p>
            <p class="work">Holidays&nbsp;&nbsp;&nbsp;&nbsp; <span class="work2">7:00am-9:00pm</span></p>

        </div>

        

        <p class="copy">copyright &copy;BernardDwumfour 2022 </p>
    </div>
    <script src="script.js">

    </script>
</body>

</html>