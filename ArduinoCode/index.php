<?php
//controllo se sono presenti i parametri valore e localita
if(isset($_GET['valore']))
{
//Recupero il valore del parametro "valore"
$valore = $_GET['valore'];
echo $valore;
 
//eseguo la connessione al database sul server locale
//inserendo nome utente e password
$link = mysql_connect('10.20.4.126', 'root', 'root');
 
//gestione degli errori
if (!$link) {die('Impossibile connettersi: ' . mysql_error());}
 
//seleziono il databse di nome arduino
mysql_select_db("efof_samtinfoch43") or die( "Impossibile selezionare il database.");
 
//creo una stringa sql di inserimento con i valori
//recuperati dall'url
$sql = "INSERT INTO efof_samtinfoch43.valuelog (value) 
		VALUES (".$valore.")"; 
 
//eseguo la query
$retval = mysql_query( $sql, $link );
 
//gestione degli errori
if(! $retval ){die('Impossibile eseguire la query: ' . mysql_error());}
 
//chiudo la connessione al db
mysql_close($link);
}
?>