<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>

<?php

 include 'header.php';


?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center bg-light mb-5 rounded">
                <br><br><br><br>
                <h1 class = "text-warning">My Cart</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-9">
                <table class = "table table-bordered text-center">
                    <thead class="bg-danger text-white fs-5">
                        <th>No.</th>
                        <th>Item name</th>
                        <th>Item price</th>
                        <th>Item quantity</th>
                        <th>Total Price</th>
                        <th>Time to cook</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        
                    <?php
                        
                        //session_start();
                        $gtotal = 0;
                        $total = 0;
                        if(isset($_SESSION['cart'])){
                            foreach($_SESSION['cart'] as $key => $value){
                               $total = $value['iprice']*$value['iquantity'];
                                $gtotal += $value['iprice']*$value['iquantity'];
                                
                                $ttime = $value['itime']*$value['iquantity'];
                                $totime += $value['itime']*$value['iquantity'];
                                $i = ($key+1);

                                $_SESSION['number'] = $i;

                                echo
                                "
                                <form action='insertcart.php' method = 'POST'>
                                <tr>
                                <td>$i</td>
                                <td><input type = 'hidden' name= 'p_name' value='$value[iname]' > $value[iname]</td>
                                <td><input type = 'hidden' name= 'p_price' value='$value[iprice]' > $value[iprice]</td>
                                <td><input type = 'text' name= 'p_quantity' value='$value[iquantity]' >$value[iquantity]</td>
                                <td>$total</td>
                                <td>$ttime</td>
                                <td><button name = 'update' class = 'btn-warning'> Update </button></td>
                                <td><button name='remove' class='btn-danger' > Delete </button></td>
                                <td><input type = 'text ' name='item' value = '$value[iname]'></td>
                                </tr>
                                </form>";
                            }
                        }

                        

                        ?>



                    </tbody>



                </table>
            </div>

           <div class="col-lg-3">
            <h3>Total Price </h3>
             <h4>₹<?php echo $gtotal?></h4>
             <h3>Total time </h3>
             <h4><?php echo $totime/$i?> minutes</h4>
           </div> 
 
        </div>
    </div>
    
</body>
</html>