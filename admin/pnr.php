<?php

    session_start();
	include('header.php');
    $today = date("Y-m-d<br>", time());
    //$pnr = $_SESSION['pnr'];
    //echo $pnr ;
	//echo $today;
?>
	

    <h1> Booking is succesful. </h1>
<?php
    
    $pnr = $_SESSION['pnr'];
    echo "Pnr is ".$pnr ;
?>    

</body>
</html>