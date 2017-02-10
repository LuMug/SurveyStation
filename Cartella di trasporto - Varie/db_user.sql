create database surveystation;
use surveystation;

create table utenti(
  `ID_Utente` int(11) AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Amministratore` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_Utente`)
);

INSERT INTO utenti VALUES (1,'riccardo.disumma@samtrevano.ch','1234',true);
INSERT INTO utenti VALUES (2,'utente@hotmail.ch','1234',false);
