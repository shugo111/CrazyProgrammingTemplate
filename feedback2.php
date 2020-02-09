<?php
require 'connection.php';

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

