<?php
required 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel=”stylesheet” href=”css/bootstrap.css”>
<link rel=”stylesheet” href=”css/bootstrap-responsive.css”>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="file:///C:/Users/sonar/Downloads/bootstrap-4.4.1-dist/css/bootstrap.min.css">

  <script type="text/javascript" src="file:///C:/Users/sonar/Downloads/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="Dashboard.css"><div id="formFooter">
  
  <title></title>
</head>


<body>


 <nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background:#232f34">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#" style="color:#ffa852">Crazy Programming <br><h3 >Admin</h3> </a>
      <li>
        <a onClick="logout()" id="log" href="Login.html" class="navbar-brand pull-right" style="color:#F0F0F0"  >Logout</a>
    </li>

    </div>
  </nav>


  <div class="sidenav">
    <br><br>
  <a href="Dashboard.html" id="hell" active>Leaderboard</a><br>
  <a href="Event.html">Upcoming events</a><br>
  <a href="Addcomp.html">Add Competition</a><br>
  <a href="weitage.html">Change weightage</a><br>
  <a href="Wei.html">Current weightage</a><br>
</div>


<div class="main">
  <form method="POST" action="Dashboard2.php">
<label>Choose the event name:</label><br><br>
<div class="form-check">
  <?php
  $sel="SELECT ename from event";
  $res=mysqli_query($conn,$sel) or die(mysqli_error($result));
  $r=mysqli_num_rows($res);
                  if ($r > 0) {
// output data of each row
                while($row = mysqli_fetch_assoc($res)) { ?>
  <input type="radio" class="form-check-input" name="radio" value="<?php echo $row['ename']; ?>" >
  <label class="form-check-label" for="Event name"> <?php echo $row['ename'] ?> </label><br>
<?php } }
  ?>

</div>
<br><br>
<input type="submit" name="submit">
</form>

</body>
</html>
