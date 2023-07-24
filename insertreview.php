<?php

 if(isset($_POST['submit'])){

    // $con = mysqli_connect('localhost','root','','menulist');

    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $stars= $_POST['stars'];

    $con = mysqli_connect('localhost','root','','menulist');
   
    if(!$con){
        die("Connection failed:".mysqli_connect_error());
    }

    // $insert = "INSERT INTO `userinfo`(`review`) VALUES ('$comment') WHERE (username = '$name')";
   $insert = "INSERT INTO `review`(`username`,`comment`,`rating`) VALUES ('$name','$comment','$stars')"; 
   if(mysqli_query($con,$insert)){
    header("location:index.php");
} else {
  echo "Error: " . $insert . "<br>" . mysqli_error($con);
  header("location:index.php#review");
}

mysqli_close($con);
  }

?>

