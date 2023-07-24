<?php
date_default_timezone_set("Asia/KolKata");

//$_SESSION['sec']=59;

//$_SESSION['start']="1:45:00";
?>

<a href="timer.php">timer</a>

<?php
@include 'config.php';

if(isset($_POST['order_btn'])){

//   $name = $_SESSION['name'];
   $name = $_POST['name'];
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
   $timer = $_SESSION['timer'];
   $detail_query = mysqli_query($con, "INSERT INTO `orders`(username, item_names, total_price, timer) VALUES('$name','$total_product','$price_total', '$timer')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for ordering!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : ₹".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
           
         </div>
            <a href='checkout.php' class='btn'>continue to get your bill</a>
         </div>
      </div>
      ";
   }

}

if(isset($_GET['bill'])){
   //mysqli_query($con, "DELETE FROM `cart`");
   header('location:print.php');
}

?>

<!-- extraa -->

<!--  <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p> -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['item_prize'] * $fetch_cart['item_quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['item_name']; ?>(<?= $fetch_cart['item_quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : ₹<?= $grand_total; ?>/- </span>
      </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
      
            <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

   <form action="print.php" method="post">
         <!-- <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div> -->
         
      <input type="submit" value="Produce Bill" name="bill_btn" class="btn">
<!--       
   <button type="submit" value="bill" name="bill_btn" class="btn"><a href="cart.php?bill="></a>Produce Bill</button> -->
   </form>

   <!-- <form action="">
      <button name="order_btn" class="btn">Submit Order</button>
   </form> -->

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>