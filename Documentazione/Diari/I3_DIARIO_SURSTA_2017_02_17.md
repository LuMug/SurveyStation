

# PROGETTO | Diario di lavoro - 17.02.2017

### Canobbio, 17.02.2017

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
|Orario        |Lavoro svolto|
|--------------|------------------------------------------------------------------------------------------------------------------------------------------------------|
|8:15 - 8:35   |Brefing con il docente responsabile per fare il punto della situazione e per decidere i compiti odierni.|
|8:35 - 9:20   |Creazione dello schema ER del database.|
|9:20 - 11:30  |Creazione del database utilizzando MySql, basandosi sullo schema ER e sulla progettazione concettuale di settimana scorsa e popolarlo con dei dati generati randomicamente da un software in rete.|
|11:30 - 11:40 |Sistemazione dello schema ER in base alle modifiche apportate durante la creazione del database e del sui popolamento.|
|11:40 - 12.20 |Su consiglio del docente responsabile, ho reinstallato un programma che permettesse di usare github offline e di fare l'upload dei dati modificati quando necessario.|
|13:15 - 14:10 |Miglioramento della struttura del database, inserimento di nuovi dati e aggiunta delle varie tabelle nel database caricato sull'host del progetto.|
|14:10 - 15:45 |Dato che nel progetto si dovranno usare dei trigger, ho cercato di svolgere gli esercizi inerenti questo argomento. Gli esercizi sono quelli iniziati nel modulo 141|

##### Nicola Mazzoletti
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:15 - 15.30 | Ricerche e sviluppo riguardo all'utilizzo del giroscopio MMA8452q
|15.30 - 15.45| Diario       

##### Riccardo di Summa
|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8.20 - 8.35:|Riunione|
|8.35 - 10.00:|Gantt|
|10.00 - 12:20:|Studio di Ajax per il grafico live|
|13.15 - 15.45:|Pushato il sito sul dominio e risolti vari problemi di compatibilità, sia desktop che mobile|


##  Problemi riscontrati e soluzioni adottate
Nicola --> Problema con la concatenazione di due stringhe, risolto con l'utilizzo di due Serial.print
Jacopo --> Nell'installazione di sourcetree il proxy ha dato nuovamente problemi generando un errore. La cosa curiosa è che il mio computer non è connesso ad internet con la rete scolastica, ma con un hotspot (con il permesso del docente). Ho quindi scaricato "github desktop" per ovviare al problema. 

##  Punto della situazione rispetto alla pianificazione


## Programma di massima per la prossima giornata di lavoro
Jacopo -->La settimana prossima inizierò a progettare dei trigger specifici per il progetto. Inizierò con fare un trigger che quando legge un valore che supera una certa soglia, inizia a copiare i dati nella tabella shake

