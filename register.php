<?php
session_start();

function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


	$firstName = $lastName = $email = $password = "";
	$error = []; 

	if (isset($_POST['submit'])) {

		  ///Validate First Name;
		if (empty($_POST['firstname'])) {
			  $error['firstname'] = 'firstname is required';
			} else {

				$firstName =  check_input($_POST['firstname']);

				if (!preg_match('/^[a-zA-Z]+$/', $firstName)) {
					 $error['firstname'] = 'Kindly enter a valid First name';
					} else {
							$_SESSION['firstname'] = $firstName;
							// Redirect user to Login page
							
						}
					}

			


	//Validate Last name
	
	if (empty($_POST['lastname'])) {
		$error['lastname'] = 'Lastname is required';
	} else {

		$lastName =  check_input($_POST['lastname']);

		if (!preg_match('/^[a-zA-Z]+$/',
			$lastName
		)) {
			$error['lastname'] = 'Kindly enter a valid Last name';
		} else {
			$_SESSION['lastname'] = $lastName;
			// Redirect user to Login page
			
		}
	}


	//Validate Email

	if (empty($_POST['email'])) {
		$error['email'] = 'email is required';
	} else {

		$email =  $_POST['email'];

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
			$error['email'] = 'Kindly enter a valid email address';
		} else {
			$_SESSION['email'] = $email;
			// Redirect user to Login page
			
		}
	}


	//Validate Password

	if (empty($_POST['psw'])) {
		$error['password'] = 'password is required';
	} else {

		$password =  $_POST['psw'];

		if (strlen($password) < 6) {

			$error['password'] = 'Password must be equal or more than 6 characters';
		} else {
			$_SESSION['password'] = $password;
			
		}
	}
	
	
	if(count($error) ==0){
		
		header("Location: login.php");
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">


</head>

<body>
	<form action=" " method="post">
		<h1>SIGN UP</h1>
		
		<div class="formcontainer">
			<div class="container">
				<label for="uname"><strong>First Name</strong></label>
				<input type="text" placeholder="Enter Username" name="firstname" >
				<p style:c><?php if(!empty($error['firstname'])){ echo $error['firstname']; } ?>	<br></p>
		 	<label for="uname"><strong>Last Name</strong></label>
				<input type="text" placeholder="Enter Username" name="lastname" >
				<?php if(!empty($error['lastname'])){ echo $error['lastname']; } ?>	<br>
				<label for="mail"><strong>E-mail</strong></label>
				<input type="text" placeholder="Enter E-mail" name="email" >
				<?php if(!empty($error['email'])){ echo $error['email']; } ?>	<br>
				<label for="psw"><strong>Password</strong></label>
				<input type="password" placeholder="Enter Password" name="psw" >
				<?php if(!empty($error['password'])){ echo $error['password']; } ?>	<br>
			</div>
			<input type="submit" name="submit"><strong></strong>
			
	</form>
</body>

</html>