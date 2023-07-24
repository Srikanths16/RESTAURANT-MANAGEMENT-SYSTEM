
<!-- Make it from php -->

<section class="review" id="review">

    <h1 class="heading"> customer's review </h1>
    <h1 class="sub-heading"> check out what they have said about us...</h1>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">

            <?php 
            

            $con = mysqli_connect('localhost','root','','menulist');

            $record = mysqli_query($con, "SELECT * FROM `review`");
            
            while ($row = mysqli_fetch_array($record))
            echo "<div class=\"swiper-slide slide\">
            <i class=\"fas fa-quote-right\"></i>
            <div class=\"user\">
                <img src=\"images/user/userimg.png\" alt=\"\">
                <div class=\"user-info\">
                    <h3>$row[username]</h3>
                    <div class=\"stars\">
                        <p>$row[rating]<i class=\"fas fa-star\"></i></p>
                    </div>
                </div>
            </div>
            <p>$row[comment]</p>
        </div>";

            ?>

        </div>

    </div>

    
    
</section>

<section class="order" id="order">

    <h3 class="sub-heading"> Say something about our service</h3>
    
    <form action="insertreview.php" method="POST">
    <div class="inputBox">
    <div class = "input"> 
            <span>Name: </span>
            <input name="name" id="name" type="text" placeholder="Enter your name">
        </div>
        <div class="input">
                    <span>Stars:</span>
                    <input type="number" name="stars" placeholder="Enter rating" min="1" max="5">
                </div>
        <div class = "input"> 
        <span>Review: </span>
            <input type = "text" name="comment" cols="30" rows="10" placeholder="Share your thoughts...">
        </div>
    </div>
    <input type="submit" name = "submit" value="submit" class="btn">
    </form>

</section>