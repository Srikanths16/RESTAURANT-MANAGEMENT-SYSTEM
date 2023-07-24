<?php


@include 'config.php';

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `favorite` WHERE id = '$remove_id'");
   header('location:fav.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($con, "DELETE FROM `favorite`");
   header('location:fav.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Favorite Food items</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Favorite Dishes</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>Time to prepare</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         // $name = $_SESSION["username"];
         // where username and date for new transaction 
         $select_cart = mysqli_query($con, "SELECT * FROM `favorite` where username='$_SESSION[username]'");
       
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="admin/food_items/menu/<?php echo $fetch_cart['item_image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['item_name']; ?></td>
            <td>₹<?php echo number_format($fetch_cart['item_prize']); ?>/-</td>
            <td>
            <?php echo $fetch_cart['time'];  ?>
            </td>
            <td><a href="fav.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from Favorite?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php  
            };
         };
         ?>
         
         <tr class="table-bottom">
            <td><a href="index.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="fav.php?delete_all" onclick="return confirm('are you sure you want to delete all from favorite?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>