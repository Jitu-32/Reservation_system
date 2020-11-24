<?php
    include('header.php');
?>
    <!-- Above code is same as index.php 
        Starting the code for admin login
    -->
<?php
    session_start();
    include("../dbconnect.php");
    if(isset($_POST["Submit"])){
        $coach = $_POST["train_coach"];
        $passenger_num = $_POST["P_num"];
        $train_num = $_POST["train_no"];
        $train_date = $_POST["train_date"];

        $tbl_name="trains"; // Table name
        mysqli_select_db($conn,"$db_name")or die("cannot select DB");

        if('$coach'=="AC"){      // AC Coach

            $sql="SELECT * FROM $tbl_name WHERE Train_num='$train_num' and train_date='$train_date'and avail_ac >= '$passenger_num'";
            $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);
            
            if(mysqli_num_rows($result) < 1)
            {
                echo " .... LOGIN TRY  ....";
                $_SESSION['error'] = "1";
                header("location:booknow.php"); 
            }
        }
        else{                   // Sleeper Coach

            $sql="SELECT * FROM $tbl_name WHERE Train_num='$train_num' and train_date='$train_date' and avail_sl='$passenger_num' ";
            $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);
            
            if(mysqli_num_rows($result) < 1)
            {
                echo " .... LOGIN TRY  ....";
                $_SESSION['error'] = "1";
                header("location:booknow.php"); 
            }
        }

        $tbl_name = "bookings";
        mysqli_select_db($conn,"$db_name") or die("cannot select DB");

        //Inserting into booking table
        $sql = "INSERT INTO $tbl_name (train_no,date,booked_by)
                VALUES ('$train_num','$train_date','1')";

        // Finding the current PNR number.
        $tbl_name="trains";
        mysqli_select_db($conn,"$db_name")or die("cannot select DB");
        $query = mysqli_query("SELECT MAX(pnr) as max_id FROM '$tbl_name'"); 
        $row = mysqli_fetch_array($query); 
        $cur_pnr = $row[‘max_id’];
        echo $cur_pnr ;

        $localvar = $passenger_num;
        $tbl_name = "ticket";
        
        if('$coach'=="AC"){
            $tbl_name="trains";
            mysqli_select_db($conn,"$db_name")or die("cannot select DB");
            $query = mysqli_query("SELECT * FROM $tbl_name WHERE train_no =='$train_num' and date == '$train_date'");
            $row = mysqli_fetch_array($query);
            $avail_ac = row['avail_ac'];
            $ac_seats = row['ac_seats'];
            $AC_sitting = array("LB","LB","UB","UB","SL","SU");
            $cur_ac = $ac_seats - $avail_ac;
            $net = $avail_ac-$passenger_num;
            $sql = "UPDATE $tbl_name SET avail_ac=$net WHERE Train_no =='$train_num' and date == '$train_date'";
            
            if($localvar > 0){       // Passenger 1
                $name1 = $_POST['name1'];
                $age1 = $_POST['age1'];
                $gender1 = $_POST['gender1']; 
                $temp = $cur_ac%6;
                $temp1= $temp+1;
                $temp2 = ($cur_ac+1)/18;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name1','$age1','$gender1','AC','AC_sitting[$temp]','$temp2','$temp1')";
                $cur_ac++;
                $localvar--;
            }

            if($localvar > 0){       // Passenger 2
                $name2 = $_POST['name2'];
                $age2 = $_POST['age2'];
                $gender2 = $_POST['gender2'];
                $temp = $cur_ac % 6;
                $temp1= $temp+1;
                $temp2 = ($cur_ac+1)/18;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name2','$age2','$gender2','AC','AC_sitting[$temp]','$temp2','$temp1')";
                $cur_ac++;
                $localvar--;
            }

            if($localvar > 0){       // Passenger 3
                $name3 = $_POST['name3'];
                $age3 = $_POST['age3'];
                $gende3 = $_POST['gender3'];  
                $temp = $cur_ac%6;
                $temp1= $temp+1;
                $temp2 = ($cur_ac+1)/18;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name3','$age3','$gender3','AC','AC_sitting[$temp]','$temp2','$temp1')";
                $cur_ac++;
                $localvar--;
            }

            if($localvar > 0){       // Passenger 4
                $name4 = $_POST['name4'];
                $age4 = $_POST['age4'];
                $gender4 = $_POST['gender4'];  
                $temp = $cur_ac%6;
                $temp1= $temp+1;
                $temp2 = ($cur_ac+1)/18;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name4','$age4','$gender4','AC','AC_sitting[$temp]','$temp2','$temp1')";
                $cur_ac++;
                $localvar--;
            }

            if($localvar > 0){       // Passenger 5
                $name5 = $_POST['name5'];
                $age5 = $_POST['age5'];
                $gender5 = $_POST['gender5']; 
                $temp = $cur_ac%6;
                $temp1= $temp+1;
                $temp2 = ($cur_ac+1)/18;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name5','$age5','$gender5','AC','AC_sitting[$temp]','$temp2','$temp1')";
                $cur_ac++;
                $localvar--;
            }
        }

        if('$coach'=="Sleeper"){
            $tbl_name="trains";
            mysqli_select_db($conn,"$db_name")or die("cannot select DB");
            $query = mysqli_query("SELECT * FROM $tbl_name WHERE Train_no =='$train_num' and date == '$train_date'");
            $row = mysqli_fetch_array($query);
            $avail_sl = row['avail_sl'];
            $sl_seats = row['sl_seats'];
            $SL_sitting = array("LB","MB","UB","LB","MB","UB","SL","SU");
            $cur_sl = $sl_seats - $avail_sl;
            $net = $avail_sl-$passenger_num;
            $sql = "UPDATE $tbl_name SET avail_sl=$net WHERE Train_no =='$train_num' and date == '$train_date'";

            if($localvar > 0){       // Passenger 1
                $name1 = $_POST['name1'];
                $age1 = $_POST['age1'];
                $gender1 = $_POST['gender1']; 
                $temp = $cur_sl%8;
                $temp1= $temp+1;
                $temp2 = ($cur_sl+1)/24;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name1','$age1','$gender1','SL','SL_sitting[$temp]','$temp2','$temp1')";
                $cur_sl++;
                $localvar--;
            }

            if($localvar > 0){       // Passenger 2
                $name2 = $_POST['name2'];
                $age2 = $_POST['age2'];
                $gender2 = $_POST['gender2']; 
                $temp = $cur_sl%8;
                $temp1= $temp+1;
                $temp2 = ($cur_sl+1)/24;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name2','$age2','$gender2','SL','SL_sitting[$temp]','$temp2','$temp1')";
                $cur_sl++;
                $localvar--;
            }

            if($localvar > 0){       // Passenger 3
                $name3 = $_POST['name3'];
                $age3 = $_POST['age3'];
                $gende3 = $_POST['gender3']; 
                $temp = $cur_sl%8;
                $temp1= $temp+1;
                $temp2 = ($cur_sl+1)/24;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name3','$age3','$gender3','SL','SL_sitting[$temp]','$temp2','$temp1')";
                $cur_sl++;
                $localvar--;
            }

            if($localvar > 0){       // Passenger 4
                $name4 = $_POST['name4'];
                $age4 = $_POST['age4'];
                $gender4 = $_POST['gender4']; 
                $temp = $cur_sl%8;
                $temp1= $temp+1;
                $temp2 = ($cur_sl+1)/24;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name4','$age4','$gender4','SL','SL_sitting[$temp]','$temp2','$temp1')";
                $cur_sl++;
                $localvar--;
            }

            if($localvar > 0){       // Passenger 5
                $name5 = $_POST['name5'];
                $age5 = $_POST['age5'];
                $gender5 = $_POST['gender5']; 
                $temp = $cur_sl%8;
                $temp1= $temp+1;
                $temp2 = ($cur_sl+1)/24;
                $sql = "INSERT INTO $tbl_name (PNR,Name, Age, Gender,Coach_type, seat_type, coach_no, seat_no)
                VALUES ('$cur_pnr','$name5','$age5','$gender5','SL','SL_sitting[$temp]','$temp2','$temp1')";
                $cur_sl++;
                $localvar--;
            }
        }

    }

