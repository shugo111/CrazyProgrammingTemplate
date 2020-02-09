<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link
	rel ="stylesheet"
	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhnd0JK28anvf"
	crossorigin="anonymous"
/>

<link rel="stylesheet" href="css/Login&Registration.css" />
<title>Analytics Genix</title>
</head>
<body>
	<div class="container" id="container">
	<div>
	<div class="form-container sign-up-container">
		<form action=signupp.php method="POST"> <!-- sign up -->
			<h2>Create Account</h2>
			<div class="social-container">
                            <span>Enter the email that you want to register</span>
			</div>
			<input type="text" placeholder="Name" name="Name"/>
			<input type="email" placeholder="Email" name="username" />
			<input type="password" placeholder="Password" name="password" id="pass1" onkeyup='check();' required >
			<input type="password" placeholder="Confirm password" name="cpass" id="pass2" onkeyup='check();' required>
			<span id="mess"></span>
			<br>
			<button type="submit" value="signup" id="submit" disabled>Sign Up</button>
			<h3 style="color:red"><?php
              if(isset($_GET['error2'])){
				echo $_GET['error2'];
			 }
			?> </h3>
		</form>
	</div>
			</div>
	<div class="form-container sign-in-container"> <!-- sign in -->
		<form action=signinp.php method="POST">
			<h2>Sign in</h2>
			<div class="social-container">
			<span>Enter the registered email ID</span>
			</div>
			<input type="email" placeholder="Email" name="username"/>
			<input type="password" placeholder="Password" name="password"/>
			<a href="resetpass.html">Forgot your password?</a>
			<button type="submit" value="signin">Sign In</button>
			<h3 style="color:red"><?php
              if(isset($_GET['error'])){
				echo $_GET['error'];
			 }
			?></h3> 
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h2>Welcome Back!</h2>
				<p>To continue coding, please login here!</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h2>Click here to be part of our Crazy Community!</h2>
				<p>Enter your personal details and start your journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src="js/Login&Registration.js"></script>
<script>
function check() {
  if (document.getElementById('pass1').value == document.getElementById('pass2').value) {
    document.getElementById('mess').innerHTML = '';
	document.getElementById('submit').disabled = false;
  } else {
    document.getElementById('mess').style.color = 'red';
    document.getElementById('mess').innerHTML = 'Password not matching';
	document.getElementById('submit').disabled = true;
  }
}
</script>
</body>
</html>
