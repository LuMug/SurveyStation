create table utenti(
  `ID_Utente` int(11) AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` binary(32) NOT NULL,
  `Amministratore` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_Utente`)
);