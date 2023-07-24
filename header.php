<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>No_Waiters</title>

    

    <link rel="icon" href="logo.png">

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

<header>

<a href="#" class="logo"><i class="fas fa-utensils"></i> NoWaiters.com</a>

<!-- Navigation bar -->
<nav class="navbar" style="margin-top: 5px;">
    <a class="active" href="index.php#home">home</a>
    <a href="index.php#dishes">dishes</a>
    <a href="index.php#about">about</a>
    <!-- <a href="index.php#menu">menu</a> -->
    <a href="index.php#order">reservation</a>
    <a href="index.php#review">review</a>
    <a href="gameslink.php">games</a>
    <a href="timer.php">timer</a>
</nav>

<!-- Adding icon in the header 0. menu bars 1. Search 2. Favorite 3. Shopping Cart -->
<div class="icons">

    <!-- to do add separate for each of them -->
    <i class="fas fa-bars" id="menu-bars"></i>
    <i class="fas fa-search" id="search-icon"></i>
    <a href="fav.php" class="fas fa-heart"></a>
    <a href="cart.php" class="fas fa-shopping-cart"></a>
    <p>items in cart: <?php 

    session_start();
    //echo $_SESSION['username'];
    if(isset($_SESSION['username'])){

    $select_rows = mysqli_query($con, "SELECT * FROM `cart` where username='$_SESSION[username]'") or die('query failed');
    $row_count = mysqli_num_rows($select_rows);

    
    echo $row_count; 
    }
    ?></p>
</div>

<span>
          <p class="sub-heading">Hello,
          
            <?php 
            #session_start();
            if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
            echo "<i class='fas fa-user-shield'></i>";
            echo "<a href = 'login/logout.php' class='text-decoration-none' style='color:black'><br> logout<i class='fas fa-sign-out-alt'></i></a>";

            }
            else{
                echo "<a href = 'login/login.php' class='text-decoration-none' style='color:black'>login<i class='fas fa-user-shield'></i></a>";
            }
        ?></p>
        
        <!-- <a href="" class="text-decoration-none" style="color:black">Signout</a> -->
        <!-- <a href="" class="text-decoration-none">User panel</a> -->
      </span>

</header>


