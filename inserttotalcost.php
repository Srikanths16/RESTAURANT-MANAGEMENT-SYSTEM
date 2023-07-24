<?php


include 'config.php';

//if(isset($_POST['order_btn'])){

   $name = $_SESSION['username'];
//   $name = $_POST['name'];
//    $number = $_POST['number'];
//    $email = $_POST['email'];
//    $method = $_POST['method'];
//    $flat = $_POST['flat'];
//    $street = $_POST['street'];
//    $city = $_POST['city'];
//    $state = $_POST['state'];
//    $country = $_POST['country'];
//    $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($con, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['item_name'] .' ('. $product_item['item_quantity'] .') ';
         $product_price = number_format($product_item['item_prize'] * $product_item['item_quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($con, "INSERT INTO `orders`(username, item_names, total_price) VALUES('$name','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
           
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

//}


?>