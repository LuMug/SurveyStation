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
			echo '
			<div class="alert alert-danger alert-dismissable fade in alert-top">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Attenzione!</strong> L email che vuoi registrare esiste già.
			</div>
			';
		}
		else
		{
			$query = mysqli_query($mysql_con, "INSERT INTO utenti (email, password, amministratore) VALUES ('$email', '$password', 0)");

			if($query)
			{
				echo '
				<div class="alert alert-success alert-dismissable fade in alert-top">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Congratulazioni!</strong> La registrazione è andata a buon fine.
				</div>
				';
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
				echo '
				<div class="alert alert-success alert-dismissable fade in alert-top">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Benvenuto!</strong> è un piacere rivederti.
				</div>
				';

			}
		} else {
			echo '
				<div class="alert alert-danger alert-dismissable fade in alert-top">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Errore!</strong> Password o email incorretti.
				</div>
				';
		}
		echo $error;
	}
?>
