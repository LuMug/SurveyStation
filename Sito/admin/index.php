<?php
require "../inc/config.php";
require "../inc/form_user_script.php";

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
							$getAmm = mysqli_fetch_assoc(mysqli_query($mysql_con, 'SELECT Amministratore from utenti where "$email" = Email'));
							echo $getAmm;
							if($getAmm == 1){

							}
						?>
						<div class="row">
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
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="panel panel-white">
									<div class="panel-heading clearfix">
										<h4 class="panel-title">Horizontal Form</h4>
									</div>
									<div class="panel-body">
										<form class="form-horizontal m-t-xs" action="" method="post">
											<?php
											$result = $mysql_con->query('SELECT * from configurazione');
											$rows = array();
											while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
												$rows[] = $r;
											}
											for($i=0; $i<count($rows); $i++){
												echo '<div class="form-group">
												<label for="input-Default" class="col-sm-2 control-label">'.$rows[$i]["Parametro"].'</label>
												<div class="col-sm-10">
												<input type="text" class="form-control" name="'.$rows[$i]["ID"].'" value="'.$rows[$i]["Valore"].'"/>
												</div>
												</div>';
											}
											?>
											<button type="submit" class="btn btn-primary m-t-xs m-b-xs">Salva</button>
										</form>
									</div>
								</div>

							</div>
						</div>
					</div><!-- Main Wrapper -->
					<?php require "../inc/foot.php"; ?>
				</div>
			</main>
			<!-- Require per tutto il js -->
			<?php require "../inc/footer.php"; ?>
		</body>
