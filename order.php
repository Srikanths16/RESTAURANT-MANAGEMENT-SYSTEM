

<!-- ORDER SECTION -->
<!-- 1. Make login page instead of getting details here -->
<!-- 2. Make section for on time pick delivery -->
<!--  -->

<section class="order" id="order">

    <h3 class="heading"> Table Reservation </h3>
    <h3 class="sub-heading"> Book Table from Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="circular--square" src="images\user\tablereservation.png" alt="table reservation" height="100px"> </h3>
    <p></p>
    
    <br>

    <form action="insertorder.php" method="POST">

        <div class="inputBox">
            <div class="input">
                <span>name</span>
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div class="input">
                <span>Phone number </span>
                <input type="number" name="phnum" placeholder="Enter your number">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>Email</span>
                <input type="email" name="email" placeholder="Enter your email id" required>
                
            </div>
            <div class="input">
                <span>Table size</span>
                <!-- <input type="text" placeholder="enter table size"> -->

                <select class="custom-select" name="tsize" id="tsize">
                    <optgroup label="Table size">
                    <option value="2">2 capacity</option>
                    <option value="4">4 capacity</option>
                    <option value="6">6 capacity</option>
                    </optgroup>
                                      
                    </select>

            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>Intention of visit</span>
                    <select name="intention" id="reason">
                    <optgroup label="Celebration">
                    <option value="Birthday">Birthday</option>
                    <option value="Aniversary">Aniversary</option>
                    <option value="Party">Party</option>
                    </optgroup>
                    <optgroup label="Normal">
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    </optgroup>
                    
                    
                    </select>
            </div>
            <div class="input">
                <span>When do your want to reserve??</span>
                <input type="datetime-local" name="dtime">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>How many persons are coming to eat?</span>
                <input type="number" name="npeople" placeholder="how many persons" min="1" max="10">
            </div>
            <div class="input">
                <span>Any other information to you want us to know??</span>
                <input name="info" placeholder="enter your message" id="" cols="30" rows="10">
            </div>
        </div>

        <input type="submit" name="submit" value="Reverse my Table" class="btn">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="checkreservation.php" class="btn">Check your reservation details</a>

    </form>
    

</section>