?>

<div class="forms">
    <form action="booknow.php" method="post">
        Train Number : <input type="number" name="train_no" placeholder = "Enter train number"><br>
        Train Date   : <input type="date" name="train_date" placeholder = "Boarding Date"> <br>
        No. of Passengers : <input type="number" name="P_num" placeholder = "Enter no. of passengers"> <br>
        Coach Preferences : <input type="text" name="train_coach" placeholder = "Enter coach AC or Sleeper"> <br><br>
        Passenger1 Name : <input type="text" name="name1" placeholder = "Enter name"><br>
        Passenger1 Age : <input type="number" name="age1" placeholder = "Enter Age"><br>
        Passenger1 Gender : <input type="text" name="gender1" placeholder = "Male or Female"><br><br>
        Passenger2 Name : <input type="text" name="name1" placeholder = "Enter name"><br>
        Passenger2 Age : <input type="number" name="age1" placeholder = "Enter Age"><br>
        Passenger2 Gender : <input type="text" name="gender1" placeholder = "Male or Female"><br><br>
        Passenger3 Name : <input type="text" name="name1" placeholder = "Enter name"><br>
        Passenger3 Age : <input type="number" name="age1" placeholder = "Enter Age"><br>
        Passenger3 Gender : <input type="text" name="gender1" placeholder = "Male or Female"><br><br>
        Passenger4 Name : <input type="text" name="name1" placeholder = "Enter name"><br>
        Passenger4 Age : <input type="number" name="age1" placeholder = "Enter Age"><br>
        Passenger4 Gender : <input type="text" name="gender1" placeholder = "Male or Female"><br><br>
        Passenger5 Name : <input type="text" name="name1" placeholder = "Enter name"><br>
        Passenger5 Age : <input type="number" name="age1" placeholder = "Enter Age"><br>
        Passenger5 Gender : <input type="text" name="gender1" placeholder = "Male or Female"><br><br>
        <input type="submit" value="Submit" name="Submit">
    </form>

</div>


<?php
    include('footer.php');
?>

