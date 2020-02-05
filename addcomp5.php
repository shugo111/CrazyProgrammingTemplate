<?php
required 'connection.php';
session_start();
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
        <a onClick="logout()" id="log" href="Login.html" class="navbar-brand pull-right" style="color:#F0F0F0"  >Logout</a>
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
<?php
  $e_id= $_SESSION['e_id'];         //values from form
  $pname= $_POST['pname'];
  $sample_input = $_POST['sampleinput'];
  $sample_output = $_POST['sampleoutput'];
  $constraints = $_POST['constraints'];
  $description=$_POST['description'];
  $samplepgm=$_POST['samplepgm'];

  $sql="INSERT into problem(pname,description,constraints,sample_input,sample_output,sample_pgm,e_id) values ('$pname','$description','$constraints','$sample_input','$sample_output','$samplepgm','$e_id')";  //insert values into database
  $result=mysqli_query($conn,$sql) or die(mysqli_error($result));
                    $p_id = $conn->insert_id;
            $_SESSION['p_id']=$p_id;   //store the resent created record id
?>
<br>
<div class="main">
    

    <div class="row" id="contain-card">
      <div class="col-md-8">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;">
          <b>Upcoming events</b>
          </div>
          <form method="POST" action="addcomp6.php">
          <div class="card-body">
            <h4 class="ui-title text-sec-headline-xs">Add test cases:</h4>
            <br><br>
            

            <h7>Add test case inputs:</h7><br>
            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="input" required>
              Test case inputs
            
            </textarea>
            </div>
            <br>

            
            
            <br>
            <br>
            <button type="submit" class="btn btn-primary" formaction="addcomp6.php">Add test case</button>
          </form>
          </div>
        </div>
      </div>
    </div>

</div>
</body>
</html>
