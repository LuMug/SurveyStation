create database surveystation;
use surveystation;

create table utenti(
  `ID_Utente` int(11) AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Amministratore` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_Utente`)
)