<?php


@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET item_quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($con, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>Time to prepare</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         // $name = $_SESSION["username"];
         // where username and date for new transaction 
         $select_cart = mysqli_query($con, "SELECT * FROM `cart` where username='$_SESSION[username]'");
         $grand_total = 0;
         $total_time = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="admin/food_items/menu/<?php echo $fetch_cart['item_image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['item_name']; ?></td>
            <td>₹<?php echo number_format($fetch_cart['item_prize']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['item_quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>₹<?php echo $sub_total = number_format($fetch_cart['item_prize'] * $fetch_cart['item_quantity']); ?>/-</td>
            <?php $sub_time = number_format($fetch_cart['time'] * $fetch_cart['item_quantity']); ?>
            <td>
            <?php echo $fetch_cart['time']; 
            
            ?>

            </td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
           $total_time += $sub_time;
            };
         };
         ?>
         
         <tr class="table-bottom">
            <td><a href="index.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>₹<?php echo $grand_total; ?>/-</td>
            <td><?php echo number_format($total_time/3, 2, '.', '')?>mins</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>
         
   <div class="checkout-btn">
      <form action="checkout.php" method="post">
      <input type="hidden" name="timer1"  value="<?php echo (($total_time/$row_count)*60); ?>" >
      <?php

      $_SESSION['timer'] = ($total_time/$row_count)*60;
      
      if(isset($_SESSION['username'])){

         // counting the number of chefs
         $select_rows = mysqli_query($con, "SELECT * FROM `userinfo` where role='3'") or die('query failed');
         $row_count = mysqli_num_rows($select_rows);

         }

      ?>

      <?php $_SESSION['time']=(($total_time/$row_count)*60); ?>
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
      </form>
      
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>