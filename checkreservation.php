<?php
session_start();
@include 'config.php';

if(isset($_POST['cancel'])){
     
      $username = $_POST['username'];  // 1 - approved 2-- disapproved 0-- waiting for approval
      $approve = 2;
      $insert_approval = mysqli_query($con, "DELETE FROM `tableres` WHERE username = '$username'");
      if($insert_approval){
        echo "<script>window.alert('Table reservation cancelled');</script>";
     };
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Reservation status</title>
    
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- CSS file for font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">

 

<!-- fetch data -->
<h1>Table Reservation details</h1>
<table class="table table-hover border my-5">
  
    
    <thead>
        <th>Customer Name</th>
        <th>Phone no.</th>
        <th>Email</th>
        <th>table size</th>
        <th>Reason of visit</th>
        <th>Time of reservation</th>
        <th>No. of people</th>
        <th>Extra info</th>
        <th>Canel</th>
        <th>Approval Status</th>
    </thead>

    <tbody>
        <?php

            include 'config.php';

            $i = 0;
            $record = mysqli_query($con,"SELECT * FROM `tableres` WHERE username ='$_SESSION[username]'");

            while($row = mysqli_fetch_array($record)){

        ?>
        <form action="" method="post">    
            <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['phnum']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['tsize']; ?></td>
            <td><?php echo $row['intention']; ?></td>
            <td><?php echo $row['dtime']; ?></td>
            <td><?php echo $row['npeople']; ?></td>
            <td><?php echo $row['info']; ?></td>
            <input type="hidden" name = "username" value="<?php echo $row['username']; ?>">
            <td><button name = "cancel" class="btn btn-danger my-1">Cancel</button></td>
            <td><?php 
            $app = $row['approval']; 

            if($app=='0'){
                echo "Waiting for approval";
            }
            else if($app=='1'){
                echo "Table reservation approved";
            }
            else if($app=='2'){
                echo "Table reservation denied";
            }
            
            ?>
        
            </td>
            </tr>
        </form>

        <?php
            };
        ?>
    </tbody>
    
    <!-- \"images/menu/$item_image\" alt=\"$item_image\"
            'C:\xampp\htdocs\food website\images\menu\.$row[item_image].' -->

</table>

</div>
    </div>
</div>

</body>
</html>