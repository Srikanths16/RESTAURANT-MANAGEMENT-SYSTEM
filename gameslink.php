<?php 
include "config.php";
include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Games</title>
    
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- CSS file for font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <br><br><br><br><br>
    <br><br><br><br><br>
    
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">


<!-- fetch data -->
<h1>List of games</h1>
<table class="table table-hover border my-5">
  
    <thead>
        <th>ID</th>
        <th>Games name</th>
        <th>Start playing</th>
    </thead>

    <tbody>
       
            
            <tr>
            <td>1</td>
            <td>Snake game</td>
            
            <td><button name="snake" class="bg-primary fd-4 fw-bold my-3 text-white" value="start"><a href="games/snakegame/snake.html" class="text-white" style="text-decoration:none">start</a></button></td>
            </tr>

            <tr>
            <td>2</td>
            <td>Sudoku game</td>
            <td><button name="snake" class="bg-danger fd-4 fw-bold my-3 text-white" value="start"><a href="games/sudoku/sudoku.html" class="text-white" style="text-decoration:none">start</a></button></td>
            </tr>

            <tr>
            <td>3</td>
            <td>TIC-TAC-TOE</td>
            <td><button name="snake" class="bg-primary fd-4 fw-bold my-3 text-white" value="start"><a href="games/TIC-TAC-TOE/tictactoe.html" class="text-white" style="text-decoration:none">start</a></button></td>
            </tr>
            
            <tr>
            <td>4</td>
            <td>3D-Chess</td>
            <td><button name="snake" class="bg-danger fd-4 fw-bold my-3 text-white" value="start"><a href="games/3D-chess/index.html" class="text-white" style="text-decoration:none">start</a></button></td>
            </tr>

            <tr>
            <td>5</td>
            <td>Tower game</td>
            <td><button name="snake" class="bg-primary fd-4 fw-bold my-3 text-white" value="start"><a href="games/tower_game/index.html" class="text-white" style="text-decoration:none">start</a></button></td>

            </tr>
    </tbody>

</table>

</div>
    </div>
</div>

</body>
</html>