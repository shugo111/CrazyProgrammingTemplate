<?php
required 'connection.php';
session_start();


$e_id= $_SESSION['e_id'];
$p_id= $_SESSION['p_id'];

$nf=$_SESSION['nf'];
$stmt = $conn->prepare("INSERT into `testcase` (`e_id`,`p_id`,`input`) values('$e_id','$p_id',?)");
$stmt->bind_param("s", $input);
while($nf>0){
  $input=$_POST[$nf];
  $stmt->execute();
  $nf=$nf-1;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="file:///home/shru/Downloads/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="file:///home/shru/Downloads/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="Dashboard.css">
  
  <title>Add Competition</title>
</head>
<body>

	<nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background:#232f34">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#" style="color:#ffa852">Crazy Programming <br><h3 >Admin</h3> </a>
      <li>
        <a onClick="logout()" id="log" href="Login.php" class="navbar-brand pull-right" style="color:#F0F0F0"  >Logout</a>
    </li>
    </div>
  </nav>  


  <div class="sidenav">
    <br><br>
    <a href="Dashboard.php" >Leaderboard</a><br>
  <a href="event.php" >Events</a><br>
  <a href="addcomp.php" id="hell" active>Add Competition</a><br>
  <a href="changewei.php">Change weightage</a><br>
  <a href="checkwei.php">Current weightage</a><br>
  <a href="feedback.php">Feedback</a><br>
</div>
<br>
<br>
<div class="main">
		<div class="row" id="contain-card">
      <div class="col-md-8">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;">
      	<h5>Test cases</h5>
          </div>
<div class="card-body">
	<form>

		<h5>Test case added successfully!!!</h5>

            <br>
            <button type="submit" class="btn btn-primary" formaction="addcomp8.html">Add another question</button>

            <br>
            <br>
            <button type="submit" class="btn btn-primary" formaction="addcomp.php">Done</button>
        </form>
        </div>
    </div>
</div>
</div>
</body>
</html>
