<html>
<?php
require 'connection.php';
$error="";
if(!empty($_POST['username']) and !empty($_POST['password'])){
		$username=trim($_POST['username']);
        $password=trim($_POST['password']);
        $query="select * from `user` where email_id='$username' and password='$password'";
        $result=mysqli_query($connection,$query) or die(mysqli_error($connection));
        $count=mysqli_num_rows($result);
        if($count==1){
                $_SESSION['username']=$username;
	        header('location: '.'index.php');
			
        }
        else{
		
             $error ='Invalid Login Credentials';
			 header('location: '."Login&Registration.php?error=$error");
		}
    }
    else{
        $error= "Enter valid username and password";
		header('location: '."Login&Registration.php?error=$error");
    }
?>
</html>