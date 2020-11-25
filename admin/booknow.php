<?php
    session_start();
    include('header.php');
?> 
        <!-- Above code is same as index.php
            Starting the code for admin login
        -->
    <?php
        
        include("../dbconnect.php");
        if(isset($_POST["Submit"])){
            $coach = $_POST["train_coach"];
            $passenger_num = $_POST["P_num"];
            $train_num = $_POST["train_no"];
            $train_date = $_POST["train_date"];

            $tbl_name="trains"; // Table name
            mysqli_select_db($conn,"$db_name")or die("cannot select DB");


            // Train exist or not
            $train_exist    = "SELECT * FROM trains WHERE Train_no = '$train_num' and date= '$train_date' ";
            $res         =  mysqli_query($conn,$train_exist) or trigger_error(mysql_error.$train_exist);
            
            if(mysqli_num_rows($res) < 1)
            {
                    echo " .... LOGIN TRY  ....";
                    $_SESSION['error'] = "1";
                    header("location: train_not_exist.php");
            }


            if( $coach =="AC"){      // AC Coach

                $sql="SELECT * FROM trains WHERE Train_no= '$train_num' and date= '$train_date'and avail_ac >= '$passenger_num'";
                $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

                // if(mysqli_num_rows($result) < 1)
                // {
                //     echo " .... LOGIN TRY  ....";
                //     $_SESSION['error'] = "1";
                //     header("location:../index.php");
                // }
            }
            else{                   // Sleeper Coach

                $sql="SELECT * FROM trains WHERE Train_no='$train_num' and date='$train_date' and avail_sl >='$passenger_num' ";
                $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

                if(mysqli_num_rows($result) < 1)
                {
                    echo " .... LOGIN TRY  ....";
                    $_SESSION['error'] = "1";
                    header("location:../index.php");
                }
            }

            if(mysqli_num_rows($result) < 1)
            {
                echo " .... LOGIN TRY  ....";
                $_SESSION['error'] = "1";
                header("location:../index.php");
            }

            $tbl_name = "bookings";
            mysqli_select_db($conn,"$db_name") or die("cannot select DB");

            //Inserting into booking table
            $sql = "INSERT INTO $tbl_name (train_no,date,booked_by)
                    VALUES ('$train_num','$train_date','1')";

            // Finding the current PNR number.
            $tbl_name="trains";
            // mysqli_select_db($conn,"$db_name")or die("cannot select DB");
            // $query = "SELECT MAX('pnr') as max_id FROM trains";
            // $result= mysqli_query($conn,$query);
            // $row   =   mysqli_fetch_array($result);
            // $cur_pnr = $row["max_id"];
            $cur_pnr = 0;
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                $cur_pnr = $last_id;
                //$_SESSION['cur_pnr'] = $cur_pnr;
                // echo "New record created successfully. Last inserted ID is: " . $last_id;
                }
                else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            //echo $cur_pnr ;

            $localvar = $passenger_num;
            echo $localvar;
            $tbl_name = "ticket";

            if($coach =="AC"){
                $tbl_name="trains";
                mysqli_select_db($conn,"$db_name")or die("cannot select DB");
                $query  = "SELECT * FROM trains WHERE train_no ='$train_num' and date = '$train_date'";
                $result = mysqli_query($conn,$query);
                // if ($conn->query($sql) === TRUE) {
                //     $last_id = $conn->insert_id;
                //     $cur_pnr = $last_id;
                //     echo "New record created successfully. Last inserted is acccc " . $last_id;
                //   } else {
                //     echo "Error: " . $sql . "<br>" . $conn->error;
                // }
                $row = mysqli_fetch_array($result);
                $avail_ac = $row[8];
                //echo $row["train_no"] . "<br> ";
                // echo $row[1] . "<br> ";
                // echo $row[2] . "<br> ";
                // echo $row[3] . "<br> ";
                // echo $row[4] . "<br> ";
                // echo $row[5] . "<br> ";
                // echo $row[6] . "<br> ";
                // echo $row[7] . "<br> ";
                // echo $row[8] . "<br> ";
                $ac_seats = $row[6];
                $AC_sitting = array("LB","LB","UB","UB","SL","SU");
                $cur_ac = $ac_seats - $avail_ac;
                $net = $avail_ac-$passenger_num;
                $sql = "UPDATE trains SET avail_ac = '$net' WHERE Train_no ='$train_num' and date = '$train_date'";
                //$query  = "SELECT * FROM trains WHERE train_no ='$train_num' and date = '$train_date'";
                $result = mysqli_query($conn,$sql);

                if($localvar > 0){       // Passenger 1
                    $name1 = $_POST['name1'];
                    $age1 = $_POST['age1'];
                    $gender1 = $_POST['gender1'];
                    // echo $name1 ;
                    $temp = ($cur_ac )% 6;
                    $temp1= $cur_ac + 1;
                    $temp2 = ($cur_ac)/18 + 1;
                    echo $cur_pnr;
                    echo $name1;
                    echo $temp;
                    $sql = "INSERT INTO ticket (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                    VALUES ('$cur_pnr','$name1','$age1','$gender1','AC','$AC_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    echo $row[0];

                    $cur_ac++;
                    $localvar--;
                }

                if($localvar > 0){       // Passenger 2
                    $name2 = $_POST['name2'];
                    $age2 = $_POST['age2'];
                    $gender2 = $_POST['gender2'];
                    $temp = ($cur_ac )% 6;
                    $temp1= $cur_ac + 1;
                    $temp2 = ($cur_ac)/18 + 1;
                    $sql = "INSERT INTO ticket (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                    VALUES ('$cur_pnr','$name2','$age2','$gender2','AC','$AC_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_ac++;
                    $localvar--;
                }

                if($localvar > 0){       // Passenger 3
                    $name3 = $_POST['name3'];
                    $age3 = $_POST['age3'];
                    $gender3 = $_POST['gender3'];
                    $temp = ($cur_ac )% 6;
                    $temp1= $cur_ac + 1;
                    $temp2 = ($cur_ac)/18 + 1;
                    $sql = "INSERT INTO ticket (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                    VALUES ('$cur_pnr','$name3','$age3','$gender3','AC','$AC_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_ac++;
                    $localvar--;
                }

                if($localvar > 0){       // Passenger 4
                    $name4 = $_POST['name4'];
                    $age4 = $_POST['age4'];
                    $gender4 = $_POST['gender4'];
                    $temp = ($cur_ac )% 6;
                    $temp1= $cur_ac + 1;
                    $temp2 = ($cur_ac)/18 + 1;
                    $sql = "INSERT INTO ticket (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                    VALUES ('$cur_pnr','$name4','$age4','$gender4','AC','$AC_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_ac++;
                    $localvar--;
                }

                if($localvar > 0){       // Passenger 5
                    $name5 = $_POST['name5'];
                    $age5 = $_POST['age5'];
                    $gender5 = $_POST['gender5'];
                    $temp = ($cur_ac )% 6;
                    $temp1= $cur_ac + 1;
                    $temp2 = ($cur_ac)/18 + 1;
                    $sql = "INSERT INTO ticket (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                    VALUES ('$cur_pnr','$name5','$age5','$gender5','AC','$AC_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_ac++;
                    $localvar--;
                }
            }

            if($coach == "SL"){
                $tbl_name="trains";
                mysqli_select_db($conn,"$db_name")or die("cannot select DB");
                $query = "SELECT * FROM trains WHERE Train_no = '$train_num' and date = '$train_date'";
                $result=mysqli_query($conn,$query);
                $row = mysqli_fetch_array($result);
                $avail_sl = $row[7];
                $sl_seats = $row[5];
                $SL_sitting = array("LB","MB","UB","LB","MB","UB","SL","SU");
                $cur_sl = $sl_seats - $avail_sl;
                $net = $avail_sl-$passenger_num;
                $sql = "UPDATE trains SET avail_sl= '$net' WHERE Train_no ='$train_num' and date = '$train_date'";
                $result = mysqli_query($conn,$sql);


                if($localvar > 0){       // Passenger 1
                    $name1 = $_POST['name1'];
                    $age1 = $_POST['age1'];
                    $gender1 = $_POST['gender1'];
                    $temp = ($cur_sl )% 8;
                    $temp1= $cur_sl + 1;
                    $temp2 = ($cur_sl + 1)/24 + 1;
                    $sql = "INSERT INTO ticket
                    VALUES ('$cur_pnr','$name1','$age1','$gender1','SL','$SL_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_sl++;
                    $localvar--;
                }

                if($localvar > 0){       // Passenger 2
                    $name2 = $_POST['name2'];
                    $age2 = $_POST['age2'];
                    $gender2 = $_POST['gender2'];
                    $temp = ($cur_sl )% 8;
                    $temp1= $cur_sl + 1;
                    $temp2 = ($cur_sl + 1)/24 + 1;
                    $sql = "INSERT INTO ticket 
                    VALUES ('$cur_pnr','$name2','$age2','$gender2','SL','$SL_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_sl++;
                    $localvar--;
                }

                if($localvar > 0){       // Passenger 3
                    $name3 = $_POST['name3'];
                    $age3 = $_POST['age3'];
                    $gender3 = $_POST['gender3'];
                    $temp = ($cur_sl )% 8;
                    $temp1= $cur_sl + 1;
                    $temp2 = ($cur_sl + 1)/24 + 1;
                    $sql = "INSERT INTO ticket 
                    VALUES ('$cur_pnr','$name3','$age3','$gender3','SL','$SL_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_sl++;
                    $localvar--;
                }

                if($localvar > 0){       // Passenger 4
                    $name4 = $_POST['name4'];
                    $age4 = $_POST['age4'];
                    $gender4 = $_POST['gender4'];
                    $temp = ($cur_sl )% 8;
                    $temp1= $cur_sl + 1;
                    $temp2 = ($cur_sl + 1)/24 + 1;
                    $sql = "INSERT INTO ticket 
                    VALUES ('$cur_pnr','$name4','$age4','$gender4','SL','$SL_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_sl++;
                    $localvar--;
                }

                if($localvar > 0){       // Passenger 5
                    $name5 = $_POST['name5'];
                    $age5 = $_POST['age5'];
                    $gender5 = $_POST['gender5'];
                    $temp = ($cur_sl )% 8;
                    $temp1= $cur_sl + 1;
                    $temp2 = ($cur_sl + 1)/24 + 1;
                    $sql = "INSERT INTO ticket
                    VALUES ('$cur_pnr','$name5','$age5','$gender5','SL','$SL_sitting[$temp]','$temp2','$temp1')";
                    $result=mysqli_query($conn,$sql);
                    $cur_sl++;
                    $localvar--;
                }
            }
            echo "Your Current PNR IS :  ".$cur_pnr;
        }

        if(isset($_POST["Logout"])){
            session_unset();
            session_destroy();
            setcookie(PHPSESSID,session_id(),time()-1);
            header("location:../index.php");
        }

    ?>

    <div class="forms">
        <form action="booknow.php" method="post">
            Train Number : <input type="number" name="train_no" required placeholder = "Enter train number"><br>
            Train Date   : <input type="date" name="train_date"  id = "train_date" required placeholder = "Boarding Date"> <br>
            No. of Passengers : <input type="number" name="P_num" placeholder = "Enter no. of passengers"> <br>
            Coach Preferences : <input type="text" name="train_coach" placeholder = "Enter coach AC or Sleeper"> <br><br>
            Passenger1 Name : <input type="text" name="name1" placeholder = "Enter name"><br>
            Passenger1 Age : <input type="number" name="age1" placeholder = "Enter Age"><br>
            Passenger1 Gender : <input type="text" name="gender1" placeholder = "Male or Female"><br><br>
            Passenger2 Name : <input type="text" name="name2" placeholder = "Enter name"><br>
            Passenger2 Age : <input type="number" name="age2" placeholder = "Enter Age"><br>
            Passenger2 Gender : <input type="text" name="gender2" placeholder = "Male or Female"><br><br>
            Passenger3 Name : <input type="text" name="name3" placeholder = "Enter name"><br>
            Passenger3 Age : <input type="number" name="age3" placeholder = "Enter Age"><br>
            Passenger3 Gender : <input type="text" name="gender3" placeholder = "Male or Female"><br><br>
            Passenger4 Name : <input type="text" name="name4" placeholder = "Enter name"><br>
            Passenger4 Age : <input type="number" name="age4" placeholder = "Enter Age"><br>
            Passenger4 Gender : <input type="text" name="gender4" placeholder = "Male or Female"><br><br>
            Passenger5 Name : <input type="text" name="name5" placeholder = "Enter name"><br>
            Passenger5 Age : <input type="number" name="age5" placeholder = "Enter Age"><br>
            Passenger5 Gender : <input type="text" name="gender5" placeholder = "Male or Female"><br><br>
            <input type="submit" value="Submit" name="Submit">
        </form>

        

        <form action="booknow.php" method = "post">
            <input type="submit" value="Logout" name="Logout">
        </form>

    </div>


    <!--
    <?php
        include('footer.php');
    ?> -->
