drop database if exists surveyStation;
create database surveystation;
use surveystation;

create table utenti(
  `ID` int(11) AUTO_INCREMENT not null,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Amministratore` tinyint(1) NOT NULL,
  `Email_notification`tinyint(1) NOT NULL default 0,
  PRIMARY KEY (`ID`)
);


create table configurazione(
  `ID` int(11) AUTO_INCREMENT not null,
  `Parametro` varchar(60) NOT NULL,
  `Valore` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
);

create table vibrazione_MEM(
  `ID` int(11) AUTO_INCREMENT not null,
  `Data` datetime NOT NULL default now(),
  `Val_Vibrazione_MEM` double NOT NULL,
  PRIMARY KEY (`ID`)
)ENGINE = MEMORY;

create table vibrazione_FIX(
  `ID` int(11) not null,
  `ID_Vibrazione_MEM` int(11) not null,
  `Data` datetime NOT NULL default now(),
  `Val_Vibrazione_FIX` double NOT NULL,
  PRIMARY KEY AUTO_INCREMENT (`ID`)
)ENGINE = MEMORY;

alter table vibrazione_FIX add foreign key (ID_Vibrazione_MEM) REFERENCES vibrazione_MEM (ID) ON DELETE CASCADE;

create table shake(
  `ID_Sismografo` int(11) not null,
  `ID` int(11) not null AUTO_INCREMENT,
  `Data` datetime NOT NULL default now(),
  `Valore_X` double NOT NULL,
  `Valore_Y` double NOT NULL,
  `Valore_Z` double NOT NULL,
  PRIMARY KEY (`ID`) 
)ENGINE=MEMORY;

create table sismografo  (
  `ID` int(11) AUTO_INCREMENT not null,
  `Data` datetime NOT NULL default now(),
  `Valore_X` double NOT NULL,
  `Valore_Y` double NOT NULL,
  `Valore_Z` double NOT NULL,  
  PRIMARY KEY (`ID`) 
)ENGINE=MEMORY;

#drop table shake;
alter table shake add foreign key (ID_Sismografo) REFERENCES sismografo (ID) ON DELETE CASCADE;


insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (1, 1, 1);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (1, 1, 2);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (1, 2, 1);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (1, 2, 2);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (2, 2, 2);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (4, 79, 48);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (62, 62, 32);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (79, 96, 2);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (10, 61, 84);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (16, 42, 92);
insert into sismografo (Valore_X, Valore_Y, Valore_Z) values (59, 100, 6);


select * from shake;


delimiter //
CREATE PROCEDURE storePreviousValues(IN idSism INT) #procedura per immagazzinare tutti i dati precedenti al valore che dà inizio al terremoto
BEGIN #inizio a scrivere il codice della procedura
	DECLARE X,Y,Z double; #variabili che conterranno i valori di Valore_X, Valore_Y, Valore_Z
    DECLARE t datetime; #variabile che conterrà il valore di Data
    DECLARE done INT default FALSE; #variabile che serve per uscire da un loop
    #Seleziono i dati degli ultimi 15minuti nei quali non ci sia già stato registrato un picco di valore 
    DECLARE cur CURSOR FOR SELECT Data,Valore_X,Valore_Y,Valore_Z from Sismografo WHERE data>=DATE_ADD(now(), INTERVAL -15 minute) and ((select count(*) from shake where Data >= DATE_ADD(now(), INTERVAL -30 minute) and Valore_X > 3)=0); 
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
END #finisco di scrivere il codice della procedura
//
delimiter;


drop trigger if exists InsertImportantDataFromSismografoToShake;

delimiter // 

create trigger InsertImportantDataFromSismografoToShake #Creo un trigger per poter inserire dei valori in una tabella a partire dall'individuamento di un determinato valore
before insert ON surveystation.sismografo FOR EACH ROW #Operazione che va fatta, ovviamente, prima che un dato venga inserito
BEGIN 
	DECLARE sismografoId int default 0; #dichiaro una variabile che simboleggia il valore dell'id del sismografo e di defaul la metto a 0
    DECLARE lastSismografoTime datetime; #dichiaro una variabile che simboleggia l'ultimo dato letto prima del picco che dà inizio al terremoto
    DECLARE saveData int default 0; #dichiaro una variaible nella quale salverò i dati precedenti al terremoto
	SET sismografoId = (SELECT MAX(shake.ID) FROM shake); #il valore di sismografoId corrisponde al massimo valore del campo ID_Shake nella tabella shake
    IF sismografoId is NULL THEN #se il campo sismografoId dovesse essere di tipo null allora lo si imposta a 0
		 SET sismografoId=0;
    END IF;
    SET lastSismografoTime = (SELECT MAX(Data) from shake); #il valore di lastSismografoTime corrisponde alla data più recente nella tabella shake
   
    if lastSismografoTime <= DATE_ADD(now(),INTERVAL -1 MINUTE) then #Se l'ultimo valore prima dell'inizio del terremoto è stato registrato più di un minuto fa, allora aumento il valore della variabile sismografoId che rappresenta il numero del terremoto
		SET sismografoId = sismografoId +1;
    end if;
	
	SET saveData = (select count(*) from shake where Data >= DATE_ADD(now(), INTERVAL -30 minute) and Valore_X > 3); #Definisco se salvare i dati solamente se negli ultimi 30 minuti c'è stato un picco
	IF (new.Valore_X > 3) then #se il valore di Valore_X è paggiore di 3 allora chiamo la procedura storePreviousValues e le passo l'id del sismografo
		CALL storePreviousValues(sismografoId);
    END IF;
	
	#Inserisco i dati nella tavella shake solamente se il dato è un picco, oppure se è meno vecchio di un minuto dall'ultimo dato registrato, oppure, se saveData>0 (spiegato sopra)
	IF (new.Valore_X > 3) OR ((lastSismografoTime <= DATE_ADD(now(),INTERVAL -1-1 MINUTE)) OR (saveData > 0)) THEN
        insert into shake (shake.ID,Valore_X,Valore_Y,Valore_Z) values(sismografoId,new.Valore_X,new.Valore_Y,new.Valore_Z); 
	END IF;
END;

// delimiter ;
