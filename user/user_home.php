  
<?php include('header.php'); ?>
             
                        <div class="about-section">
                                <h1>User Home</h1>
                                <!-- <p>This is a course project.</p>
                                <p>IIT Ropar</p> -->
                            </div>
             <div class="col-md-12 menu mycss">
           
                       <div class="list-group homelist">
               <?php 
                       session_start();
                       //echo $_SESSION['sid'];
                       if(True)
                       {
                           $_SESSION['myvar']=session_id();
                   ?>

             <!-- <a href="../user/view_schedule.php" class="list-group-item" >View Schedule</a><br>
             <a href="../user/view_ticket.php" class="list-group-item">View Your Bookings</a><br>
             <a href="../user/booknow.php"class="list-group-item">Book Now</a><br>
             <a href="../user/PNR.php"class="list-group-item">PNR Status</a><br>
             <a href="../user/cancel.php"class="list-group-item">Cancel Your Booking</a> 
             <a href="../user/train_between_stations.php" class="list-group-item">Train Between Stations</a><br>
             <a href="../user/logout.php"class="list-group-item">Logout</a> -->
               <?php 
                        }
                       else
                       {
                           header("location:login.php");
                       }
                   ?>
           </div>


           
                             </div>

                             
<?php include('footer.php'); ?>