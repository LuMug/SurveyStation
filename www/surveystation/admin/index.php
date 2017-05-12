<?php
require "../inc/config.php";
require "../inc/form_user_script.php";


if(isset($_POST['graphic'])){
	$result = $mysql_con->query('SELECT * from configurazione');
	$rows = array();
	while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
		$rows[] = $r;
	}
	for($i=0; $i<count($rows); $i++){
		$x = (int)($rows[$i]['ID']);
		if(isset($_POST[$rows[$i]['ID']])) {
			$value = $_POST[$x];
			$query = mysqli_query($mysql_con, "UPDATE configurazione set Valore = '$value' where ID = $x");
		}
	}
	echo '
	<div class="alert alert-success alert-dismissable fade in alert-top">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Salvate!</strong> Le impostazioni del grafico sono al sicuro.
	</div>
	';
}
else if(isset($_POST["user"])){
	$result = $mysql_con->query('SELECT * from utenti');
	$rows = array();
	while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
		$rows[] = $r;
	}

	for($i=0; $i<count($rows); $i++){
		$user = $rows[$i]["Email"];
		$prova = str_replace(".","_",$user);
		$userAdmin = $prova."&1";
		$userNotif = $prova."&2";
		$userDelete = $prova."&3";
		$valueAdmin = $_POST[$userAdmin];
		$valueNotif = $_POST[$userNotif];
		$query = mysqli_query($mysql_con, "UPDATE utenti set  Amministratore = $valueAdmin,  Email_notification = $valueNotif where Email = '$user'");
		if(isset($_POST[$userDelete])){
			$query = mysqli_query($mysql_con, "DELETE from utenti where Email = '$user'");
		}
		$valueAdmin = null;
		$valueNotif = null;
	}
	echo '
	<div class="alert alert-success alert-dismissable fade in alert-top">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Salvate!</strong> Le impostazioni dei vari utenti sono salvate.
	</div>
	';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	$globals['page'] = 'Admin';
	require "../inc/head.php"; ?>
	<head>
		<body class="compact-menu">
			<?php require "../inc/loader.php"; ?>
			<main class="page-content content-wrap">
				<?php require "../inc/menu.php"; ?>
				<?php require "../inc/sidebar.php"; ?>
				<div class="page-inner">
					<div id="main-wrapper">
						<?php
							$email = $_SESSION["email"];
							$getAmm = mysqli_fetch_assoc(mysqli_query($mysql_con, 'SELECT Amministratore from utenti where "'.$email.'" = Email'));
							if($getAmm["Amministratore"] == 1){ ?>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="panel panel-white">
											<div class="panel-heading clearfix">
												<h4 class="panel-title">Gestione informazioni grafico</h4>
											</div>
											<div class="panel-body">
												<div class="form-group">
													<div class="col-sm-4">
														<label for="input-Default" class="col-sm-4 control-label">Parametro</label>
													</div>
													<div class="col-sm-8">
														<label for="input-Default" class="col-sm-4 control-label">Valore</label>
													</div>
												</div>
												<form class="form-horizontal m-t-xs" action="" method="post" name="graphic">
													<?php
													$result = $mysql_con->query('SELECT * from configurazione');
													$rows = array();
													while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
														$rows[] = $r;
													}
													for($i=0; $i<count($rows); $i++){
														echo '<div class="form-group">
														<label for="input-Default" class="col-sm-4 control-label">'.$rows[$i]["Parametro"].'</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="'.$rows[$i]["ID"].'" value="'.$rows[$i]["Valore"].'"/>
														</div>
														</div>';
													}
													?>
													<button name="graphic" type="submit" class="ow-m-btn btn-green-r waves-effect">Salva</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="panel panel-white">
											<div class="panel-heading clearfix">
												<h4 class="panel-title">Gestione utenti</h4>
											</div>
											<div class="panel-body">
												<div class="form-group">
													<div class="col-sm-3">
														<label for="input-Default" class="col-sm-4 control-label">Email</label>
													</div>
													<div class="col-sm-3">
														<label for="input-Default" class="col-sm-4 control-label">Amministratore</label>
													</div>
													<div class="col-sm-3">
														<label for="input-Default" class="col-sm-4 control-label">Email di notifica</label>
													</div>
													<div class="col-sm-3">
														<label for="input-Default" class="col-sm-4 control-label">Elimina user</label>
													</div>
												</div>
												<form class="form-horizontal m-t-xs" action="" method="post" name="user">
													<?php
													$result = $mysql_con->query('SELECT * from utenti');
													$rows = array();
													while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
														$rows[] = $r;
													}
													for($i=0; $i<count($rows); $i++){
														if($rows[$i]["Email"] != $_SESSION["email"]){
															echo '<div class="form-group">
															<label for="input-Default" class="col-sm-3 control-label">'.$rows[$i]["Email"].'</label>
															<div class="col-sm-3">
															<input type="text" class="form-control" name="'.$rows[$i]["Email"].'&1" value="'.$rows[$i]["Amministratore"].'"/>
															</div>
															<div class="col-sm-3">
															<input type="text" class="form-control" name="'.$rows[$i]["Email"].'&2" value="'.$rows[$i]["Email_notification"].'"/>
															</div>
															<div class="col-sm-3">
																<div class="checkbox">
		                                <label>
		                                    <div class="checker"><span class=""><input type="checkbox" name="'.$rows[$i]["Email"].'&3"></span></div>Elimina
		                                </label>
		                            </div>
		                            </div>
															</div>';
														}
													}
													?>
													<button name="user" type="submit" class="ow-m-btn btn-green-r waves-effect">Salva</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							<?php }
							else{
								echo '<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="panel panel-red">
											<div class="panel-heading">
												<h3 class="panel-title">Attenzione</h3>
											</div>
											<div class="panel-body">
												Non hai i permessi per visualizzare questa pagina.
											</div>
										</div>
									</div>
								</div>';
							}
						?>
					</div><!-- Main Wrapper -->
					<?php require "../inc/foot.php"; ?>
				</div>
			</main>
			<!-- Require per tutto il js -->
			<?php require "../inc/footer.php"; ?>
		</body>
