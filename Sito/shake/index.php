<?php
require "../inc/config.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  $globals['page'] = 'Shake';
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-white">
                  <div class="panel-heading">
                      <h3 class="panel-title">Live Chart</h3>
                  </div>
                  <div class="panel-body">
                      <div id="flot2"></div>
                  </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
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
        <?php require "../inc/foot.php"; ?>
      </div>
    </main>
    <!-- Require per tutto il js -->
    <?php require "../inc/footer.php"; ?>
    <script>
    function showHint() {
      $.ajax({
        type: "POST",
        url: "data.php",
        datatype: "json",
        cache: false,
        success: function(datas) {
          var flot2 = function () {

            var all_data = $.parseJSON(datas);
            var dataset = [{
                data: all_data[0],
                color: "#2196F3"
            },
            {
                data: all_data[1],
                color: "#4CAF50"
            },
            {
                data: all_data[2],
                color: "#B71C1C"
            }];
            var ticks = all_data[3];

            var options = {
                series: {
                    lines: {
                        show: true
                    }
                },
                bars: {
                    align: "center",
                    barWidth: 0.5
                },
                xaxis: {
                    ticks: ticks
                },
                yaxis: {
                  max: 13000,
                  min: -3000
                  //ticks: [[0,1],[1,0],[2,0]]
                },
                legend: {
                    show: false
                },
                grid: {
                    color: "#AFAFAF",
                    hoverable: true,
                    borderWidth: 0,
                    backgroundColor: '#FFF'
                },
                tooltip: false,
                tooltipOpts: {
                    content: "X: %x, Y: %y",
                    defaultTheme: false
                }
            };
            $.plot($("#flot2"), dataset, options);
          };
          flot2();
        }
      });

    }
    setInterval(function () {
      showHint();
    }, 1000);
    </script>
  </body>
  <?php $mysql_con->close(); ?>
</html>
