<?php
require "../inc/config.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  $globals['page'] = 'Profile';
  require "../inc/head.php"; ?>

  <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
  <head>
  <body class="compact-menu">
    <?php require "../inc/loader.php"; ?>
    <main class="page-content content-wrap">
      <?php require "../inc/menu.php"; ?>
      <?php require "../inc/sidebar.php"; ?>
      <div class="page-inner">
        <div id="main-wrapper">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-white">
                  <div class="panel-heading">
                      <h3 class="panel-title">Titolo</h3>
                  </div>
                  <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-white">
                  <div class="panel-heading">
                      <h3 class="panel-title">Cambia email</h3>
                  </div>
                  <div class="panel-body">
                    Inserisci la nuova email
                    <input type="email" name="" value="">
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
  <?php $mysql_con->close(); ?>
</html>
