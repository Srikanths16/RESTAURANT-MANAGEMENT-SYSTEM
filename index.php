<!-- Suriyaprakash G -->
<!-- do all to do's ha ha -->
<!-- mainly add cart details -->
<!-- auto load from php code -->

<?php

@include 'config.php';

if(isset($_POST['addCart'])){

    $product_id = $_POST['p_id'];
   $product_name = $_POST['p_name'];
   $product_price = $_POST['p_price'];
   $product_image = $_POST['p_image'];
   $product_quantity = $_POST['p_quantity'];
   $ptime = $_POST['p_time'];
   $username = $_POST['username'];

   $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE item_name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($con, "INSERT INTO `cart`(id,item_name, item_prize, item_image, item_quantity, time, username) VALUES('$product_id','$product_name', '$product_price', '$product_image', '$product_quantity', '$ptime', '$username')");
      $message[] = 'product added to cart succesfully';
   }

}

// change to favorite section
if(isset($_POST['addfav'])){

   $product_id = $_POST['p_id'];
   $product_name = $_POST['p_name'];
   $product_price = $_POST['p_price'];
   $product_image = $_POST['p_image'];
   $ptime = $_POST['p_time'];
   $username = $_POST['username'];

   $select_cart = mysqli_query($con, "SELECT * FROM `favorite` WHERE item_name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to fav';
   }else{
      $insert_product = mysqli_query($con, "INSERT INTO `favorite`(id,item_name, item_prize, item_image, time, username) VALUES('$product_id','$product_name', '$product_price', '$product_image', '$ptime', '$username')");
      $message[] = 'product added to fav succesfully';
   }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="modules" src="/modules/firebase_utils.js"></script>

    <title>No_Waiters</title>

    <!-- links for addcart -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- CSS file for font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Linking CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<body>

    <?php require_once("header.php"); ?>


    <!-- Search form yet to develop -->
    <form action="" id="search-form">
        <input type="search" placeholder="search items..." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>

    <!-- Home page -->
    <!-- 1. Add functionality to order now button -->
    <!-- 2. Use variable to print repetive contents (almost done)-->
    <!-- 3. Take description automatically from the web -->

    <section class="home" id="home">

        <!-- adding automatic swiper from online css file -->
        <div class="swiper-container home-slider">

            <div class="swiper-wrapper wrapper">


                <?php

                include 'config.php';

                $record = mysqli_query($con, "SELECT * FROM `menu` where `home_items`=1");

                while ($row = mysqli_fetch_array($record))


                    echo "
                        <div class=\"swiper-slide slide\">
                        <div class=\"content\">
                            <span>Today's Special</span>
                        <h3>$row[item_name]</h3>
                            <p>special item of the day...</p>
                            <a href=\"#\" class=\"btn\">order now</a>
                        </div>
                        
                        <div class=\"image\">
                            <img src=\"admin/food_items/menu/$row[item_image]\" alt=\"$row[item_image]\">
                        </div>
                        
                            
                    </div>
                           
                        ";

                ?>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>


    <!-- Menu of items present in the restaurant -->
    <!-- TO DO'S -->
    <!-- 1. Could possibly move as a new page -->
    <!-- 2. Add php code so that automatically things get picture in small manner -->
    <!-- 3. Temporary rating make it functional -->
    <!-- 4. Add something like veg and non veg section -->
    <!-- 5. Add description and fav functionality -->
    <!-- 
    
        -->


    <section class="dishes" id="dishes">

        <h1 class="heading"> Menu Items </h1>
        <h3 class="sub-heading"> popular dishes </h3>
        <br>

        <div class="box-container">

        <?php

            include 'config.php';

            $record = mysqli_query($con, "SELECT * FROM `menu` where `home_items`=0");
            if(mysqli_num_rows($record) > 0){
            while ($row = mysqli_fetch_array($record)){
      ?>

<form action="" method="post">
                    
                    <div class="box">
                    
                    <img src="admin/food_items/menu/<?php echo $row['item_image']; ?>" alt="">
        
                
                    
                    <h3><?php echo $row['item_name']; ?></h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span>₹<?php echo $row['item_prize']; ?></span>
                    <br>
                    <input type="hidden" name="p_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name = "p_name" value="<?php echo $row['item_name']; ?>">
                    <input type="hidden" name = "p_price" value="<?php echo $row['item_prize']; ?>">
                    <input type="hidden" name = "p_time" value="<?php echo $row['time']; ?>">
                    <input type="hidden" name = "p_image" value="<?php echo $row['item_image']; ?>">
                    <input type="hidden" name = "p_time" value="<?php echo $row['time']; ?>">
                    <input type="hidden" name = "username" value="<?php echo $_SESSION['username']; ?>">

                    Quantity: <input type="number" name="p_quantity" min="1" max="10" placeholder = "0">
                    <br>
                    <button type="submit" name = "addCart" class="btn btn-warning my-3">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                    <button name = "addfav" class="btn btn-primary my-1">Add to Fav <i class="fas fa-heart"></i></button>

                   
                    </div>
                        
                    </form>

      <?php
         };
      };
      ?>

        </div>

    </section>


    <!-- About us section -->
    <?php include 'aboutus.php'; ?>

    <!-- extra menu section -->
    <!-- php include 'extramenu.php';-->

    <!-- order form -->
    <?php include 'order.php'; ?>

    <!-- comments or review section -->
    <?php include 'review.php'; ?>

    <!-- footer -->
    <?php include 'footer.php'; ?>
    <!-- Gif which will runs while running -->
    <div class="loader-container">
        <img src="images/loader2.gif" alt="">
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>