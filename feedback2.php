<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die("Database Connection Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'crazepgm');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
} 



$name = $_GET['feed'];

if (isset($_GET['feed'])) {
      foreach ($name as $feed){
        $sql="UPDATE feedback set defaults=1 where id=$feed ";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("location:"."feedback.php");
    }
} else {
     header("location:"."feedback.php");
}
