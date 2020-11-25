<?php
    session_start();
    include('header.php');
?>
    <!-- Above code is same as index.php 
        Starting the code for admin login
    -->
<?php
    
    include('dbconnect.php');

    if(isset($_POST["Submit"])){
        $uname=$_POST['username'];
        $pass=$_POST['password'];
        $tbl_name="admin"; // Table name
        mysqli_select_db($conn,"$db_name")or die("cannot select DB");
        $sql="SELECT * FROM $tbl_name WHERE username='$uname' and password='$pass'";

        $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

        if(mysqli_num_rows($result) < 1)
        {
            echo " .... LOGIN TRY  ....";
            $_SESSION['error'] = "1";
            header("location:login_error.php"); 
            exit();
        }
        else
        {
            $_SESSION['name'] = $uname; 
            echo " ....   LOGIN  ....";
            echo $_SESSION['name'];
            header("location:admin/admin_home.php");
        }
    }
?>

<div class="forms">
    <form action="admin_login.php" method="post">
        User Name : <input type="text" name="username" placeholder="Enter username"><br>
        Password  :  <input type="password" name="password" placeholder="Enter password"><br>
        <input type="submit" value="Submit" name="Submit">
    </form>
</div>


<?php
    include('footer.php');
?>

