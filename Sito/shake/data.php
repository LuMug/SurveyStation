<?php
  require_once "../inc/config.php";
  $nrDati = 400;
  if($nrDati < 10) $nrDati = 10;
  $result = $mysql_con->query(
                                'select * from (
                                  SELECT ID, Valore_X as x, Valore_Y+5000 as y, Valore_Z+10000 as z, date_format(sismografo.data, "%T") as data
                                  from sismografo
                                  order by id desc limit '.$nrDati.
                                  ') as sub
                                  order by id'
                                );

  $main_data = array();
  $rows = array();
  while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $r;
  }

  $x_data = array();
  for($i=0; $i<count($rows); $i++){
    $x_data[$i] = array($i, (int)$rows[$i]["x"]);
  }
  $y_data = array();
  for($i=0; $i<count($rows); $i++){
    $y_data[$i] = array($i, (int)$rows[$i]["y"]);
  }
  $z_data = array();
  for($i=0; $i<count($rows); $i++){
    $z_data[$i] = array($i, (int)$rows[$i]["z"]);
  }
  date_default_timezone_set('Europe/Zurich');
  $ticks_data = array();
  for($i=0; $i<count($rows); $i++){
    $ticks_data[$i] = array($i, "");
    if($i%($nrDati/10)==0)  $ticks_data[$i] = array($i, $rows[$i]["data"]);
  }

  $main_data[0] = $x_data;
  $main_data[1] = $y_data;
  $main_data[2] = $z_data;
  $main_data[3] = $ticks_data;
  //$main_data[$main_data.length+1] = array((count($rows)-1), (int)$rows[(count($rows)-1)]["x"]);
  print json_encode($main_data);
?>
