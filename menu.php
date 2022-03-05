<?php

require 'connect.php';

if($conn){
   $sql="select * from menu";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
           echo'
           <div class="food">
                <div class="pic">
                    <img src="'.$row['foodimage'].'" alt="'.$row['foodname'].'-pic">
                </div>
                <p class="name">'.$row['foodname'].'</p>
                <p class="price">Starts at: <span>$'.$row['foodprice'].'</span></p>
                <form method="POST" action="order.php">
                <input type="hidden" name="foodid" value="'.$row['foodid'].'">
                <button class="order2" name="order" value="ordernow">Order meal</button>
                </form>
            </div>
           ';

       }

   }
}


?>