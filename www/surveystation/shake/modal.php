<?php
require "../inc/config.php";
    $shakId = $_GET["shakeId"];
    $result = $mysql_con->query("SELECT Valore_X as x, Valore_Y as y, Valore_Z as z, data as data FROM shake WHERE ID=$shakId");


    $rows = array();
    while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $r;
    }
    $formatX = "[";
    for($i=0; $i<count($rows)-1; $i++){
  	$formatX .= "[" . $i . "," . $rows[$i]["x"] . "],";
    }
    $formatX .= "[" . (count($rows)-1) . "," . $rows[(count($rows)-1)]["x"] . "]]";

    $formatY = "[";
    for($i=0; $i<count($rows)-1; $i++){
  	$formatY .= "[" . $i . "," . $rows[$i]["y"] . "],";
    }
    $formatY .= "[" . (count($rows)-1) . "," . $rows[(count($rows)-1)]["y"] . "]]";

    $formatZ = "[";
    for($i=0; $i<count($rows)-1; $i++){
  	$formatZ .= "[" . $i . "," . $rows[$i]["z"] . "],";
    }
    $formatZ .= "[" . (count($rows)-1) . "," . $rows[(count($rows)-1)]["z"] . "]]";

    date_default_timezone_set('Europe/Zurich');
    $ticks_data = array();
    for($i=0; $i<count($rows); $i++){
        $ticks_data[$i] = array($i, '');
	//echo $rows[$i]["data"];
        //if(i%2==0)  $ticks_data[$i] = array($i, $rows[$i]["data"]);
    }

    $formatData = "[";
    for($i=0; $i<count($ticks_data)-1; $i++){
  	$formatData .= "[" . $i . "," . $ticks_data[$i][1] . "],";
    }
    $formatData .= "[" . (count($ticks_data)-1) . "," . $ticks_data[(count($ticks_data)-1)][1] . "]]";
?>
<body style="background-color:white;">
<div id="flot3" style="width:100%;height:100%;"></div>
</body>
<?php require "../inc/footer.php"; ?>
<script>
$(document).ready(function () {
  var flot3 = function () {
          var dataX = <?php echo $formatX; ?>;
          var dataY = <?php echo $formatY; ?>;
          var dataZ = <?php echo $formatZ; ?>;
          var dataset = [{
                data: dataX,
                color: "#2196F3"
            },
            {
                data: dataY,
                color: "#4CAF50"
            },
            {
                data: dataZ,
                color: "#B71C1C"
            }];
          //var ticks = <?php echo $formatData; ?>;

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
                  //ticks: ticks
              },
                yaxis: {
		  show:true,
                  ticks: 30
                },
              grid: {
                  color: "#AFAFAF",
                  hoverable: true,
                  borderWidth: 0,
                  backgroundColor: '#FFF'
              },
              tooltip: true,
              tooltipOpts: {
                  content: " ",
                  defaultTheme: false
              }
          };
          $.plot($("#flot3"), dataset, options);
      };
    flot3();
});
</script>
