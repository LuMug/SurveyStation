

# PROGETTO | Diario di lavoro - 10.02.2017

### Canobbio, 10.02.2017

## Lavori svolti
##### Jeremy Jornod

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8.20 - 9.40:|Ricerca sul componente "Grove - Vibrator 047 906". Io e Nicola abbiamo preparato la posdtazione per l'Arduino e abbiamo organizzato il materiale.|
|9.40 - 10.10:|Primi test sul componente. Abbiamo preparato codice e collegamenti. |
|10.10 - 10.40:|Abbiamo scoperto che il componente che ci ha dato Mussi è un vibratore e non un sensore di vibrazioni.|
|10.40 - 12.20:|Abbiamo provato ad usare un altro componente: TiltSensor. Serve a catturare una vibrazione in modo molto grezzo. Dice solo se c'è stata o no. Non cattura la potenza. |
|13.15 - 14.20:|Ricerche sulla sismografia. |
|14.20 - 15.20:|Ricerca sul trasferimento dati da Arduino a database. Ci sono due soluzioni valide: Via file.txt o Via Ethernet. |
|15.20 - 15.45| Diario.|
##### Jonathan Fassora
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 12:20   |Raccolta dati da seismo.ethz.ch, come salvarli |
|13:15 - 14:30 | Scrittura requisiti |
|14:30 - 15:45 |Script di login e registrazione (da finire) |

##### Jacopo Greppi
|Orario        |Lavoro svolto                                     |
|--------------|--------------------------------------------------|
|8:15 - 9:05   |Progettazione della tabella degli utenti e creazione in phpmyadmin   				  |
|9:05 - 11:30  |Ho assistito Riccardo mentre iniziava a sistemare il template del sito che utilizziamo|
|11:30 - 11:45 |Ho cercato se al quarto piano fosse disponibile un giroscopio				   		  |
|11:45 - 12:20 |Ho cercato di capire come fare per inviare dei dati dall'arduino ad un server		  |
|13:15 - 15:30 |Ho cercato di capire come fare per inviare dei dati dall'arduino ad un server		  |
|15:30 - 15:45 |Stesura diario                                    				  					  |

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
|8:15 - 15:45   |inizio creazione della struttura di base  di un sito dinamico, creazione del menu con form per il login, presentazione progetto numero 2 |


##  Problemi riscontrati e soluzioni adottate
Nicola --> Problema riscontrato con il sensore di flessibilità, i sui dati vengono rilevati solo quando c'è una grossa pressione su di esso, in pratica non è abbastanza sensibile, la soluzione che ho adottato è di utilizzare un potenziomentro per la generazione dei dati che devo inviare (Soluzione fino a quando non avremo il sensore apposito per generare i dati).

##  Punto della situazione rispetto alla pianificazione


## Programma di massima per la prossima giornata di lavoro
Fassora --> fare gantt + finire login + 'formattare' i dati ottenuti dal seismo.ch e salvarli
