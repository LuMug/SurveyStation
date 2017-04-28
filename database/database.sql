drop database if exists surveystation;
create database surveystation;
use surveystation;

create table utenti(
  `Email` varchar(60) NOT NULL unique,
  `Password` varchar(60) NOT NULL,
  `Amministratore` tinyint(1) NOT NULL,
  `Email_notification`tinyint(1) NOT NULL default 0,
  PRIMARY KEY (`Email`)
);


create table configurazione(
  `ID` int(11) AUTO_INCREMENT not null,
  `Parametro` varchar(60) NOT NULL,
  `Valore` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
);

#DEVONO ESSERE SPOSTATI ALL'INTERNO DEL TRIGGER O DELLA PROCEDURA DOVE VENGONO USATI
insert into configurazione(Parametro,Valore) values('tempoPrimaPiccoDati',15); #minuti per il quale vengono salvati i dati precedenti un picco
insert into configurazione(Parametro,Valore) values('piccoInUltimoLassoTemporale',30); #minuti di verifica dall'ultimo picco per sospendere il salvataggio dati
insert into configurazione(Parametro,Valore) values('CambioNumeroTerremoto',10);#minuti di pausa per distinzione nuovo terremoto
insert into configurazione(Parametro,Valore) values('CancellareDatiVecchi',500); #minuti  dopo i quali i dati del sismografo vengono eliminati
insert into configurazione(Parametro,Valore) values('valoreDaCuiIniziaARegistrareDati',3); #valore minimo di picco dal quale cominciare a salvare i dati



create table shake(
  `ID_Sismografo` int(11) not null,
  `ID` int(11) not null AUTO_INCREMENT,
  `Data` datetime NOT NULL default 0,
  `Valore_X` int NOT NULL,
  `Valore_Y` int NOT NULL,
  `Valore_Z` int NOT NULL,
  PRIMARY KEY (`ID`) 
);

create table sismografo  (
  `ID` int(11) AUTO_INCREMENT not null,
  `Data` datetime NOT NULL default 0,
  `Valore_X` int NOT NULL,
  `Valore_Y` int NOT NULL,
  `Valore_Z` int NOT NULL,  
  PRIMARY KEY (`ID`) 
)ENGINE=MEMORY;

delimiter //
CREATE PROCEDURE storePreviousValues(IN idSism INT, IN a int, in b int, in e int) #procedura per immagazzinare tutti i dati precedenti al valore che dà inizio al terremoto
BEGIN #inizio a scrivere il codice della procedura
  DECLARE X,Y,Z double; #variabili che conterranno i valori di Valore_X, Valore_Y, Valore_Z
    DECLARE t datetime; #variabile che conterrà il valore di Data
    DECLARE done INT default FALSE; #variabile che serve per uscire da un loop
    #Seleziono i dati degli ultimi 15minuti nei quali non ci sia già stato registrato un picco di valore 
    DECLARE cur CURSOR FOR SELECT Data,abs(Valore_X),abs(Valore_Y),abs(Valore_Z) from Sismografo WHERE data>=DATE_ADD(now(), INTERVAL -a minute) and ((select count(*) from shake where Data >= DATE_ADD(now(), INTERVAL -b minute) and (abs(Valore_X) > e or abs(Valore_Y) > e or abs(Valore_Z) > e))=0); 
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE; #Quando arrivo alla fine dei records, esco dal ciclo

    OPEN cur;
  read_loop: LOOP
    FETCH cur INTO t, x,y,z; #assegno ogni valore dei record della tabella, alle rispettive variabili
    IF done THEN
      LEAVE read_loop; #se non ci sono più record, esco dal loop
    END IF;
   
    insert into shake(shake.ID, Data, Valore_X, Valore_Y, Valore_Z) values(idSism, t,x,y,z); #Inserisco i valori assegnati alle variabili del ciclo, nei rispettivi record della tabella shake

    END LOOP;
  CLOSE cur; 
