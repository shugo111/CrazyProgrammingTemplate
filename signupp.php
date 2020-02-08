
<?php
require 'connection.php';
if(!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['Name'] and !empty($_POST['cpass']))){
		$username=trim(strtolower($_POST['username']));
        $password=trim($_POST['password']);
		$name=trim($_POST['Name']);
		
        $query="select * from `user` where email_id='$username'";
        $result=mysqli_query($connection,$query) or die(mysqli_error($connection));
        $count=mysqli_num_rows($result);
        if($count==1){
			$error="Email id already used";
	        header('location: '."Login&Registration.php?error2=$error");
			
        }
        else{
		   $query="insert into `user`(name,email_id,password) values('$name','$username','$password') ";
		   $abc=mysqli_query($connection,$query) or die(mysqli_error($connection));
		   $error="success";
		   if($abc){
			   header('location: '."Login&Registration.php?error2=$error");
		}
    }
}
    else{
        $error= "Enter valid username and password";
		header('location: '."Login&Registration.php?error2=$error");
    }
?>