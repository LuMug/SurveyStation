<?php
    //controllo se sono presenti i parametri valore e localita
    if(isset($_GET['x']) && isset($_GET['y']) && isset($_GET['z'])){
        //Recupero il valore del parametro "valore"
        $x = $_GET['x'];
        $y = $_GET['y'];
        $z = $_GET['z'];

        /*
        * Eseguo la connessione al database sul server locale
        * inserendo nome utente e password
        */
        $link = mysql_connect('localhost', 'root', 'root');

        //gestione degli errori
        if (!$link) {die('Impossibile connettersi: ' . mysql_error());}

        //seleziono il databse di nome arduino
        mysql_select_db("surveystation") or die( "Impossibile selezionare il database.");

        
        // Creo una stringa sql di inserimento con i valori recuperati dall'url 
        $sql = "INSERT INTO surveystation.sismografo (Valore_X, Valore_Y, Valore_Z, Data) 
                VALUES (".$x.", ".$y.", ".$z.", now())"; 

        //eseguo la query
        $retval = mysql_query( $sql, $link );

        //gestione degli errori
        if(! $retval ){die('Impossibile eseguire la query: ' . mysql_error());}

        //chiudo la connessione al db
        mysql_close($link);
    }
?>