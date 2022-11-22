<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		.container{
			margin-top: 8%;
			width: 400px;
			border: ridge 1.5px white;
			padding: 20px;
		}
		body{
			background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
	</style>
</head>
<body>
	<div>
		<?php
			if(isset($_POST['create'])){
				$firstname  = $_POST['firstname'];
				$lastname   = $_POST['lastname'];
				$phoneno    = $_POST['phoneno'];
				$email      = $_POST['email'];
				$password   = $_POST['password'];

				echo $firstname ." ".$lastname ." ".$phoneno ." ".$email ." ".$password; 
			}
		?>
	</div>
	<div class="container">
		<h2>Registration Form</h2>
	<form action="bootstrapform.php" method="post">
		<div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="firstname">
  </div>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="exampleInputlastname" name="lastname">
  </div>
  <div class="form-group">
    <label for="phoneno">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="phoneno">
  </div>
  <div class="form-group">
    <label for="Email1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" name="password">

  </div>
  <button type="submit" class="btn btn-primary" name="create">Sign up</button>
</form>
<div id="create-register-wrap">
    <p>Not a member? <a href="#">Sign up now!</a><p>
  </div><!--create-register-wrap-->
</div><!--form-group-wrap-->
</body>
</html>


