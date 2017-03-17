drop database if exists surveyStation;
create database surveystation;
use surveystation;

create table utenti(
  `ID_Utente` int(11) AUTO_INCREMENT not null,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Amministratore` tinyint(1) NOT NULL,
  `EmailOk` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_Utente`)
);

INSERT INTO utenti VALUES (null,'riccardo.disumma@samtrevano.ch','1234',true);
INSERT INTO utenti VALUES (null,'utente@hotmail.ch','1234',false);

create table configurazione(
  `ID_Configurazione` int(11) AUTO_INCREMENT not null,
  `Parametro` varchar(50) NOT NULL,
  `Valore` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Configurazione`)
);

create table vibrazione_MEM(
  `ID_Vibrazione_MEM` int(11) AUTO_INCREMENT not null,
  `Data` datetime NOT NULL default now(),
  `Val_Vibrazione_MEM` double NOT NULL,
  PRIMARY KEY (`ID_Vibrazione_MEM`)
)ENGINE = MEMORY;

create table vibrazione_FIX(
  `ID_Vibrazione_FIX` int(11) not null,
  `ID_Vibrazione_MEM` int(11) not null,
  `Data` datetime NOT NULL default now(),
  `Val_Vibrazione_FIX` double NOT NULL,
  PRIMARY KEY AUTO_INCREMENT (`ID_Vibrazione_FIX`,`ID_Vibrazione_MEM`)
);

create table shake(
  `ID_Sismografo` int(11) not null AUTO_INCREMENT,
  `ID_Shake` int(11) not null,
  `Data` datetime NOT NULL default now(),
  `Valore_X` double NOT NULL,
  `Valore_Y` double NOT NULL,
  `Valore_Z` double NOT NULL,
  PRIMARY KEY (`ID_Sismografo`,`ID_Shake`) 
);

create table sismografo  (
  `ID_Sismografo` int(11) AUTO_INCREMENT not null,
  `Data` datetime NOT NULL default now(),
  `Valore_X` double NOT NULL,
  `Valore_Y` double NOT NULL,
  `Valore_Z` double NOT NULL,  
  PRIMARY KEY (`ID_Sismografo`) 
)ENGINE=MEMORY;

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
CREATE PROCEDURE storePreviousValues(IN idSism INT)
BEGIN
	DECLARE X,Y,Z double;
    DECLARE t datetime; 
    DECLARE done INT default FALSE;
    DECLARE cur CURSOR FOR SELECT Data,Valore_X,Valore_Y,Valore_Z from Sismografo WHERE data>=DATE_ADD(now(), INTERVAL -15 minute) and ((select count(*) from shake where Data >= DATE_ADD(now(), INTERVAL -30 minute) and Valore_X > 3)=0);
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    OPEN cur;
	read_loop: LOOP
		FETCH cur INTO t, x,y,z;
		IF done THEN
			LEAVE read_loop;
		END IF;
	 
		insert into shake(ID_Shake, Data, Valore_X, Valore_Y, Valore_Z) values(idSism, t,x,y,z);

		END LOOP;
	CLOSE cur;
END
//
delimiter;


drop trigger if exists InsertImportantDataFromSismografoToShake;
#TRIGGER da modificare ed adattare. TRIGGER che una volta letto il valore del sismografo superata una certa soglia, inizia a copiare i dati nella tabella shake
delimiter // 

create trigger InsertImportantDataFromSismografoToShake
before insert ON surveystation.sismografo FOR EACH ROW 
BEGIN
	DECLARE sismografoId int default 0;
    DECLARE lastSismografoTime datetime;
    DECLARE saveData int default 0; 
	SET sismografoId = (SELECT MAX(ID_Shake) FROM shake);
    IF sismografoId is NULL THEN
		 SET sismografoId=0;
    END IF;
    SET lastSismografoTime = (SELECT MAX(Data) from shake);
   
    if lastSismografoTime <= DATE_ADD(now(),INTERVAL -1 MINUTE) then #Valore da Conf
		SET sismografoId = sismografoId +1;
    end if;
	
	SET saveData = (select count(*) from shake where Data >= DATE_ADD(now(), INTERVAL -30 minute) and Valore_X > 3); #Valore DA COnfigurazione!
	IF (new.Valore_X > 3) then
		CALL storePreviousValues(sismografoId);
    END IF;

	IF (new.Valore_X > 3) OR ((lastSismografoTime <= DATE_ADD(now(),INTERVAL -1-1 MINUTE)) OR (saveData > 0)) THEN #VALORE 3 da impostare come configurazione!
        insert into shake (ID_Shake,Valore_X,Valore_Y,Valore_Z) values(sismografoId,new.Valore_X,new.Valore_Y,new.Valore_Z); #da modificare quell'1
	END IF;
END;

// delimiter ;
