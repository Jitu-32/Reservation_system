<?php
    include('header.php');
?>
<?php 
 require 'dbconnect.php';

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


if(isset($_POST['submit']))
{

    $email_id=test_input($_POST['email_id']);
    $password=test_input($_POST['password']);
    //$password = md5($password);
    $username=test_input($_POST['username']);
    $credit=test_input($_POST['credit']);
    $address=test_input($_POST['address']);
    //$mobile=test_input($_POST['mobile']);
    //$city=test_input($_POST['city']);
    //$state=test_input($_POST['state']);
    
    
     // mysqli_query($con,"INSERT INTO `user_table` (`email_id`,`password`,`fullname`,`gender`,`age`,`mobile`,`city`,`state`) VALUES ('$email_id','$password','$fullname','$gender','$age','$mobile','$city','$state')") or die(mysql_error());
     // header("location:../index.php");

     $sql="INSERT INTO user(Username,password,Credit_card,Address)
     VALUES ('$username','$password','$credit','$address')";
     $result=mysqli_query($conn,$sql);
	header("location: sign_success.php");
} 

?>

			<script>
			function validate_from()
			{
				var x=document.forms["adform"]["email_id"].value;
				if(x==null || x=="")
				{
					alert("Enter your email_id");
					return false;
				}
				x=document.forms["adform"]["username"].value;
				if(x==null || x=="")
				{
					alert("Enter username");
					return false;
				}
				x=document.forms["adform"]["password"].value;
				if(x==null || x=="")
				{
					alert("Enter password");
					return false;
				}
				
				// x=document.forms["adform"]["gender"].value;
				// if(x==null || x=="")
				// {
				// 	alert("Enter gender");
				// 	return false;
				// }
				// x=document.forms["adform"]["age"].value;
				// if(x==null || x=="")
				// {
				// 	alert("Enter age");
				// 	return false;
				// }
				x=document.forms["adform"]["Credit"].value;
				if(x==null || x=="")
				{
					alert("Enter Credit card number");
					return false;
				}
				x=document.forms["adform"]["address"].value;
				if(x==null || x=="")
				{
					alert("Enter address");
					return false;
				}
				// x=document.forms["adform"]["state"].value;
				// if(x==null || x=="")
				// {
				// 	alert("Enter state");
				// 	return false;
				// }
			}
		</script>
			 
			  <div class="col-md-12 forminput">
				<form name="adform" action="" onsubmit="return validate_from()" method="post" class="form-horizontal" >
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Email ID</label>
					<div class="col-sm-8">
					  <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email_id">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">User Name</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="User Name" name="username">
					</div>
				  </div>
				  <!-- <div class="form-group">
					<label  class="col-sm-3 control-label">Gender</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Gender (M or F)" name="gender">
					</div>
				  </div> -->
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Credit card</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Credit card" name="credit">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Address</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Address" name="address">
					</div>
				  </div>
				  <!-- <div class="form-group">
					<label class="col-sm-3 control-label">Address</label>
  					
					<div class="col-sm-8">
					  <input class="form-control" type="tel" pattern="^\d{10}$" required name="address" placeholder="Address" >
					</div>
				  </div> -->
				  <!-- <div class="form-group">
					<label  class="col-sm-3 control-label">city</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="City" name="city">
					</div>
				  </div> -->
				  <!-- <div class="form-group">
					<label class="col-sm-3 control-label">state</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="State" name="state">
					</div>
				  </div> -->
				 
				  <div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
					  <a><input type="submit" value="Submit" name="submit" /></a>
					</div>
				  </div>
				</form>
				
			  </div>
<?php include('footer.php'); ?>
 

       