<?php

 if(isset($_POST['submit'])){

    // $con = mysqli_connect('localhost','root','','menulist');

    $name = $_POST['name'];
    //$name = $_SESSION['username'];
    $phnum = $_POST['phnum'];
    $email= $_POST['email'];
    $tsize = $_POST['tsize'];
    $intention= $_POST['intention'];
    $dtime = $_POST['dtime'];
    $npeople= $_POST['npeople'];
    $info = $_POST['info'];

    $con = mysqli_connect('localhost','root','','menulist');
   
    if(!$con){
        die("Connection failed:".mysqli_connect_error());
    }

    // $insert = "INSERT INTO `userinfo`(`review`) VALUES ('$comment') WHERE (username = '$name')";
   $insert = "INSERT INTO `tableres`(`username`, `phnum`, `email`, `tsize`, `intention`, `dtime`, `npeople`, `info`, `approval`) VALUES ('$name','$phnum','$email','$tsize','$intention','$dtime','$npeople','$info',0)"; 

   if(mysqli_query($con,$insert)){
    echo "<script>window.alert('Your Table reservation interest has been noted..');</script>";
    header("location:index.php");
} else {
  echo "Error: " . $insert . "<br>" . mysqli_error($con);
  header("location:index.php");
}

mysqli_close($con);
  }

?>

