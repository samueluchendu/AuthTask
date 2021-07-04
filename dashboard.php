<?php
session_start();
if(!isset($_SESSION['email'])){ header("Location: register.php");}

if (isset($_SESSION['success'])) { ?>
	<p style="color:green; text-align:center"> <?php echo $_SESSION['success']; ?> </p>
<?php	}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<p>Click here to logout</p>
	<a href="logout.php">Logout</a>
</body>

</html>