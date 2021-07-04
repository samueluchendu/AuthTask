<?php
session_start();
if(!isset($_SESSION['email'])){ header("Location: register.php");}

$email = $password = "";
$error = [];

function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (isset($_POST['login'])) {

	///Validate First Name;
	//Validate Email

	if (empty($_POST['email'])) {
		$error['email'] = 'email is required';
	} else {

		$email =  $_POST['email'];

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$error['email'] = 'Kindly enter a valid email address';
		}
	}


	//Validate Password

	if (empty($_POST['psw'])) {
		$error['password'] = 'password is required';
	} else {

		$password =  $_POST['psw'];

		if (strlen($password) < 6) {

			$error['password'] = 'Password must be equal or more than 6 characters';
		}
	}

	if ($email !== $_SESSION['email'] && $password !== $_SESSION['password']) {
		$error['incorrect_details'] = "Email and Password incorrect";
	} else {
		$_SESSION['success'] = "Welcome {$_SESSION['firstname']}";
		header("Location: dashboard.php");
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

		
		<h1>Login </h1>
		<?php if (!empty($error['incorrect_details'])) { ?> <p style="color:red; text-align:center"> <?php echo $error['incorrect_details']; ?> </p> <?php } ?>
		<div class="formcontainer">
			<div class="container">
				<label for="mail"><strong>E-mail</strong></label>
				<input type="text" placeholder="Enter E-mail" name="email">
				<?php if (!empty($error['email'])) { ?> <p style="color:red; text-align:center"> <?php echo $error['email']; ?> </p> <?php } ?>
				<label for="psw"><strong>Password</strong></label>
				<input type="password" placeholder="Enter Password" name="psw">
				<?php if (!empty($error['password'])) { ?> <p style="color:red; text-align:center">
					<?php	echo $error['password'];
						?> </p> <?php } ?>
			</div>
			<input type="submit" name="login"><strong></strong>

	</form>
</body>

</html>