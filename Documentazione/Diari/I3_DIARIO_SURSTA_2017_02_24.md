

# PROGETTO | Diario di lavoro - 24.02.2017

### Canobbio, 24.02.2017

## Lavori svolti
##### Jeremy Jornod

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
Lavoro svolto:
|8.20 - 9.15: |Ho relazionato Arduino al database di Greppi. Sorgeva però un errore di sintassi e ho perso molto tempo prima di risolverlo. Ho riscritto le linee critiche (query) ad una ad una e il problema si è risolto.|
|9.15 - : 11.00 |Richiamare una pagina PHP con Arduino.|
|11.00 - 11.45: |Ho collegato Arduino al server di Riccardo. Inizialmente non riuscivo, poi analizzando la macchina ho visto che il firewall era attivo, lo ho disattivato e sono riuscito a connettermi. Ora il database si riempie con i dati ricavati da Arduino.|
|11.45 - 12.20: .|Richiamare una pagina PHP con Arduino.|

##### Jonathan Fassora
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 10:05   |Login, registrazione, sicurezza password    |
|10:05 - 12:20 |Trasferimento del tutto sul PC di DiSumma per poter lavorare in locale  |
|13:15 - 14:45 |Ricerca su come far vedere i dati (vedi links a fondo pagina)  |
|15:00 - 15:45 |Analisi del dominio |

##### Jacopo Greppi
|Orario        |Lavoro svolto|
|--------------|------------------------------------------------------------------------------------------------------------------------------------------------------|
|8:20 - 12:20  |Creazione di un trigger che permette di copiare in dati nella tabella shake una volta che nella tabella sismografo viene rilevato un valore superiore ad un numero stabilito|
|13:15 - 15:30 |Ricerca di come svolgere funzioni in Sql e di come poterle applicare al progetto.|
|15:30 - 15:45 |Stesura del diario.|                                  |

##### Nicola Mazzoletti
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|-|Assente|


##### Riccardo di Summa
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|08:15 - 10:05   |Rifinitura del login con registrazione |
|10:05 - 12:20   |Abbiamo centralizzato sulla mia macchina per poter testare il tutto|
|13:15 - 15:45 | Ricerche su grafici live (vedi links a fondo pagina) e rifinitura sito|


##  Problemi riscontrati e soluzioni adottate
-Riccardo & Jonathan --> Problemi con il database e con l'hashing dei password (Risolto)
Jacopo -- > Ho avuto difficoltà nel riuscire a far svolgere l'operazione desiderata al trigger. Dopo averci sbattuto la testa non poco tempo, ho chiesto aiuto al professor Sartori e assieme siamo riusciti a sistemare il codice.


##  Punto della situazione rispetto alla pianificazione


## Programma di massima per la prossima giornata di lavoro
-Riccardo & Jonathan --> Visualizzare i dati probabilmente con highcharts e ajax (o in modo analogo)
Jacopo --> La prossima volta deciderò con il docente cosa implementare nella funzione mysql. Nel frattempo cercherò di documentarmi sulla loro sintassi. 

###### link interessanti

http://phant.io/graphing/google/2014/07/07/graphing-data/
https://data.sparkfun.com/
http://www.highcharts.com/docs/working-with-data/live-data  (<---- /!\ )
http://www.earthquakescanada.nrcan.gc.ca/stndon/wf-fo/index-en.php?channel=QCQ
https://phpchart.com/phpChart/examples/reploting.php?iframe=true&width=1200&height=800#ui-tabs-1

