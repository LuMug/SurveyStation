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
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ultimi avvenimenti importanti</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tipologia</th>
                                        <th>Valore</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="danger">
                                        <th scope="row">Terremoto</th>
                                        <td>3333</td>
                                        <td>1.1.1231</td>
                                    </tr>
                                    <tr class="info">
                                        <th scope="row">Temperatura</th>
                                        <td>52</td>
                                        <td>1.1.1231</td>
                                    </tr>
                                    <tr class="warning">
                                        <th scope="row">Terremoto</th>
                                        <td>63</td>
                                        <td>1.1.1231</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
