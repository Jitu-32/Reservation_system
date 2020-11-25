<?php

    session_start();
	include('header.php');
    $today = date("Y-m-d<br>", time());
    //$pnr = $_SESSION['pnr'];
    //echo $pnr ;
	//echo $today;
?>
	

    <h1> Your booking is succesful. </h1>
<?php
    
    $pnr = $_SESSION['pnr'];
    echo "Your pnr is ".$pnr ;
?>    

</body>
</html>