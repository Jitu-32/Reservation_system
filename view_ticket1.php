<?php 
    
session_start();
include('header.php'); 
require '../dbconnect.php';

mysqli_select_db($conn,"$db_name")or die("cannot select DB");
    
if(isset($_POST['pnr']))
{ 

    $pnr  = $_POST['pnr'];
    $pnr = trim($pnr);
    $pnr = stripslashes($pnr);
    $pnr = htmlspecialchars($pnr);
        
    echo $pnr;
    // $sql = "SELECT * FROM bookings WHERE pnr = '$pnr";
    // $train_detail = mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

    $query  =  "SELECT * FROM ticket WHERE pnr = '$pnr'";
    $result = mysqli_query($conn,$query) or trigger_error(mysql_error.$query);

?>
		<div class="col-md-12 forminput">
			<table class="table tablebg">
					<tr>
                        <th>Name</th>
						<th>Age</th>
						<th>Gender</th>
                        <th>Coach</th>
						<th>Coach No.</th>
						<th>Seat No.</th>
                        <th>Seat Type</th>
					</tr>
					
<?php 

	   

	// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    while( $row = mysqli_fetch_array($result) ) { 

?>
					<tr>
						<td><?php echo $row[1] ?></td>
						<td><?php echo $row[2] ?></td>
						<td><?php echo $row[3] ?></td>
						<td><?php echo $row[4] ?></td>
						<td><?php echo $row[5] ?></td>
                        <td><?php echo $row[6] ?></td>
                        <td><?php echo $row[7] ?></td>
					</tr>
<?php } ?>
				</table>
<?php } ?>	
			
    <div class="forms">
        <form action="view_ticket.php" method="post">
            PNR : <input type="number" name="pnr" required placeholder = "Enter Your PNR"><br>
            <input type="submit" value="Submit" name="Submit">
        </form>
    </div>

<?php 
    include('../footer.php'); 
?>
 
