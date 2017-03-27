<?php
	# Registrazione
	if(isset($_GET['logout'])){
		$_SESSION = null;
		header("Location: http://" . $_SERVER['HTTP_HOST'] . "/surveystation");
		exit();
	} else if(isset($_POST['registr_email'])){

		$email = $_POST["registr_email"];
		$password = $_POST["registr_password"];

		$email = mysqli_real_escape_string($mysql_con, $email);
		$password = mysqli_real_escape_string($mysql_con, $password);

		$password = password_hash($password, PASSWORD_BCRYPT);

		$sql = "SELECT email FROM utenti WHERE email='$email'";
		$result = mysqli_query($mysql_con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		if(mysqli_num_rows($result) >= 1)
		{
			echo "Sorry...This email already exist..";
		}
		else
		{
			$query = mysqli_query($mysql_con, "INSERT INTO utenti (email, password, amministratore) VALUES ('$email', '$password', 0)");

			if($query)
			{
				echo "Thank You! you are now registered.";
				$_SESSION['email'] = $email;
			}
		}
	}

	# Login
	else if(isset($_POST['login_email'])){
		$email = mysqli_real_escape_string($mysql_con,$_POST['login_email']);
		$password = mysqli_real_escape_string($mysql_con,$_POST['login_password']);

		$sel_pass = "select * from utenti where email='$email'";
		$q_hashPassword = mysqli_query($mysql_con, $sel_pass);
		$row = mysqli_fetch_array($q_hashPassword,MYSQLI_ASSOC);

		if(mysqli_num_rows($q_hashPassword) >= 1)
		{
			if($passwordCorrect = password_verify($password, $row['Password'])){
				$_SESSION['email'] = $email;
			} else {
				$error = "Password incorretta.";

			}
		} else {
			$error = "Password o e-mail incorretta.";
		}
		echo $error;
	}
?>
