<?php


session_start();
//session_destroy();

// if(isset($_SESSION['username'])){

    echo "<br>Item quantity:";
    $item_quan = $_POST['p_quantity'];
    echo "<br>Quantity: $item_quan";
    $item_price = $_POST['p_price'];
     echo "<br>Price: $item_price";
    
    $item_name = $_POST['p_name'];
    echo "<br>Name: $item_name";

    $item_time = $_POST['p_time'];
    echo "<br>Time: $item_time";
    



if(isset($_POST['addCart'])){

    
    // $_SESSION['cart'][] = array('iname' => $item_name, 'iprice' => $item_price,'iquantity' => $item_quan );
    // print_r($_SESSION['cart']);

        // array name iname is linked in incaart
        $_SESSION['cart'][] = array('iname' => $item_name, 'iprice' => $item_price,'iquantity' => $item_quan ,'itime'=> $item_time);
        print_r($_SESSION['cart']);
        header("location:incart.php");
     }

     // removing product

if(isset($_POST['remove'])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value['iname'] === $_POST['item']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header('location:incart.php');
        }
    }
}

// update product // changed item to item_name

if(isset($_POST['update'])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value['iname'] === $_POST['item']){
            $_SESSION['cart'][$key] = array('iname' => $item_name, 'iprice' => $item_price,'iquantity' => $item_quan ,'itime'=> $item_time);
            //print_r($_SESSION['cart']);
            header("location:incart.php");
         } 
        }
    }


    

    
 

?>