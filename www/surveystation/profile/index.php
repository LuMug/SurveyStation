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
        <div id="main-wrapper" class="panel-height">
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
          <form class="form-horizontal m-t-xs" action="mod_profile.php" method="post">
            <div class="row">
              <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 panel-tb">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cambia password</h3>
                    </div>
                    <div class="panel-body">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Inserisci la vecchia password</label>
                          <input type="password" class="form-control m-t-xxs" name="oldPsw" placeholder="Password vecchia">
                      </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Inserisci la nuova password</label>
                            <input type="password" class="form-control m-t-xxs" name="newPsw" placeholder="Password nuova">
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 panel-tb">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Altre personalizzazioni</h3>
                    </div>
                    <div class="panel-body">
                      <div class="input-group m-b-sm">
                        <span class="input-group-addon">
                          <input type="checkbox" aria-label="...">
                        </span>
                        <input type="text" class="form-control" aria-label="..." placeholder="Ricevi una notifica via email quando succede qualcosa di importante" readonly>
                      </div>

                        <div class="input-group m-b-sm">
                          <span class="input-group-addon">
                            <input type="checkbox" aria-label="...">
                          </span>
                          <input type="text" class="form-control" aria-label="..." placeholder="Ricevi una notifica tramite il sito quando succede qualcosa di importante" readonly>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <button type="submit" class="ow-m-btn btn-green-r waves-effect">Salva</button>
            </div>
          </form>
        </div><!-- Main Wrapper -->
        <?php require "../inc/foot.php"; ?>
      </div>
    </main>
    <!-- Require per tutto il js -->
    <?php require "../inc/footer.php"; ?>
  </body>
  <?php $mysql_con->close(); ?>
</html>