END; #finisco di scrivere il codice della procedura
//
delimiter ;

delimiter // 

create trigger InsertImportantDataFromSismografoToShake #Creo un trigger per poter inserire dei valori in una tabella a partire dall'individuamento di un determinato valore
before insert ON surveystation.sismografo FOR EACH ROW #Operazione che va fatta, ovviamente, prima che un dato venga inserito
BEGIN 
  DECLARE sismografoId int default 0; #dichiaro una variabile che simboleggia il valore dell'id del sismografo e di defaul la metto a 0
    DECLARE lastSismografoTime datetime; #dichiaro una variabile che simboleggia l'ultimo dato letto prima del picco che dà inizio al terremoto
    DECLARE saveData int default 0; #dichiaro una variaible nella quale salverò i dati precedenti al terremoto
    
    DECLARE a,b,c,e int;    
    
    set a = (select valore from configurazione where Parametro = 'tempoPrimaPiccoDati');
	set b = (select valore from configurazione where Parametro = 'piccoInUltimoLassoTemporale');
    set c = (select valore from configurazione where Parametro = 'CambioNumeroTerremoto');
	set e = (select valore from configurazione where Parametro = 'valoreDaCuiIniziaARegistrareDati');

    
    
  SET sismografoId = (SELECT MAX(shake.ID) FROM shake); #il valore di sismografoId corrisponde al massimo valore del campo ID_Shake nella tabella shake
    IF sismografoId is NULL THEN #se il campo sismografoId dovesse essere di tipo null allora lo si imposta a 0
     SET sismografoId=0;
    END IF;
    SET lastSismografoTime = (SELECT MAX(Data) from shake); #il valore di lastSismografoTime corrisponde alla data più recente nella tabella shake
   
    if lastSismografoTime <= DATE_ADD(now(),INTERVAL -@c MINUTE) then #Se l'ultimo valore prima dell'inizio del terremoto è stato registrato più di un minuto fa, allora aumento il valore della variabile sismografoId che rappresenta il numero del terremoto
    SET sismografoId = sismografoId +1;
    end if;
  
  SET saveData = (select count(*) from shake where Data >= DATE_ADD(now(), INTERVAL - b minute) and (abs(Valore_X) > e or abs(Valore_Y) > e or abs(Valore_Z) > e)); #Definisco se salvare i dati solamente se negli ultimi 30 minuti c'è stato un picco
  IF ((abs(new.Valore_X) > e or abs(new.Valore_Y) > e or abs(new.Valore_Z) > e)) then #se il valore di Valore_X è paggiore di 3 allora chiamo la procedura storePreviousValues e le passo l'id del sismografo
    CALL storePreviousValues(sismografoId,a,b,e);
    END IF;
  
  #Inserisco i dati nella tavella shake solamente se il dato è un picco, oppure se è meno vecchio di un minuto dall'ultimo dato registrato, oppure, se saveData>0 (spiegato sopra)
  IF ((abs(new.Valore_X) > 3 or abs(new.Valore_Y) > e or abs(new.Valore_Z) > e)) OR ((lastSismografoTime <= DATE_ADD(now(),INTERVAL -c MINUTE)) OR (saveData > 0)) THEN
        insert into shake (shake.ID,Valore_X,Valore_Y,Valore_Z) values(sismografoId,new.Valore_X,new.Valore_Y,new.Valore_Z); 
  END IF;
END;

// 
delimiter ;

delimiter //
create procedure oldData()
begin
  declare d int;
  
  set d = (select valore from configurazione where Parametro = 'CancellareDatiVecchi');

  delete from sismografo where data < now() - INTERVAL d minute;
end;
// delimiter ;


SET GLOBAL event_scheduler = ON;
SET @@global.event_scheduler = ON;
SET GLOBAL event_scheduler = 1;
SET @@global.event_scheduler = 1;

create event runProcedureOldData
  ON SCHEDULE EVERY 1 hour
    do call oldData();


