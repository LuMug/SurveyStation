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
|8:20 - 8:45   |Briefing con tutto il team e il docente per fare il punto della situazione e per decidere le mansioni odierne.|
|8:45 - 8:55   |Ho rivisto assieme al docente le modifiche apportate la settimana scorsa al database. Ho semplicemente dovuto commentare 2 tabelle che al momento non servono dato che non utilizziamo quel sensore. In seguito ho cancellato la parola chiave che fa diventare una tabella temporanea da una tabella che non necessitava questa keyword e ho cancellato il comando per aggiungere le foreign key alla tabella perché in quanto di memoria non le può avere.|
|8:55 - 10:50  |Sono riuscito a parametrizzare il trigger e la procedura. Alcuni dati possono variare a seconda di cosa si voglia misurare e quindi questi ultimi sono stati inseriti nella tabella configurazione. Sono riuscito a creare delle sorti di variabili globali che mi hanno permesso di selezionare il contenuto dei valori citati e di utilizzarli nel trigger e nella procedura. Se si volesse modificare una dei valori basta andare nella tabella configurazione e il resto verrà fatto automaticamente poiché vengono usate delle variabili.|
|10:50 - 10:55 |Ho riadattato lo schema ER alle modifiche apportate precedentemente|
|10:55 - 12:20 |Ho iniziato ad abbozzare la documentazione riguardante la parte che mi concerne (il database) e ho iniziato a pensare e a creare una procedura che permetta di eliminare i dati inutili dalla tabella sismografo.|
|13:15 - 14:25 |Creazione della procedura che permette di cancellare i dati vecchi in modo tale da non sovraccaricare la tabella del database|
|14:25 - 15:20 |Ho creato un evento in modo tale da permettere alla procedura di essere eseguita in automatico ogni minuto. Così facendo non c'è bisogno di chiamarla autonomamente ogni minuto.|
|15:20 - 15:30 |Ho eseguito qualche test per assicurarmi che la procedura e l'evento funzionassero nella maniera corretta.|
|15:30 - 15:45 |Gli ultimi minuti della lezione sono stati dedicati alla stesura del diario della giornata odierna|

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
|08:20 - 15:45 | Implementazione grafica login, profilo e pannello d'amministratore|
|xx:xx - xx:xx | Fix del sito su Raspberry |


##  Problemi riscontrati e soluzioni adottate
Server raspberry: ricordarsi di cambiare accesso proxy apt.conf, ricordarsi di fare purge su wolfram engine e non fare upgrade.

Oggi non si sono verificati particolari problemi. È stata alquanto tosta la stesura del codice del trigger e della procedura ad esso collegata. Dopo 2 ore di lavoro il trigger svolgeva ciò che doveva fare.

Jacopo --> Oggi non ho riscontrato nessuna particolare difficoltà/problema.



##  Punto della situazione rispetto alla pianificazione
Jeremy --> Pagina PHP: fatta

## Programma di massima per la prossima giornata di lavoro
Jacopo --> La volta prossima vorrei dedicarmi alla documentazione poiché è una parte essenziale del progetto.


