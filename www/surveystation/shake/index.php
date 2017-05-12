<?php
require "../inc/config.php";
require "../inc/form_user_script.php";
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
                      <h3 class="panel-title">Grafico Live</h3>
                  </div>
                  <div class="panel-body">
                  <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class=""><a href="#">Asse X <span class="badge pad btn-blue">Blu</span></a></li>
                    <li role="presentation" class=""><a href="#">Asse Y <span class="badge pad btn-green">Verde</span></a></li>
                    <li role="presentation" class=""><a href="#">Asse Z <span class="badge pad btn-red">Rosso</span></a></li>
                 </ul>
                      <div id="flot2"></div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-white">
                  <div class="panel-heading">
                      <h3 class="panel-title">Ultimi avvenimenti importanti</h3>
                  </div>
                  <div class="panel-body">
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Terremoto N°</th>
                                  <th>Picco massimo X</th>
                                  <th>Picco massimo Y</th>
                                  <th>Picco massimo Z</th>
                                  <th>N° punti registrati</th>
                                  <th>Data registrazione</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tbody>
                            <?php
  													$result = $mysql_con->query('SELECT ID, Data, Count(ID) as nPunti, max(ABS(Valore_Y)) as maxY, max(ABS(Valore_X)) as maxX, max(ABS(Valore_Z)) as maxZ from shake GROUP BY ID ORDER BY Data');
  													$rows = array();
  													while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
  														$rows[] = $r;
  													}
  													for($i=0; $i<count($rows); $i++){
  														echo '
                                <tr>
                                    <th scope="row">'.$rows[$i]["ID"].'</th>
                                    <td>'.$rows[$i]["maxX"].'</td>
                                    <td>'.$rows[$i]["maxY"].'</td>
                                    <td>'.$rows[$i]["maxZ"].'</td>
                                    <td>'.$rows[$i]["nPunti"].'</td>
                                    <td>'.$rows[$i]["Data"].'</td>
                                    <td><a class="ow-m-btn ow-btn-small btn-green-r waves-effect modal-shake" data-target=".bs-example-modal-lg" data-toggle="modal" data-shake="'.$rows[$i]["ID"].'">Apri</a></td>
                                </tr>';
  													}
  													?>
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
	      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="shakeId"></h4>
                        </div>
                        <div class="modal-body">
                          <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class=""><a href="#">Asse X <span class="badge pad btn-blue">Blu</span></a></li>
                            <li role="presentation" class=""><a href="#">Asse Y <span class="badge pad btn-green">Verde</span></a></li>
                            <li role="presentation" class=""><a href="#">Asse Z <span class="badge pad btn-red">Rosso</span></a></li>
                          </ul>
                          <iframe id="modal-shake" src="" width="100%" height="500px"></iframe>
                        </div>
                        <div class="modal-footer">
                            <a class="ow-m-btn ow-btn-small btn-amber waves-effect" data-dismiss="modal">Chiudi</a>
                        </div>
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
		lines:{
		    lineWidth:2
		},
                xaxis: {
                    ticks: ticks
                },
                yaxis: {
		  show:true,
                  max: 3,
                  min: -3,
                  ticks: 30
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
