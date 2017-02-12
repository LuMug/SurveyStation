

# PROGETTO | Diario di lavoro - 10.02.2017

### Canobbio, 10.02.2017

## Lavori svolti
##### Jeremy Jornod

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8.20 - 9.20: |Riunione: Discussione sulla settimana precedente, settimana corrente e assegnazione dei lavori.|
|9.20 - 10.00: |Collegare due schede Arduino tra di loro.|
|10.00 - 10.10: |E' arrivato il componente che cercavamo settimana scorsa per inserire il codice a Arduino. Funziona.|
|10.10 - 12.20: |Test collegamento ethernet al WAMP server in locale. Non è facile: Ho fatto vari tentativi ma c'è sempre qualcosa che non va. Lo scopo è quello di generare un numero random da Arduino è inserirlo in una tabella.|
|13.15 - 14.40: |Trasferire i file da Arduino al Database.|
|15.15 - 15.30: |Dati in loop, aggiunta campo data e orario.|
|15.30 - 15.45: |Diario.|
##### Jonathan Fassora
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 12:20   |Raccolta dati da seismo.ethz.ch, come salvarli |
|13:15 - 14:30 | Scrittura requisiti |
|14:30 - 15:45 |Script di login e registrazione (da finire) |

##### Jacopo Greppi
|Orario        |Lavoro svolto                                     				  					  										                          |
|--------------|------------------------------------------------------------------------------------------------------------------------------------------------------|
|8:15 - 9:15   |Colloquio col docente per fare il punto della situazione e decidere cosa fare durante la giornata di lavoro. Sono stati chiariti alcuni dubbi.        |
|9:15 - 10:15  |Creazione del database con la tabella utente tramite l'utilizzo di workbench. Una volta creato è stato esportato per poi metterlo in comune su github.|
|10:15 - 11:30 |Creazione tabella di prova alla quale inviare i dati e ricerca di come inviare i dati dall'arduino ad una tabella mysql.                              |
|11:30 - 11:50 |Progettazione del flusso.                                                                                                                             |
|11:30 - 13:30 |Progettazione del database.                                                                                                                           |
|13:30 - 14:45 |Raffigurazione della progettazione su Visio.																										  |
|15:00 - 15:30 |Stesura della struttura ipotetica dello schema ER del database. Inizio delle realizzazione dello schema effettivo.                                    |
|15:30 - 15:45 |Stesura del diario.                                                                                                                                   |

##### Nicola Mazzoletti
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:15 - 9.15  |Brifing dove abbiamo discusso su cosa fare oggi
|9.15 - 12.20 | Implementazione del sensore di flessibilità per generare dati da inviare al server
|13.15 - 14.20 | Lavoro all'invio di dati da arduino a server
|14.20 - 15.30| Modifica del programma per inviare i dati in modo da renderlo più performante
|15.30 - 15.45| Diario        

##### Riccardo di Summa
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8.20 - 9.40:|Riunione|
|9.40 - 12.20:|Schema del sito su visio + implementazione|
|13.15 - 15.45:|Implementazione preloader e studio del grafico|


##  Problemi riscontrati e soluzioni adottate
Nicola --> Problema riscontrato con il sensore di flessibilità, i sui dati vengono rilevati solo quando c'è una grossa pressione su di esso, in pratica non è abbastanza sensibile, la soluzione che ho adottato è di utilizzare un potenziomentro per la generazione dei dati che devo inviare (Soluzione fino a quando non avremo il sensore apposito per generare i dati).

Jacopo --> Durante il colloquio è saltato fuori che l'utilizzo di phpmyadmin per gestire il database non fosse la soluzione più idonea. Per ovviare a questo problema ho utilizzato workbench.
Ho riscontrato un "problema" una volta esportato il database da phpmyadmin poiché il file che conteneva il codice per la creazione era "complicato". Dato che Fassora necessita di prendere le informazioni dal database gli serve la struttura più semplice possibile. Quindi ho riscritto la query che creasse il database e la tabella e successivamente ho messo il file su github.

##  Punto della situazione rispetto alla pianificazione


## Programma di massima per la prossima giornata di lavoro
Fassora --> fare gantt + finire login + 'formattare' i dati ottenuti dal seismo.ch e salvarli.

Jacopo -- > Per la prossima volta il mio obiettivo è quello di terminare lo schema ER, la creazione del database con il linguaggio SQL, popolarlo e vedere quanto pesa.

diSumma --> Studio di Ajax per il grafico in live

Jornod -->  - Relazionare Arduino - Database - Grafico
            - Sistemare il codice e renderlo il più snello possibile
