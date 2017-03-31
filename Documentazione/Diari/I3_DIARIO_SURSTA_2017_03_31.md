# PROGETTO | Diario di lavoro - 17.03.2017

### Canobbio, 17.03.2017

## Lavori svolti
##### Jeremy Jornod
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8.20 - 8.45: | Riunione del team.|
|8.45 - 9.45: | Raspberry. |
|10.00 - 12.20: | Pagina PHP di base finita. |
|12.20 - 15.45: | Documentazione. |


##### Jonathan Fassora
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 15:45   |Server su raspberry|


##### Jacopo Greppi
|Orario        |Lavoro svolto                                     |
|--------------|--------------------------------------------------|
|8:20 - 10:40  |Ho cercato una soluzione per poter convertire il tipo di dato 'varchar()' in un 'double' in sql. Lo scopo di tale operazione è quello di poter utilizzare un dato presente in una determinata tabella (configurazione), in un'ulteriore tabella come se fosse una costante che, dove serve, viene usata. Dato che nella tabella configurazione i dati potrebbero essere varchar, char, int, double, ... Ho ritenuto più idoneo usare un varchar poiché contavo sull'eventuale conversione del dato. In un'altra tabella (shake) necessito del dato di configurazione, ma come deve essere di tipo double. Quindi ho cercato un metodo di conversione.|
|10:40 - 14:00 |Su richiesta di un compagno di lavoro, ho dovuto ristrutturare il database in modo tale che ogni id delle tabelle si chiamasse "ID". Di conseguenza ho dovuto anche modificare leggermente la struttura del trigger e della procedura creati settimana scorsa.|
|14:00 - 14:45 | Ho eseguito delle ulteriori piccole modifiche di una tabella e dei suoi campi, dopo averne discusso assieme ai miei compagni.|
|15:00 - 15:30 | Ho cercato di trovare una soluzione a ciò che avevo iniziato questa mattina (la conversione di un varchar in double), senza risultati|
|15:30 - 15:45 |Gli ultimi minuti sono stati dedicati alla stesura del diario della giornata odierna|

##### Nicola Mazzoletti
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 12.00  |Progettazione della scatola per contenere il sensore appeso ad arduino e rasperry
|12.00 - 13.30|Saltado il sensore a dei cavi che pensavo che erano meno rigidi|
|13.30 - 14.45|Pensato ad una soluzione per diminuire la durezza dei cavi|
|15.00 - 15.20|Cercato una scatola per sviluppare il contenitore|   
|15.20 - 15.45|Diario| 

##### Riccardo di Summa
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|08:20 - 08:23 | Mi sono recato con tranquillità in classe, tolta la giacca mi sono avvicinato alla mia postazione|
|08:23 - 08:30 | Ho iniziato a preparare la mia postazione ed il cablaggio necessario per poter lavorare oggi|
|08:30 - 08:45 | Dopo aver acceso il mio computer (di marca ASUS), ho avviato i programmi necessari per il lavoro che a breve illustrerò|
|08:45 - 09:50 | Finalmente ho iniziato a produrre qualcosa, dopo vari problemi sono riuscito, insieme al mio collega di lavoro fassora, a completare il grafico live|
|09:50 - 10:05| Ho fatto colazione con una brioches e un micao|
|10:05 - 11:35| Abbiamo organizzato la gita di 4° scegliendo prima la meta di destinazione e poi i docenti, scegliando Muggiasca e Mussi |
|11:35 - 11:37 | Ho ordinato le pizze |
|11:37 - 12:20 | Ho creato la pagine di impostazioni gestita dall'amministratore, ho avuto dei problemi di collegamento con il database ma niente di impossibile visto che dopo diversi tentativi siamo riusciti a far funzionare anche questa pagina |
|12:20 - 13:15 | Ho mangiato la pizza mascarpone e salsiccia precedentemente ordinata, buona la consiglio. |
|13:15 - 14:45 | Iniziato con la stesura della pagina di profilo dell'utente |
|14:45 - 15:00 | Pausa, ... |
|15:00 - 15:29 | Fix della registrazione|
|15:29 - 15:30 | Ho pensato a cosa scrivere nel diario |
|15:30 - 15:40 | Ho scritto il diario
|15:40 - 15:45 | Ho messo via gli strumenti del mestiere e riposto i cavi nell'apposito spazio |


##  Problemi riscontrati e soluzioni adottate
Server raspberry: ricordarsi di cambiare accesso proxy apt.conf, ricordarsi di fare purge su wolfram engine e non fare upgrade.

Oggi non si sono verificati particolari problemi. È stata alquanto tosta la stesura del codice del trigger e della procedura ad esso collegata. Dopo 2 ore di lavoro il trigger svolgeva ciò che doveva fare.

Jacopo --> Durante la parte di "ristrutturazione" del database mi sono imbattuto in un problema che ha richiesto non poco tempo per essere risolto. Una volta che provavo ad aggiungere la foreign key nella tabella "vibrazione_FIX", workbench non me lo permetteva. Non veniva stampato nemmeno un messaggio d'errore che mi potesse in qualche modo aiutare nella ricerca di una possibile soluzione. Ho risolto modificando il campo della primary key. Inoltre dopo non mi era possibile inserire nella tabella una foreign key. Come prima, workbench non mi permetteva di eseguire questa azione. Dopo aver cercato in internet, chiesto a Narciso e a Mussi, assieme a Fassora sono riuscito a trovare il problema. Praticamente in alcune tabelle è stato in precedenza inserito "ENGINE = MEMORY" per renderle temporanee. A quanto pare tutte dovevano essere temporanee per permettere a workbench di inserire la chiave esterna. Ovviamente ciò andrà rivisto con il docente perché non è propriamente corretta come struttura d'implementazione.


##  Punto della situazione rispetto alla pianificazione
Jeremy --> Pagina PHP: fatta

## Programma di massima per la prossima giornata di lavoro
Jacopo --> Settimana prossima punto a trovare una soluzione a ciò che non ho potuto fare oggi (la conversione), la creazione di una procedura che permetta di cancellare i dati non pu necessari e di rivedere i passaggi fatti oggi insieme al docente per fare il punto della situazione e per rivedere il codice. 


