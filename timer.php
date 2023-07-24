<?php 
include "config.php";
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting timer</title>
    
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- CSS file for font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
</head>


<script>
$(document).ready(function(){
	

//var output = $('h1');
var isPaused = false;
var time = 0;

var t = window.setInterval(function() 
{
  if(!isPaused) 
  {
	//time++;
   // output.text("Seconds: " + time);
   $("#result_shops").load('time.php');
  }
}, 1000);

//with jquery
$('.pause').on('click', function(e) 
{
  e.preventDefault();
  isPaused = true;
});

$('.play').on('click', function(e) 
{
  e.preventDefault();
  isPaused = false;
});


});
</script>



<body>
    
<br><br><br><br><br><br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">

<!-- fetch data -->
<h1>Food waiting timer</h1>
<table class="table table-hover border my-5">
    
    <thead>
        <th><h1><div class="sub_shops">Timer</div></h1></th>
        <th><h1><div id="result_shops"></div></h1></th>
    </thead>

    <tbody> 
            
            <tr>
            <td><button class="play">Play</button></td>
            <td><button class="pause">Pause</button></td>
            </tr>
            <tr>
              <td>
              Our chefs are preparing your order as fast as they can...
              </td>
              <td>Use waiting time by playing games in new tab...</td>
            </tr>
    </tbody>

</table>

</div>
    </div>
</div>

</body>
</html>



