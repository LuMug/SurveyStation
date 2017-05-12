<?php
require "inc/config.php";
require "inc/form_user_script.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  $globals['page'] = 'Home';
  require "inc/head.php"; ?>
  </head>
  <body class="compact-menu">
      <?php require "inc/loader.php"; ?>
      <main class="page-content content-wrap">
          <?php require "inc/menu.php"; ?>
          <?php require "inc/sidebar.php"; ?>
          <div class="page-inner">
              <div id="main-wrapper">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Survey Station</h3>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
		  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<img src="/surveystation/media/IMG_1627.JPG" class="img-responsive" alt="Colonna portante dell'Arduino">
		  </div>
                </div>
              </div><!-- Main Wrapper -->
              <?php require "inc/foot.php"; ?>
          </div>
      </main>
      <!-- Require per tutto il js -->
      <?php require "inc/footer.php"; ?>
  </body>
</html>
