<?php
require "../inc/config.php";

if(isset($_POST["oldPsw"]) && isset($_POST["newPsw"])){
	$email =$_SESSION["email"];

	$email = mysqli_real_escape_string($mysql_con, $email);
  $oldPassword = mysqli_real_escape_string($mysql_con,$_POST['oldPsw']);

  $sel_pass = "select * from utenti where email='$email'";
  $q_hashPassword = mysqli_query($mysql_con, $sel_pass);
  $row = mysqli_fetch_array($q_hashPassword,MYSQLI_ASSOC);

  if(mysqli_num_rows($q_hashPassword) >= 1){
    if($passwordCorrect = password_verify($oldPassword, $row['Password'])){

        $newPassword = $_POST["newPsw"];

        $email = mysqli_real_escape_string($mysql_con, $email);
        $newPassword = mysqli_real_escape_string($mysql_con, $newPassword);

        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $query = mysqli_query($mysql_con, "UPDATE utenti set Password = '$newPassword' where Email = '$email'");

    }
  }
}

header("Location: /surveystation");

 ?>
