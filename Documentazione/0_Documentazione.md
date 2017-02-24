# Survey Station

1. [Introduzione](#introduzione)

  - [Informazioni sul progetto](#informazioni-sul-progetto)

  - [Abstract](#abstract)

  - [Scopo](#scopo)

1. [Analisi](#analisi)

  - [Analisi del dominio](#analisi-del-dominio)

  - [Analisi dei mezzi](#analisi-dei-mezzi)

  - [Analisi e specifica dei requisiti](#analisi-e-specifica-dei-requisiti)

  - [Use case](#use-case)

  - [Pianificazione](#pianificazione)

1. [Progettazione](#progettazione)

  - [Design dell’architettura del sistema](#design-dell’architettura-del-sistema)

  - [Design dei dati e database](#design-dei-dati-e-database)

1. [Implementazione](#implementazione)

1. [Test](#test)

  - [Protocollo di test](#protocollo-di-test)

  - [Risultati test](#risultati-test)

  - [Mancanze/limitazioni conosciute](#mancanze/limitazioni-conosciute)

1. [Consuntivo](#consuntivo)

1. [Conclusioni](#conclusioni)

  - [Sviluppi futuri](#sviluppi-futuri)

  - [Considerazioni personali](#considerazioni-personali)

1. [Sitografia](#sitografia)

1. [Allegati](#allegati)


## Introduzione

### Informazioni sul progetto

  -   Allievi: Jeremy Jornod, Nicola Mazzoletti, Jonathan Fassora, Riccardo di Summa, Jacopo Greppi

  -   Docente responsabile: Luca Muggiasca

  -   Scuola Arti e Mestieri Trevano (SAMT)

  -   Inizio: 27.01.2017

  -   Consegna: 12.05.2017

### Abstract


### Scopo

  Lo scopo del progetto è quello di avere un centro di raccolta di vari dati rilevati da una stazione. I risultati dei rilevamenti verrano mostrati su una pagina web che permetterà di visualizzare un grafico con i valori raccolti e che avrà una funzione di notifica in caso di misure interessanti. Inoltre saranno sfruttati i dati raccolti da centri professionali (p.es oasi.ch e seismo.ethz.ch) come strumento di comparazione. Questo sito ha dunque uno scopo di monitoraggio e raccolta di differenti misure nell'ambiente esterno, raggruppando tutti questi dati in un solo luogo che ne permette la consultazione.

## Analisi

### Analisi del dominio

  Il prodotto dovrà lavorare in un contesto scolastico e 'artigianale', come forma di raccolta e visualizzazione dati più per curiosi che per professionisti. La pagina sarà dunque ovviamente limitata, l'intenzione non è quella di creare un centro geologico o metereologico, ma di avere una piccola stazione di rilevamento e misurazione. L'idea è dunque quella di costruire una 'miniatura' di siti professionali (p.es. sed.ch) in modo, come detto, artigianale e 'casalingo'.

  Per fare ciò è necessario anche un piccolo lavoro di ricerca per capire i fenomeni con cui si sta lavorando e soprattutto i numeri che si stanno raccogliendo. Una volta compresi determinati concetti si sarà così in grado di migliorare la misurazione e la presentazione dei dati. Proprio questa presentazione deve riuscire ad essere adeguata al pubblico cui si rivolge, ovvero non necessariamente geologi diplomati, ma più probabilmente dei curiosi che vogliono sapere qualcosa in più, o semplicemente fare una piccola analisi degli ultimi dati ottenuti.

### Analisi e specifica dei requisiti


|ID  |REQ-001                                         |
|----|------------------------------------------------|
|**Nome**    |Sismografo |
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**      | Costruzione di un sismografo in grado di rilevare le vibrazioni del terreno |
|**002**      | Lo stesso (tramite Arduino o simili) deve essere in grado di inviare i dati al server |


|ID  |REQ-002                                         |
|----|------------------------------------------------|
|**Nome**    |Altri sensori |
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**      | Sulla base del sismografo dev'essere possibile aggiungere altri strumenti di misura alla stazione (p.es. barometro o termometro) |
|**002**      | Di nuovo sulla base del sismografo la stazione deve inviare i dati al server |


|ID  |REQ-003                                         |
|----|------------------------------------------------|
|**Nome**    |Salvataggio dati|
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**      | Non è necessario salvare a lungo termine tutti i dati ricevuti dalla stazione|
|**002**      | Quando i valori entrano in una soglia interessante i dati vengono raccolti e archiviati|


|ID  |REQ-004                                         |
|----|------------------------------------------------|
|**Nome**    | Allarmi e notifiche|
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**      | Gli allarmi e le notifiche scattano al superamento di una soglia definita |
|**002**      | Gli utenti registrati, se hanno settato l'opzione, ricevono un e-mail di avviso |
|**003**      | Sulla pagina web viene mostrato l'allarme |
|**004**      | Le e-mail vengono inviate a intervalli regolari in caso di allarme (timespan configurabile), per evitare l'invio continuo all'utente |
|**005**      | Deve essere presente una notifica anche sulla stazione fisica (p.es un LED) |


|ID  |REQ-005                                         |
|----|------------------------------------------------|
|**Nome**    | Admin e utenti|
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**     | Deve esserci un form di login e di registrazione |
|**002**     | L'admin ha accesso a una dashboard di gestione |
|**003**     | La registrazione richiede un indirizzo e-mail (univoco nel sistema) e una password |
|**004**     | Gli utenti devono avere la possibilità di cambiare la password |
|**005**     | L'admin può aggiungere nuovi moduli |
|**006**     | L'admin può gestire le configurazioni (vedi REQ-006) |
|**007**     | L'admin può gestire gli utenti |


|ID  |REQ-006                                         |
|----|------------------------------------------------|
|**Nome**    | Configurabilità moduli |
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**     | Per ogni modulo devono essere configurabili le soglie di valori interessanti |
|**002**     | Per ogni modulo devono essere configurabili le soglie di valori d'allarme |
|**003**     | Per ogni modulo deve essere configurabile il tempo della durata di una misurazione (p.es. un terremoto che non ha picchi per X minuti è da considerarsi concluso) |
|**003**     | Dovranno poi essere configurabili altri parametri |


|ID  |REQ-007                                         |
|----|------------------------------------------------|
|**Nome**    | Raccolta e confronto dati professionali|
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**     | È necessario confrontare i dati raccolti con quelli del SED (http://www.seismo.ethz.ch/) |
|**002**     | Questo confronto dev'essere visibile all'utente (sul grafico o tramite tabella) |
|**003**     | I dati vengono raccolti a intervalli regolari (non troppo frequenti a causa del traffico generato) |


|ID  |REQ-008                                         |
|----|------------------------------------------------|
|**Nome**    | Visualizzazione e rappresentazione dati|
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**     | I dati raccolti per ogni modulo devono essere mostrati sulla pagina web tramite un grafico con il tempo in ascissa. |
|**002**     | L'ordinata del grafico deve essere regolabile da parte dell'utente |
|**003**     | I dati salvati devono essere consultabili |


|ID  |REQ-009                                         |
|----|------------------------------------------------|
|**Nome**    | Modulabilità|
|**Priorità**|1                     |
|**Versione**|1.0                   |
|**Note**    ||
|            |**Sotto requisiti** |
|**001**     | Ogni modulo rappresenta un 'pacchetto' di file dedito alla misura di una certa condizione (sismografia, temperatura, pressione, ...) |
|**002**     | I moduli hanno delle configurazioni che possono essere definite dall'admin (vedi REQ-006) |
|**003**     | Ogni modulo dispone della sua sezione sul sito, con tabella nel DB per il salvataggio dei valori e grafico per la visualizzazione |


### Use case


### Pianificazione



### Analisi dei mezzi



## Progettazione



### Design dell’architettura del sistema

Di seguito uno schema che rappresenta l'archietettura della pagina web, essa è costruita in base a pagine php che vengono utilizzate con 'require'. Questo facilita la comprensione, ottimizza i files utilizzati e facilita la modulabilità.

![schema sito](Immagini_doc/SchemaSito.png)

### Design dei dati e database



### Schema E-R, schema logico e descrizione.



### Design delle interfacce



### Design procedurale



## Implementazione


## Test

### Protocollo di test



### Risultati test


### Mancanze/limitazioni conosciute


## Consuntivo



## Conclusioni



### Sviluppi futuri


### Considerazioni personali


## Bibliografia

### Bibliografia per articoli di riviste


### Bibliografia per libri



### Sitografia


## Allegati
