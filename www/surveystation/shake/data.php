<?php
  require_once "../inc/config.php";

  $nrDati = 200;	#numero di dati in una 'paginata' di grafico
  $multi = 1;	#moltiplicatore dei valori
  $trasfX = 0;	#spostamento della x sull'ascissa
  $trasfY = 0;	# '' della y
  $trasfZ = 0;	# '' della z (parte da 0.981!)

  if($nrDati < 10) $nrDati = 10;
  $result = $mysql_con->query(
                                'select * from (
                                  SELECT ID, Valore_X as x, Valore_Y as y, Valore_Z as z, date_format(sismografo.data, "%T") as data
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
    $x_data[$i] = array($i, ($rows[$i]["x"]*$multi)+$trasfX);
  }
  $y_data = array();
  for($i=0; $i<count($rows); $i++){
    $y_data[$i] = array($i, ($rows[$i]["y"]*$multi)+$trasfY);
  }
  $z_data = array();
  for($i=0; $i<count($rows); $i++){
    $z_data[$i] = array($i, ($rows[$i]["z"]*$multi)+$trasfZ);
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
  print json_encode($main_data);	#viene inviato un array con 4 array, le x, le y, le z e le date
?>
