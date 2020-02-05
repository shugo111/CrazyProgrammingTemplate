
<?php
require 'connection.php';
$emailid=$_POST['username'];
$msg="Click on the given link to reset your password http://localhost/crazy/trendy/forgetpass.php?e=$emailid";

$msg=wordwrap($msg,50);
$query="select * from `user` where email_id='$emailid'";
        $result=mysqli_query($connection,$query) or die(mysqli_error($connection));
        $count=mysqli_num_rows($result);
        if($count==1){
            if(mail($emailid,"Reset Link",$msg,'From: visvig66@gmail.com')){
               echo "Mail has been sent";
            }
	        else
			   echo "fail";
        }
        else{
		
             $error ='Not Registered, Please Sign Up';
			 header('location: '."forgetpass.php?error=$error");
		}
?>