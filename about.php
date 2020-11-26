<?php
	include('header.php');
	$today = date("Y-m-d<br>", time());
	//echo $today;
?>

<div class="about-section">
  <h1>About Us Page</h1>
  <p>This is a course project.</p>
  <p>IIT Ropar</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="src/team1.jpg" alt="Jitendra" style="width:47.6%">
      <div class="container">
        <h2>Jitendra Shukla</h2>
        <p class="title"></p>
        <p>2018EEB1232</p>
        <p>2018eeb1232@iitrpr.ac.in</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="src/team2.jpg" alt="Yogesh" style="width:50%">
      <div class="container">
        <h2>Yogesh Vaidhya</h2>
        <p class="title"></p>
        <p>2018EEB1277</p>
        <p>2018eeb1277@iitrpr.ac.in</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
<!-- 
  <div class="column">
    <div class="card">
      <img src="/w3images/team3.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>John Doe</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>john@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div> -->

</body>
</html>